<?php

namespace App\Http\Controllers;


use App\Events\SuccessCallBack;
use App\Models\Acbtranfersnani;
use App\Models\MbBank;
use App\Models\Recharge;
use App\Models\transactionMbBankHistoryList;
use App\DataTables\MbBankDataTable;
use App\Models\System;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\DES;
use Telegram\Bot\Laravel\Facades\Telegram;
use TwoCaptcha\TwoCaptcha;
use Carbon\Carbon;


class MbBankAController extends Controller
{
	protected $_timeout = 15;
	protected $defaultHeader = [];
//		protected $captchaKey = 'c668ae146516be44009aac0252761fca';
	protected $captchaKey = '0063422cec412fac797d7d61d0ca9b1d';

	public function __construct()
	{
		$this->captchaKey = "0063422cec412fac797d7d61d0ca9b1d";
		$this->defaultHeader = [
			"Content-Type: application/json",
			"User-Agent: MB%20Bank/2 CFNetwork/1331.0.3 Darwin/21.4.0",
			"Authorization: Basic QURNSU46QURNSU4=",
		];

		$object = System::where('id', 1000)->first();

		$this->_timeout = 15;
		$this->imei = $this->generateImei();
		$this->username = $object->mbbank_username;
		$this->password = $object->mbbank_password;
		$this->account_no = $object->mbbank_account_no;
		$this->sessionId = $object->mbbank_sessionId;
	}


