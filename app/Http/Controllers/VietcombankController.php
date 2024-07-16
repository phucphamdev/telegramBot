<?php

namespace App\Http\Controllers;

use App\Events\SuccessCallBack;
use App\Models\Recharge;
use App\Models\System;
use App\Models\transactionsVietcombank;
use App\Models\User;
use Crypt_RSA;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;
use TwoCaptcha\TwoCaptcha;

class VietcombankController extends Controller
{
	public $defaultPublicKey = "-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAikqQrIzZJkUvHisjfu5ZCN+TLy//43CIc5hJE709TIK3HbcC9vuc2+PPEtI6peSUGqOnFoYOwl3i8rRdSaK17G2RZN01MIqRIJ/6ac9H4L11dtfQtR7KHqF7KD0fj6vU4kb5+0cwR3RumBvDeMlBOaYEpKwuEY9EGqy9bcb5EhNGbxxNfbUaogutVwG5C1eKYItzaYd6tao3gq7swNH7p6UdltrCpxSwFEvc7douE2sKrPDp807ZG2dFslKxxmR4WHDHWfH0OpzrB5KKWQNyzXxTBXelqrWZECLRypNq7P+1CyfgTSdQ35fdO7M1MniSBT1V33LdhXo73/9qD5e5VQIDAQAB\n-----END PUBLIC KEY-----";
	public $clientPublicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCeEk3hNBXhvUKOl62RX2lf9KE1SZ3SCWu5qOWZsCcIBvD6fpDRP1iuKCmK49lAfP3ntdNRFN8i8MMYnaokZu+Pux3dywIiNVVLVCXFr00UcTR45M6hdbnLct9cJ+XLJIoJQW2TGz9xINErTMnvlj4n2uIm6nDv2AbR6Ii9+kq+iQIDAQAB";
	public $clientPrivateKey = "-----BEGIN RSA PRIVATE KEY-----\r\nMIICWwIBAAKBgQCeEk3hNBXhvUKOl62RX2lf9KE1SZ3SCWu5qOWZsCcIBvD6fpDR\r\nP1iuKCmK49lAfP3ntdNRFN8i8MMYnaokZu+Pux3dywIiNVVLVCXFr00UcTR45M6h\r\ndbnLct9cJ+XLJIoJQW2TGz9xINErTMnvlj4n2uIm6nDv2AbR6Ii9+kq+iQIDAQAB\r\nAoGAC3igljtFa0Bk2BxByE74QrJqEIfrIBb27l5Ha0PRUU/PpR4SPF0wflMD0MSA\r\nO6HWez5Cu5ucJdj7D4pBkqq1r8dd7OV+Fmx1NuRhMvbS6ZCMC3SuG9NiW5lA74zF\r\nn6rTLm4pOk1t4mFBkI1SSLn/qnTeY+8XL99qu1awcMYFMAECQQDKXYswd57B5gLL\r\n3K2plIMbvESIdGxFS2Km8VJn1uC+akE7VMiVlb+zPlI0+09mn0WfVt5Kfp5rmP+4\r\nTav2B38JAkEAx/dtVURT8kUePxOEiSwqqVpG1pAB3aLIoQ4TWNzw1X/0vEPT2kS5\r\ncM5kBqUtMmYEpyboTYgDIIAwapdALNmjgQJAeTJA9EwP5qysrA+EanWpd+jvWpHv\r\nbijR8o3A/rOwchoM603Bu+StpNoEPfrs+NcWyXErPI5MrsA5FtZd0MF4kQJAXCcA\r\ncb0NWqbTq4nZGEYMWwNJhfPTiEpOXzpXXCplql5PcLtpVDs7omra2d0hGQq+tjFN\r\n+PznRAEPTu/pGUIrAQJAeUexJMRoPXmxPjSSwNw4C+Exsysek+eiCsxj8fNibN5J\r\n1SwVsv30sUMm+n96Tmv/syE8xlXitb8+LMKvAE7anQ==\r\n-----END RSA PRIVATE KEY-----\r\n";
	public $url = [
		"getCaptcha" => "https://digiapp.vietcombank.com.vn/utility-service/v1/captcha/",
		"login" => "https://digiapp.vietcombank.com.vn/authen-service/v1/login",
		"getHistories" => "https://digiapp.vietcombank.com.vn/bank-service/v1/transaction-history",
		"tranferOut" => "https://digiapp.vietcombank.com.vn/napas-service/v1/init-fast-transfer-via-accountno",
		"genOtpOut" => "https://digiapp.vietcombank.com.vn/napas-service/v1/transfer-gen-otp",
		"genOtpIn" => "https://digiapp.vietcombank.com.vn/transfer-service/v1/transfer-gen-otp",
		"confirmTranferOut" => "https://digiapp.vietcombank.com.vn/napas-service/v1/transfer-confirm-otp",
		"confirmTranferIn" => "https://digiapp.vietcombank.com.vn/transfer-service/v1/transfer-confirm-otp",
		"tranferIn" => "https://digiapp.vietcombank.com.vn/transfer-service/v1/init-internal-transfer",
		"getBanks" => "https://digiapp.vietcombank.com.vn/utility-service/v1/get-banks",
		"getAccountDeltail" => "https://digiapp.vietcombank.com.vn/bank-service/v1/get-account-detail",
		"getlistAccount" => "https://digiapp.vietcombank.com.vn/bank-service/v1/get-list-account-via-cif"
	];
	public $captchaMode = 0;
	public $captchaApiKeys = [
		"0063422cec412fac797d7d61d0ca9b1d"
	];
	public $lang = 'vi';
	public $_timeout = 99999;
	public $DT = "Windows";
	public $OV = "10";
	public $PM = "Chrome 104.0.0.0";
	public $checkAcctPkg = "1";
	public $username = "0358278712";
	public $password = "Minh789@";
	public $account_number = "1026791182";
	public $captchaToken;
	public $sessionId;
	#account
	public $mobileId;
	public $clientId;
	public $cif;
	protected $captchaApiKey = "";