	function requestPost($url, $data, $headers)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 15,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => $headers,
		));

		$response = json_decode(curl_exec($curl), true);

		if (curl_errno($curl)) {
			error_log('MBBank requestPost Error: ' . curl_error($curl));
			$response = null; // Handle the error case by setting the response to null
		}

		curl_close($curl);

		return $response;
	}

	function solveCaptcha($captchaImage)
	{
		$solver = new TwoCaptcha('0063422cec412fac797d7d61d0ca9b1d');

		$curl = $solver->normal([
			'base64' => $captchaImage,
			'caseSensitive' => 1
		]);

		return $curl->code;
	}

	function getCaptcha()
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail-web-internetbankingms/getCaptchaImage", [
			"sessionId" => "",
			"refNo" => date("YmdHms"),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);

		$captchaImage = $curl['imageString'];

		return $this->solveCaptcha($captchaImage);
	}

	function doLogin()
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/internetbanking/doLogin", [
			"userId" => $this->username,
			"password" => $this->password,
			"refNo" => $this->ref_no($this->username),
			"deviceIdCommon" => $this->imei,
			"captcha" => $this->getCaptcha()
		], $this->defaultHeader);

		if (isset($curl['result']['ok']) && $curl['result']['ok'] == false) {
			echo "<pre>";
			print_r($curl);
			echo "</pre>";
			die('xxxx A');

			throw new \Exception('Error');
			// Alternatively, you can use die('Error') if you prefer, but throwing an exception is cleaner.
		} else {
			$data = [
				'mbbank_username' => $this->username,
				'mbbank_password' => $this->password,
				'mbbank_captchaKey' => $this->captchaKey,
				'mbbank_imei' => $this->imei,
				'mbbank_sessionId' => $curl['sessionId'],
				'mbbank_account_no' => $this->account_no,
				'mbbank_cust_id' => '',
			];

			System::updateOrCreate(['id' => 1000], $data);

			return $curl;
		}


	}


	function getBalance($username, $session_id)
	{

		$curl = $this->requestPost("https://online.mbbank.com.vn/retail-web-accountms/getBalance", [
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);

		return $curl;
	}

	function getList($username, $session_id)
	{

		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/card/getList", [
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function getHistory($username, $accountNo, $session_id, $imei, $days)
	{
		$fromDate = date("d/m/Y", time() - (86400 * $days));
		$toDate = date("d/m/Y", time());

		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/common/getTransactionHistory", [
			"accountNo" => $accountNo,
			"fromDate" => $fromDate,
			"historyNumber" => "",
			"historyType" => "DATE_RANGE",
			"toDate" => $toDate,
			"type" => "ACCOUNT",
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $imei,
		], $this->defaultHeader);


		return $curl;
	}

	function getBankList($username, $session_id)
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/common/getBankList", [
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function createTransfer($username, $srcAccountNo, $session_id, $partnerBankId, $partnerAccountNumber, $partnerName, $amount, $message)
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/transfer/verifyMakeTransfer", [
			"benBankCd" => $partnerBankId,
			"benAccountNumber" => $partnerAccountNumber,
			"benAccountName" => $partnerName,
			"destType" => "ACCOUNT",
			"srcAccountNumber" => $srcAccountNo,
			"message" => $message,
			"amount" => $amount,
			"transferType" => $partnerBankId == "970422" ? "INHOUSE" : "FAST",
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function getAuthList($username, $session_id, $amount)
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/internetbanking/getAuthList", [
			"amount" => $amount,
			"serviceCode" => "GCM_FTR_DOM_FAST",
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function sendSmsOtp($username, $session_id, $amount, $deviceId)
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/internetbanking/generateSMSOTP", [
			"transType" => "TRANSFER",
			"amount" => $amount,
			"authSerialNumber" => $deviceId,
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function createTransferAuthen($username, $srcAccountNo, $session_id, $partnerBankId, $partnerAccountNumber, $partnerName, $amount, $cust_id)
	{
		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/vtap/createTransactionAuthen", [
			"transactionAuthen" => [
				"refNo" => $this->ref_no($username),
				"custId" => $cust_id,
				"sourceAccount" => $srcAccountNo,
				"destAccount" => $partnerAccountNumber,
				"amount" => $amount,
				"transactionType" => $partnerBankId == "970422" ? "GCM_FTR_IH_3RD" : "GCM_FTR_DOM_FAST",
				"destAccountName" => $partnerName,
			],
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function confirmTransfer($username, $srcAccountNo, $session_id, $partnerBankId, $partnerAccountNumber, $partnerName, $amount, $message, $otp = [])
	{
		if ($otp['type'] == "soft") $otp = "ibr|" . $otp['deviceID_OTP'] . "||" . $otp['otp'] . "||" . time() . "|" . $otp['authenID'] . "|" . $otp['refNoAuthen'];
		else $otp = "ibr|" . $otp['deviceID_OTP'] . "|" . $otp['otp'];

		$curl = $this->requestPost("https://online.mbbank.com.vn/retail_web/transfer/makeTransfer", [
			"benBankCd" => $partnerBankId,
			"benAccountNumber" => $partnerAccountNumber,
			"benAccountName" => $partnerName,
			"destType" => "ACCOUNT",
			"srcAccountNumber" => $srcAccountNo,
			"message" => $message,
			"amount" => $amount,
			"transferType" => $partnerBankId == "970422" ? "INHOUSE" : "FAST",
			"otp" => $otp,
			"sessionId" => $session_id,
			"refNo" => $this->ref_no($username),
			"deviceIdCommon" => $this->imei,
		], $this->defaultHeader);
		return $curl;
	}

	function ref_no($username)
	{
		return $username . '-' . date('YmdHms');
	}

	function generateImei()
	{
		return $this->generateRandomString(8) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(12);
	}

	function generateRandomString($length = 20)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function index()
	{
		$this->loading();

		$object = System::where('id', 1000)->first();
		$history = $this->getHistory($object->mbbank_username, $object->mbbank_account_no, $object->mbbank_sessionId, $object->mbbank_imei, 3); //lấy lịch sử trong 3 ngày

		if ($history['result']['responseCode'] == 'GW200') {
			$kq = $this->doLogin();

			if ($kq == false) {

				$history = array();

				return view('pages.mbbank.index', compact('history'));
			}

			$this->index();
		}

		if (!isset($history['result']['ok'])) {
			$kq = $this->doLogin();

			if ($kq == false) {
				$history = array();

				return view('pages.mbbank.index', compact('history'));
			}

			$this->index();

		} else {
			if (isset($history['transactionHistoryList'])) {
				foreach ($history['transactionHistoryList'] as $item) {
					$data = transactionMbBankHistoryList::where('refNo', $item['refNo'])->get();

					if (count($data) > 0) {
						continue;
					} else {
						$date = Carbon::now();
						$created_at = $date->format('d-m-Y H:i:s');

						transactionMbBankHistoryList::create([
							'id' => Null,
							'id_refNo' => $item['refNo'],
							'postingDate' => $item['postingDate'],
							'transactionDate' => $item['transactionDate'],
							'accountNo' => $item['accountNo'],
							'creditAmount' => $item['creditAmount'],
							'debitAmount' => $item['debitAmount'],
							'currency' => $item['currency'],
							'description' => $item['description'],
							'availableBalance' => $item['availableBalance'],
							'beneficiaryAccount' => $item['beneficiaryAccount'],
							'refNo' => $item['refNo'],
							'benAccountName' => $item['benAccountName'],
							'bankName' => $item['bankName'],
							'dueDate' => $item['dueDate'],
							'docId' => $item['docId'],
							'transactionType' => $item['transactionType'],
							'created_at' => $created_at,
							'updated_at' => $created_at,
						]);
					}

				}

				$this->updateRechargeMB();
			}

			$this->updateRechargeMB();

			return view('pages.mbbank.index', compact('history'));
		}
	}

	public function loading()
	{
		$object = System::find(1000);

		$history = $this->getHistory($object->mbbank_username, $object->mbbank_account_no, $object->mbbank_sessionId, $object->mbbank_imei, 3); //lấy lịch sử trong 3 ngày

		if (!isset($history['result']['ok'])) {
			$kq = $this->doLogin();

			if ($kq == false) {
				$history = array();
			}

			$this->loading();
		}

		if (isset($history['transactionHistoryList'])) {

			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => 'MBBank A - transactionHistoryList  : ' . count($history['transactionHistoryList'])
			]);

			foreach ($history['transactionHistoryList'] as $item) {
				$exists = transactionMbBankHistoryList::where('refNo', $item['refNo'])->exists();
				if (!$exists) {
					$date = Carbon::now();
					$created_at = $date->format('d-m-Y H:i:s');
					transactionMbBankHistoryList::create([
						'id_refNo' => $item['refNo'],
						'postingDate' => $item['postingDate'],
						'transactionDate' => $item['transactionDate'],
						'accountNo' => $item['accountNo'],
						'creditAmount' => $item['creditAmount'],
						'debitAmount' => $item['debitAmount'],
						'currency' => $item['currency'],
						'description' => $item['description'],
						'availableBalance' => $item['availableBalance'],
						'beneficiaryAccount' => $item['beneficiaryAccount'],
						'refNo' => $item['refNo'],
						'benAccountName' => $item['benAccountName'],
						'bankName' => $item['bankName'],
						'dueDate' => $item['dueDate'],
						'docId' => $item['docId'],
						'transactionType' => $item['transactionType'],
						'created_at' => $created_at,
						'updated_at' => $created_at,
					]);
				}
			}
		} else {
			$kq = $this->doLogin();

			$this->loading();
		}

		$this->updateRechargeMB();
	}

	public function updateRechargeMB()
	{
		$listReApi = Recharge::orderBy('id', 'desc')->take(100)->get()->toArray();
		$api_data = transactionMbBankHistoryList::orderBy('id', 'desc')->take(100)->get()->toArray();

		if (count($api_data) > 0) {
			foreach ($listReApi as $res) {
				if ($res['trang_thai'] == 'success') {
					foreach ($api_data as $api) {

						$cleanString = preg_replace('/\s+/', '', $api['description']);

						if (empty($api['api']) && str_contains($cleanString, str_replace(' ', '', $res['comment']))) {
							$arr['api'] = $res['comment'];
							$obj = transactionMbBankHistoryList::find($api['id']);
							$obj->update($arr);
							$obj->save();
							
							if($api['debitAmount']  == 0)
							{
								$amount_mb = (int)str_replace(',', '', $api['creditAmount']);
								//nap tien
								$obj2 = Recharge::where('comment', $res['comment'])->first();
								if (empty($obj2->comment_api)) {
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();
									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::find($obj2->id_partners);
									
									$text_content = "<b>Cron Job MBBank Cập Nhật Nội Dung  Sau Khi Admin Chấp Nhận Thành Công :</b>\n"
									  . "<b>Số Tiền Yêu Cầu: </b>\n"
									  . number_format($obj2->amount, 0, '', ',') . "\n"
									  . "<b>Số Tiền Chuyển Khoản: </b>\n"
									  . number_format($amount_mb, 0, '', ',') . "\n"
									  . "<b> Không cộng tiền cho đối tác vì Admin đã xử lý rồi : </b>\n"
									  . $partners->first_name . "\n"
									  . "<b> Binh Luan : </b>\n"
									  . $api['description'] . "\n"
									  . "<b> Người Duyệt   : </b>\n"
									  . "Cron Job: MBbank A \n"
									  . "<b> Cập Nhật Lúc : </b>\n"
									  . $created_at;
									
									Telegram::sendMessage([
									  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
									  'parse_mode' => 'HTML',
									  'text' => $text_content
									]);
								}
							}
							
						}
					}
				} elseif (in_array($res['trang_thai'], ['pending', 'cancel', 'confirm'])) {
					foreach ($api_data as $api) {
						$cleanString = preg_replace('/\s+/', '', $api['description']);
						if (str_contains($cleanString, str_replace(' ', '', $res['comment']))) {
							$arr['api'] = $res['comment'];
							$obj = transactionMbBankHistoryList::find($api['id']);
							$obj->update($arr);
							$obj->save();

							//nap tien
							$obj2 = Recharge::where('comment', $res['comment'])->first();
							
							if($api['debitAmount']  == 0)
							{
								$amount_mb = (int)str_replace(',', '', $api['creditAmount']);
								
								// neu pending va chua co noi dung api
								if ($obj2->trang_thai == 'pending' && empty($obj2->comment_api)) {
									
									if ($amount_mb != $obj2->amount) {
										// update Recharge
										$arr['trang_thai'] = 'cancel';
										$arr['comment_api'] = $api['description'];
										$obj2->update($arr);
										$obj2->save();
										
										$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
										$created_at = $date->format('d-m-Y H:i:s');
										$partners = User::find($obj2->id_partners);
										$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];
										
										Telegram::sendMessage([
										  'chat_id' => "1281282845",
										  'parse_mode' => 'HTML',
										  'text' => $txt
										]);
										
										$text_content = "<b>Cron Job MBBank Cập Nhật Yêu Cầu Nạp Tiền:</b>\n"
										  . "<b>Số Tiền Yêu Cầu: </b>\n"
										  . number_format($obj2->amount, 0, '', ',') . "\n"
										  . "<b>Số Tiền Chuyển Khoản: </b>\n"
										  . number_format($amount_mb, 0, '', ',') . "\n"
										  . "<b> Không cộng tiền cho đối tác : </b>\n"
										  . $partners->first_name . "\n"
										  . "<b> Người Duyệt   : </b>\n"
										  . "Cron Job: MBbank A \n"
										  . "<b> Cập Nhật Lúc : </b>\n"
										  . $created_at;
										
										Telegram::sendMessage([
										  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										  'parse_mode' => 'HTML',
										  'text' => $text_content
										]);
									}
									
									if ($amount_mb == $obj2->amount) {
										// update Recharge
										$arr['trang_thai'] = 'success';
										$arr['comment_api'] = $api['description'];
										$arr['id'] = $res['id'];
										
										$obj2->update($arr);
										$obj2->save();
										
										event(new SuccessCallBack($arr));
										
										$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
										$created_at = $date->format('d-m-Y H:i:s');
										
										$partners = User::find($obj2->id_partners);
										$data_arr = [
										  'so_du' => (int)$partners->so_du + $amount_mb,
										];
										$partners->update($data_arr);
										$partners->save();
										
										$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										  . "<b>Đã Cộng Số Tiền: </b>\n"
										  . number_format($amount_mb, 0, '', ',') . "\n"
										  . "<b> Tổng Cộng : </b>\n"
										  . number_format($data_arr['so_du'], 0, '', ',') . "\n"
										  . "<b> Cho Đối Tác  : </b>\n"
										  . $partners->first_name . "\n"
										  . "<b> Người Duyệt   : </b>\n"
										  . "Cron Job: MBbank A \n"
										  . "<b> Cập Nhật Lúc : </b>\n"
										  . $created_at;
										
										Telegram::sendMessage([
										  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										  'parse_mode' => 'HTML',
										  'text' => $text_content
										]);
									}
								}
								
								// neu cancel va chua co noi dung api
								if ($obj2->trang_thai == 'cancel' && empty($obj2->comment_api)) {
									$amount_mb = (int)str_replace(',', '', $api['creditAmount']);
									
									if ($amount_mb == $obj2->amount && $obj2->trang_thai == 'cancel') {
										// update Recharge
										$arr['trang_thai'] = 'cancel';
										$arr['comment_api'] = $api['description'];
										
										$obj2->update($arr);
										$obj2->save();
										
										$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
										$created_at = $date->format('d-m-Y H:i:s');
										$partners = User::find($obj2->id_partners);
										$data_arr = [
										  'so_du' => (int)$partners->so_du + $amount_mb,
										];
										$partners->update($data_arr);
										$partners->save();
										
										$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										  . "<b>Đã Cộng Số Tiền: </b>\n"
										  . number_format($amount_mb, 0, '', ',') . "\n"
										  . "<b> Tổng Cộng : </b>\n"
										  . number_format($data_arr['so_du'], 0, '', ',') . "\n"
										  . "<b> Cho Đối Tác  : </b>\n"
										  . $partners->first_name . "\n"
										  . "<b> Người Duyệt   : </b>\n"
										  . "Cron Job: MBbank A \n"
										  . "<b> Cập Nhật Lúc : </b>\n"
										  . $created_at;
										
										Telegram::sendMessage([
										  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										  'parse_mode' => 'HTML',
										  'text' => $text_content
										]);
										
									} else // đúng noi dung , sai so tiền
									{
										// update Recharge
										$arr['trang_thai'] = 'cancel';
										$arr['comment_api'] = $api['description'];
										$obj2->update($arr);
										$obj2->save();
										
										$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
										$created_at = $date->format('d-m-Y H:i:s');
										$partners = User::find($obj2->id_partners);
										$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];
										
										Telegram::sendMessage([
										  'chat_id' => "1281282845",
										  'parse_mode' => 'HTML',
										  'text' => $txt
										]);
										
										$text_content = "<b>Cron Job MBBank Cập Nhật Yêu Cầu Nạp Tiền:</b>\n"
										  . "<b>Số Tiền Yêu Cầu: </b>\n"
										  . number_format($obj2->amount, 0, '', ',') . "\n"
										  . "<b>Số Tiền Chuyển Khoản: </b>\n"
										  . number_format($amount_mb, 0, '', ',') . "\n"
										  . "<b> Không cộng tiền cho đối tác : </b>\n"
										  . $partners->first_name . "\n"
										  . "<b> Binh Luan : </b>\n"
										  . $api['description'] . "\n"
										  . "<b> Người Duyệt   : </b>\n"
										  . "Cron Job: MBbank A \n"
										  . "<b> Cập Nhật Lúc : </b>\n"
										  . $created_at;
										
										Telegram::sendMessage([
										  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										  'parse_mode' => 'HTML',
										  'text' => $text_content
										]);
									}
								}
								
								// neu cancel va co noi dung api
								if ($obj2->trang_thai == 'confirm' && empty($obj2->comment_api)) {
									$amount_mb = (int)str_replace(',', '', $api['creditAmount']);
									
									Telegram::sendMessage([
									  'chat_id' => "1281282845",
									  'parse_mode' => 'HTML',
									  'text' => 'MBBank - creditAmount  : ' . $amount_mb
									]);
									
									if ($amount_mb == $obj2->amount && $obj2->trang_thai == 'confirm') {
										// update Recharge
										$arr['trang_thai'] = 'cancel';
										$arr['comment_api'] = $api['description'];
										
										$obj2->update($arr);
										$obj2->save();
										
										$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
										$created_at = $date->format('d-m-Y H:i:s');
										$partners = User::find($obj2->id_partners);
										$data_arr = [
										  'so_du' => (int)$partners->so_du + $amount_mb,
										];
										$partners->update($data_arr);
										$partners->save();
										
										$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										  . "<b>Đã Cộng Số Tiền: </b>\n"
										  . number_format($amount_mb, 0, '', ',') . "\n"
										  . "<b> Tổng Cộng : </b>\n"
										  . number_format($data_arr['so_du'], 0, '', ',') . "\n"
										  . "<b> Cho Đối Tác  : </b>\n"
										  . $partners->first_name . "\n"
										  . "<b> Người Duyệt   : </b>\n"
										  . "Cron Job: MBbank A \n"
										  . "<b> Cập Nhật Lúc : </b>\n"
										  . $created_at;
										
										Telegram::sendMessage([
										  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										  'parse_mode' => 'HTML',
										  'text' => $text_content
										]);
										
									} else // đúng noi dung , sai so tiền
									{
										// update Recharge
										$arr['trang_thai'] = 'cancel';
										$arr['comment_api'] = $api['description'];
										$obj2->update($arr);
										$obj2->save();
										
										$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
										$created_at = $date->format('d-m-Y H:i:s');
										$partners = User::find($obj2->id_partners);
										$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];
										
										Telegram::sendMessage([
										  'chat_id' => "1281282845",
										  'parse_mode' => 'HTML',
										  'text' => $txt
										]);
										
										$text_content = "<b>Cron Job MBBank Cập Nhật Yêu Cầu Nạp Tiền:</b>\n"
										  . "<b>Số Tiền Yêu Cầu: </b>\n"
										  . number_format($obj2->amount, 0, '', ',') . "\n"
										  . "<b>Số Tiền Chuyển Khoản: </b>\n"
										  . number_format($amount_mb, 0, '', ',') . "\n"
										  . "<b> Không cộng tiền cho đối tác : </b>\n"
										  . $partners->first_name . "\n"
										  . "<b> Binh Luan : </b>\n"
										  . $api['description'] . "\n"
										  . "<b> Người Duyệt   : </b>\n"
										  . "Cron Job: MBbank A \n"
										  . "<b> Cập Nhật Lúc : </b>\n"
										  . $created_at;
										
										Telegram::sendMessage([
										  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										  'parse_mode' => 'HTML',
										  'text' => $text_content
										]);
									}
								}
							}
						
						}
					}
				}
			}
		}
	}

	public function destroy($id)
	{
		$activity = MbBank::find($id);

		// Delete from db
		$activity->delete();
	}
}