	public function setData($sessionId, $mobileId, $clientId, $cif)
	{
		$this->sessionId = $sessionId;
		$this->mobileId = $mobileId;
		$this->clientId = $clientId;
		$this->cif = $cif;
		return $this;
	}

	public function getlistAccount()
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"mid" => 8,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		$result = $this->curlPost($this->url['getlistAccount'], $param);

		return $result;

	}

	private function curlPost($url = "", $data = array())
	{
		try {
			$client = new Client(['http_errors' => false]);

			$res = $client->request('POST', $url, [
				'timeout' => 99999,
				'headers' => $this->headerNull(),
				'body' => json_encode($this->encryptData($data)),
			]);

			$result = json_decode($res->getBody()->getContents());

			return $this->decryptData($result);
		} catch (Exception $e) {
			return false;
		}
	}

	private function headerNull()
	{
		return array(
			'Accept' => 'application/json',
			'Accept-Encoding' => 'gzip, deflate, br',
			'Accept-Language' => 'vi',
			'Connection' => 'keep-alive',
			'Content-Type' => 'application/json',
			'Host' => 'digiapp.vietcombank.com.vn',
			'Origin' => 'https://vcbdigibank.vietcombank.com.vn',
			'Referer' => 'https://vcbdigibank.vietcombank.com.vn/',
			'sec-ch-ua-mobile' => '?0',
			'Sec-Fetch-Dest' => 'empty',
			'Sec-Fetch-Mode' => 'cors',
			'Sec-Fetch-Site' => 'same-site',
			'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36',
			'X-Channel' => 'Web',
		);


	}

	private function encryptData($str)
	{
		$str["clientPubKey"] = $this->clientPublicKey;
		$key = Str::random(32);
		$iv = Str::random(16);
		$rsa = new  Crypt_RSA();
		$rsa->loadKey($this->defaultPublicKey);
		$rsa->setEncryptionMode(2);
		$body = base64_encode($iv . openssl_encrypt(json_encode($str), 'AES-256-CTR', $key, OPENSSL_RAW_DATA, $iv));
		$header = base64_encode($rsa->encrypt(base64_encode($key)));
		return [
			'd' => $body,
			'k' => $header,
		];
	}

	private function decryptData($cipher)
	{
		$header = $cipher->k;
		$body = base64_decode($cipher->d);
		$rsa = new  Crypt_RSA();
		$rsa->loadKey($this->clientPrivateKey);
		$rsa->setEncryptionMode(2);
		$key = $rsa->decrypt(base64_decode($header));
		$iv = substr($body, 0, 16);
		$cipherText = substr($body, 16);
		$text = openssl_decrypt($cipherText, 'AES-256-CTR', base64_decode($key), OPENSSL_RAW_DATA, $iv);
		return json_decode($text);
	}

	public function getAccountDeltail()
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"accountNo" => $this->account_number,
			"accountType" => "D",
			"mid" => 13,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		$result = $this->curlPost($this->url['getAccountDeltail'], $param);

		return $result;

	}

	public function getBanks()
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"lang" => $this->lang,
			"fastTransfer" => "1",
			"mid" => 23,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		$result = $this->curlPost($this->url['getBanks'], $param);

		return $result;
	}

	public function createTranferOutVietCombank($bankCode, $account_number, $amount, $message)
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"lang" => $this->lang,
			"debitAccountNo" => $this->account_number,
			"creditAccountNo" => $account_number,
			"creditBankCode" => $bankCode,
			"amount" => $amount,
			"feeType" => 1,
			"content" => $message,
			"ccyType" => "1",
			"mid" => 62,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		$result = $this->curlPost($this->url['tranferOut'], $param);

		return $result;
	}

	public function createTranferInVietCombank($account_number, $amount, $message)
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"lang" => $this->lang,
			"debitAccountNo" => $this->account_number,
			"creditAccountNo" => $account_number,
			"amount" => $amount,
			"activeTouch" => 0,
			"feeType" => 1,
			"content" => $message,
			"ccyType" => "",
			"mid" => 16,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		$result = $this->curlPost($this->url['tranferIn'], $param);

		return $result;
	}

	public function genOtpTranFer($tranId, $type = "OUT")
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"lang" => $this->lang,
			"tranId" => $tranId,
			"type" => 5, // 1 là SMS,5 là smart otp
			"mid" => 17,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		if ($type == "IN") {
			$result = $this->curlPost($this->url['genOtpIn'], $param);
		} else {
			$result = $this->curlPost($this->url['genOtpOut'], $param);
		}
		return $result;
	}

	public function confirmTranfer($tranId, $challenge, $otp, $type = "OUT")
	{
		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"lang" => $this->lang,
			"tranId" => $tranId,
			"otp" => $otp,
			"challenge" => $challenge,
			"mid" => 18,
			"cif" => $this->cif,
			"user" => $this->username,
			"mobileId" => $this->mobileId,
			"clientId" => $this->clientId,
			"sessionId" => $this->sessionId
		);

		if ($type == "IN") {
			$result = $this->curlPost($this->url['confirmTranferIn'], $param);
		} else {
			$result = $this->curlPost($this->url['confirmTranferOut'], $param);
		}
		return $result;
	}

	public function index()
	{

		$history = $this->getHistories();

		if (isset($history->transactions)) {
			foreach ($history->transactions as $item) {
				$data = transactionsVietcombank::where('Reference', $item->Reference)->get();
				if (count($data) > 0) {
					continue;
				} else {
					$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
					$created_at = $date->format('Y-m-d H:i:s');
					transactionsVietcombank::create([
						'id' => Null,
						'TransactionDate' => $item->TransactionDate,
						'Reference' => $item->Reference,
						'CD' => $item->CD,
						'Amount' => $item->Amount,
						'Description' => $item->Description,
						'PCTime' => $item->PCTime,
						'created_at' => $created_at,
						'updated_at' => $created_at,
					]);
				}
			}
		} else {
			$this->doLogin();

			$this->index();
		}

		$this->updateRecharge();

		$user_role = Auth::user()->role();

		if ($user_role == 'admin') {
			return view('pages.vietcombank.index', compact('history'));
		}

		if ($user_role == 'partner') {
			return view('users.vietcombank.index', compact('history'));
		}
	}

	public function getHistories()
	{
		$date = Carbon::now();
		$toDate = $date->format('d/m/Y');
		$fromDate = $date->subDays(30)->format('d/m/Y');

		$object = System::where('id', 999)->first();
		$this->captchaKey = $object->vcb_captchaKey ?? "0063422cec412fac797d7d61d0ca9b1d";
		$this->_timeout = 9999;
		$this->username = $object->vcb_username;
		$this->password = $object->vcb_password;
		$this->account_number = $object->vcb_account_number;
		$this->sessionId = $object->vcb_sessionId;
		$this->mobileId = $object->vcb_mobileId;
		$this->clientId = $object->vcb_clientId;
		$this->cif = $object->vcb_cif;


		if (isset($this->mobileId) && isset($this->clientId) && isset($this->sessionId) && isset($this->cif)) {
			$param = array(
				"DT" => $this->DT,
				"OV" => $this->OV,
				"PM" => $this->PM,
				"accountNo" => $this->account_number,
				"accountType" => "D",
				"fromDate" => $fromDate,
				"toDate" => $toDate,
				"lang" => $this->lang,
				"pageIndex" => 0,
				"lengthInPage" => 999999,
				"stmtDate" => "",
				"stmtType" => "",
				"mid" => 14,
				"cif" => $this->cif,
				"user" => $this->username,
				"mobileId" => $object->vcb_mobileId,
				"clientId" => $object->vcb_clientId,
				"sessionId" => $object->vcb_sessionId,
			);

			$result = $this->curlPost($this->url['getHistories'], $param);

			return $result;
		}

	}

	public function doLogin()
	{
		$solveCaptcha = $this->solveCaptcha();

		$param = array(
			"DT" => $this->DT,
			"OV" => $this->OV,
			"PM" => $this->PM,
			"captchaToken" => $solveCaptcha['key'],
			"captchaValue" => $solveCaptcha['captcha'],
			"checkAcctPkg" => $this->checkAcctPkg,
			"lang" => $this->lang,
			"mid" => 6,
			"password" => $this->password,
			"user" => $this->username
		);

		$result = $this->curlPost($this->url['login'], $param);

		if (isset($result->code) && $result->code == 00) {
			$this->sessionId = $result->sessionId;
			$this->mobileId = $result->userInfo->mobileId;
			$this->clientId = $result->userInfo->clientId;
			$this->cif = $result->userInfo->cif;

			$data = [
				'vcb_sessionId' => $this->sessionId,
				'vcb_mobileId' => $this->mobileId,
				'vcb_clientId' => $this->clientId,
				'vcb_cif' => $this->cif
			];

			$object = System::where('id', 999)->first();
			if ($object) {
				$object->update($data);
				$object->save();
			}

			return array(
				'success' => true,
				'message' => "success",
				'data' => $result ?: ""
			);

		} else {
			return array(
				'success' => false,
				'message' => $result->des,
				"param" => $param,
				'data' => $result ?: ""
			);
		}
	}

	public function solveCaptcha()
	{
		$getCaptcha = $this->getCaptcha();
		$solver = new TwoCaptcha($this->captchaApiKeys[$this->captchaMode]);
		$curl = $solver->normal(['base64' => $getCaptcha, 'numeric' => 1]);

		$this->captchaValue = $curl->code;

		return ["status" => true, "key" => $this->captchaToken, "captcha" => $this->captchaValue];
	}

	public function getCaptcha()
	{
		$this->captchaToken = Str::random(30);
		$url = "https://digiapp.vietcombank.com.vn/utility-service/v1/captcha/" . $this->captchaToken;
		$client = new Client(['http_errors' => false]);

		$res = $client->request('GET', $url, [
			'timeout' => 99999,
			'headers' => array(
				'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'
			),
		]);

		$result = $res->getBody()->getContents();

		return base64_encode($result);
	}

	public function updateRecharge()
	{
		$listRe = Recharge::where('trang_thai', '!=', 'success')
			->where('trang_thai', '!=', 'confirm')
			->where('trang_thai', '!=', 'cancel')
			->get();

		foreach ($listRe as $re) {
			if (isset($re->text)) {
				foreach (transactionsVietcombank::all() as $k => $vlue) {
					$pattern = "/";
					$pattern .= $re->text;
					$pattern .= "/i";
					$subject = $vlue->Description;

					$check = preg_match($pattern, $subject);

					if ($check) {
						$object = Recharge::where('id', $re->id)->first();
						// đúng noi dung , dung so tien

						//							$amount_vcb = (int) $vlue->Amount * 1000;
						$amount_vcb = (int)str_replace(',', '', $vlue->Amount);

						Telegram::sendMessage([
							'chat_id' => "1281282845",
							'parse_mode' => 'HTML',
							'text' => (int)$amount_vcb
						]);

						if ($amount_vcb == $object->amount && $object->trang_thai == 'pending') {
							// update Recharge
							$arr['trang_thai'] = 'success';
							$arr['comment_api'] = $subject;
							$arr['id'] = $re->id;

							$object->update($arr);
							$object->save();

							event(new SuccessCallBack($arr));

							$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
							$created_at = $date->format('d-m-Y H:i:s');

							$partners = User::where('id', $object->id_partners)->first();
							$data_arr = [
								'so_du' => (int)$partners->so_du + $amount_vcb,
							];
							$partners->update($data_arr);
							$partners->save();

							$txt = 'có text:' . $pattern . ' bên trong API VCB:  ' . $subject;

							Telegram::sendMessage([
								'chat_id' => "1281282845",
								'parse_mode' => 'HTML',
								'text' => $txt
							]);

							$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
								. "<b>Đã Cộng Số Tiền: </b>\n"
								. number_format($amount_vcb, 0, '', ',') . "\n"
								. "<b> Tổng Cộng : </b>\n"
								. number_format($data_arr['so_du'], 0, '', ',') . "\n"
								. "<b> Cho Đối Tác  : </b>\n"
								. $partners->first_name . "\n"
								. "<b> Người Duyệt   : </b>\n"
								. "Cron Job: VCB\n"
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
							$arr['comment_api'] = $subject;

							$object->update($arr);
							$object->save();

							$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
							$created_at = $date->format('d-m-Y H:i:s');

							$partners = User::where('id', $object->id_partners)->first();

							$txt = 'có text:' . $pattern . ' bên trong API VCB:  ' . $subject;

							Telegram::sendMessage([
								'chat_id' => "1281282845",
								'parse_mode' => 'HTML',
								'text' => $txt
							]);

							$text_content = "<b>Yêu Cầu Nạp Tiền Cập Nhật Chờ Xác Nhận:</b>\n"
								. "<b>Số Tiền Yêu Cầu: </b>\n"
								. number_format($object->amount, 0, '', ',') . "\n"
								. "<b>Số Tiền Chuyển Khoản: </b>\n"
								. number_format($amount_vcb, 0, '', ',') . "\n"
								. "<b> Chờ Admin xử lý , không cộng tiền cho đối tác : </b>\n"
								. $partners->first_name . "\n"
								. "<b> Người Duyệt   : </b>\n"
								. "Cron Job: VCB\n"
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

	public function loading()
	{
		$history = $this->getHistories();

		if (isset($history->transactions)) {
			foreach ($history->transactions as $item) {
				$data = transactionsVietcombank::where('Reference', $item->Reference)->get();
				if (count($data) > 0) {
					continue;
				} else {
					$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
					$created_at = $date->format('d-m-Y H:i:s');
					transactionsVietcombank::create([
						'id' => Null,
						'TransactionDate' => $item->TransactionDate,
						'Reference' => $item->Reference,
						'CD' => $item->CD,
						'Amount' => $item->Amount,
						'Description' => $item->Description,
						'PCTime' => $item->PCTime,
						'created_at' => $created_at,
						'updated_at' => $created_at,
					]);
				}
			}

			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => 'VCB - transactions : ' . count($history->transactions)
			]);


		} else {

			$this->doLogin();

			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => 'VCB - Login Again  : ' . count($history->transactions)
			]);

			$this->loading();
		}

		$this->updateRecharge();
	}

}
