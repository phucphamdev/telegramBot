<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\TPBankDataTable;
	use App\Events\SuccessCallBack;
	use App\Helper\Bank\TPBankNDH;
	use App\Models\Recharge;
	use App\Models\System;
	use App\Models\TPBank as modelTPBank;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Carbon;
	use Telegram\Bot\Laravel\Facades\Telegram;
	
	class TPBankNDHController extends Controller
	{
		public function index()
		{
			$history = $this->getHistories();
			
			if (empty($history)) {
				$this->doLogin();
				$history = $this->getHistories();
			}
			
			if (isset($history['transactionInfos'])) {
				$this->processTransactionInfos($history['transactionInfos']);
			}
			
			$this->updateRechargeTpbnk();
			
			$history = isset($history['transactionInfos']) ? $history['transactionInfos'] : [];
			
			return view('pages.tpbank.index', compact('history'));
		}
		
		public function loading()
		{
			$history = $this->getTransactionHistory();
			$this->processTransactionHistory($history);
			$this->sendTelegramMessage($history);
			$this->updateRechargeTpbnk();
		}
		
		public function getTransactionHistory()
		{
			$history = $this->getHistories();
			
			if(isset($history['transactionInfos']))
			{
				$transactionInfos = count($history['transactionInfos']) > 0 ?? "transactionInfos : 0";
				
				Telegram::sendMessage([
				  'chat_id' => "1281282845",
				  'parse_mode' => 'HTML',
				  'text' => 'TPBank Ha88 - NDH - transactionInfos  : ' . $transactionInfos
				]);
				
				return $history['transactionInfos'];
			}
			
			return [];
		}
		
		public function processTransactionHistory($history)
		{
			if (count($history) > 0) {
				$this->processTransactionInfos($history);
			} else {
				$this->doLogin();
				$history = $this->getTransactionHistory();
				$this->processTransactionInfos($history);
			}
		}
		
		private function sendTelegramMessage($history)
		{
			$thongbao = count($history) > 0 ? count($history) : " No Data";
			
			Telegram::sendMessage([
			  'chat_id' => "1281282845",
			  'parse_mode' => 'HTML',
			  'text' => 'TPBank Ha88 - NDH - transactionHistoryList  : ' . $thongbao
			]);
		}
		
		public function processTransactionInfos($transactionInfos)
		{
			foreach ($transactionInfos as $key => $value) {
				$this->processTransactionInfo($value);
			}
		}
		
		public function processTransactionInfo($transactionInfo)
		{
			$tp = modelTPBank::where('reference', $transactionInfo['reference'])->get();
			
			if ($tp->isEmpty()) {
				$date = Carbon::now();
				$created_at = $date->format('Y-m-d H:i:s');
				
				$data = [
				  'arrangementId' => $transactionInfo['arrangementId'],
				  'account' => '00003724728',
				  'reference' => $transactionInfo['reference'],
				  'description' => $transactionInfo['description'],
				  'bookingDate' => $transactionInfo['bookingDate'],
				  'valueDate' => $transactionInfo['valueDate'],
				  'amount' => $transactionInfo['amount'],
				  'currency' => $transactionInfo['currency'],
				  'creditDebitIndicator' => $transactionInfo['creditDebitIndicator'],
				  'runningBalance' => $transactionInfo['runningBalance'],
				  'created_at' => $created_at,
				  'updated_at' => $created_at,
				];
				
				modelTPBank::create($data);
			}
		}
		
		public function updateRechargeTpbnk()
		{
			$listReApi = Recharge::orderBy('id', 'desc')->take(100)->get()->toArray();
			$api_data = \App\Models\TPBank::orderBy('id', 'desc')->take(100)->get()->toArray();
			
			if (count($api_data) > 0) {
				foreach ($listReApi as $res) {
					switch ($res['trang_thai']) {
						case 'success':
							$this->updateRechargeTpbnkSuccess($res, $api_data);
							break;
						case 'pending':
						case 'cancel':
						case 'confirm':
							$this->updateRechargeTpbnkNotSuccess($res, $api_data);
							break;
						default:
							Telegram::sendMessage([
							  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							  'parse_mode' => 'HTML',
							  'text' => 'updateRechargeTpbnk error'
							]);
							break;
					}
				}
			}
		}
		
		public function updateRechargeTpbnkSuccess($res, $api_data)
		{
			foreach ($api_data as $api) {
				$cleanString = preg_replace('/\s+/', '', $api['description']);
				
				if (empty($api['api']) && str_contains($cleanString, str_replace(' ', '', $res['comment']))) {
					// Update TPBank object with API comment
					$this->updateTPBankObject($res['comment'], $api['id']);
					$created_at = $this->getCurrentDateTimeInVietnam();
					$amount_tpbank = (int)$api['amount'];
					
					//nap tien
					$obj2 = Recharge::where('comment', $res['comment'])->first();
					
					if (empty($obj2->comment_api)) {
						$arr['comment_api'] = $api['description'];
						$obj2->update($arr);
						
						$partners = User::find($obj2->id_partners);
						
						if ($partners && $api['description']) {
							$this->notifyAdminAndPartners($obj2, $partners, $amount_tpbank, $api['description'], $created_at);
						} else {
							$this->notifyUpdateRechargeError();
						}
					}
				}
			}
		}
		
		public function notifyAdminAndPartners($obj2, $partners, $amount_tpbank, $description, $created_at)
		{
			$text_content = "<b>CRON TPBANK CẬP NHẬT API SAU KHI ADMIN CHẤP NHẬN THÀNH CÔNG:</b>\n"
			  . "<b>Yêu Cầu: </b>\n"
			  . number_format($obj2->amount, 0, '', ',') . "\n"
			  . "<b>Chuyển Khoản: </b>\n"
			  . number_format($amount_tpbank, 0, '', ',') . "\n"
			  . "<b> KHÔNG CỘNG TIỀN CHO ĐỐI TÁC VÌ ADMIN ĐÃ XỬ LÝ RỒI : </b>\n"
			  . $partners->first_name . "\n"
			  . "<b> Binh Luan : </b>\n"
			  . $description . "\n"
			  . "<b> Người Duyệt   : </b>\n"
			  . "Cron Job: TPBank Ha88 - NDH\n"
			  . "<b> Cập Nhật Lúc : </b>\n"
			  . $created_at;
			
			Telegram::sendMessage([
			  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
			  'parse_mode' => 'HTML',
			  'text' => $text_content
			]);
		}
		
		public function notifyUpdateRechargeError()
		{
			Telegram::sendMessage([
			  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
			  'parse_mode' => 'HTML',
			  'text' => 'updateRechargeTpbnkSuccess error - partners or api : description'
			]);
		}
		
		public function updateRechargeTpbnkNotSuccess($res, $api_data)
		{
			foreach ($api_data as $api) {
				$cleanString = preg_replace('/\s+/', '', $api['description']);
				
				if (str_contains($cleanString, str_replace(' ', '', $res['comment']))) {
					// Update TPBank object with API comment
					$this->updateTPBankObject($res['comment'], $api['id']);
					
					// Find and process Recharge object
					$obj2 = Recharge::where('comment', $res['comment'])->first();
					$amount_tpbank = (int)$api['amount'];
					$created_at = $this->getCurrentDateTimeInVietnam();
					
					// neu pending va chua co noi dung api
					if ($obj2->trang_thai == 'pending' && empty($obj2->comment_api)) {
						if ($amount_tpbank != $obj2->amount) {
							// update Recharge
							$arr['trang_thai'] = 'cancel';
							$arr['comment_api'] = $api['description'];
							$obj2->update($arr);
							
							$partners = User::find($obj2->id_partners);
							
							if ($partners && $api['description']) {
								$txt = 'có text:' . $res['text'] . ' bên trong API TPBank:  ' . $api['description'];
								
								Telegram::sendMessage([
								  'chat_id' => "1281282845",
								  'parse_mode' => 'HTML',
								  'text' => $txt
								]);
								
								$text_content = "<b>CRON JOB TPBANK CẬP NHẬT NẠP TIỀN:</b>\n"
								  . "<b>Yêu Cầu: </b>\n"
								  . number_format($obj2->amount, 0, '', ',') . "\n"
								  . "<b>Chuyển Khoản: </b>\n"
								  . number_format($amount_tpbank, 0, '', ',') . "\n"
								  . "<b> Không Cộng Tiền Cho Đối Tác : </b>\n"
								  . $partners->first_name . "\n"
								  . "<b> Người Duyệt   : </b>\n"
								  . "Cron Job: TPBank Ha88 - NDH\n"
								  . "<b> Cập Nhật : </b>\n"
								  . $created_at;
								
								Telegram::sendMessage([
								  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								  'parse_mode' => 'HTML',
								  'text' => $text_content
								]);
							} else {
								Telegram::sendMessage([
								  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								  'parse_mode' => 'HTML',
								  'text' => 'updateRechargeTpbnkNotSuccess : erro '
								]);
							}
						} else {
							// update Recharge
							$arr['trang_thai'] = 'success';
							$arr['comment_api'] = $api['description'];
							$arr['id'] = $res['id'];
							
							$obj2->update($arr);
							
							event(new SuccessCallBack($arr));
							
							$partners = User::find($obj2->id_partners);
							$data_arr = [
							  'so_du' => (int)$partners->so_du + $amount_tpbank,
							];
							$partners->update($data_arr);
							$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
							  . "<b>Đã Cộng Số Tiền: </b>\n"
							  . number_format($amount_tpbank, 0, '', ',') . "\n"
							  . "<b> Tổng Cộng : </b>\n"
							  . number_format($data_arr['so_du'], 0, '', ',') . "\n"
							  . "<b> Đối Tác  : </b>\n"
							  . $partners->first_name . "\n"
							  . "<b> Người Duyệt   : </b>\n"
							  . "Cron Job: TPBank Ha88 - NDH\n"
							  . "<b> Cập Nhật : </b>\n"
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
						if ($amount_tpbank == $obj2->amount) {
							// update Recharge
							$arr['trang_thai'] = 'cancel';
							$arr['comment_api'] = $api['description'];
							$arr['id'] = $res['id'];
							
							$obj2->update($arr);
							$obj2->save();
							
							$partners = User::find($obj2->id_partners);
							$data_arr = [
							  'so_du' => (int)$partners->so_du + $amount_tpbank,
							];
							$partners->update($data_arr);
							
							event(new SuccessCallBack($arr));
							
							if ($partners && $data_arr['so_du']) {
								$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
								  . "<b>Đã Cộng Số Tiền: </b>\n"
								  . number_format($amount_tpbank, 0, '', ',') . "\n"
								  . "<b> Tổng Cộng : </b>\n"
								  . number_format($data_arr['so_du'], 0, '', ',') . "\n"
								  . "<b> Cho Đối Tác  : </b>\n"
								  . $partners->first_name . "\n"
								  . "<b> Người Duyệt   : </b>\n"
								  . "Cron Job: TPBank Ha88 - NDH\n"
								  . "<b> Cập Nhật Lúc : </b>\n"
								  . $created_at;
								
								Telegram::sendMessage([
								  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								  'parse_mode' => 'HTML',
								  'text' => $text_content
								]);
								
							} else {
								Telegram::sendMessage([
								  'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								  'parse_mode' => 'HTML',
								  'text' => 'updateRechargeTpbnkNotSuccess : trang_thai - cancel '
								]);
							}
						} else // đúng noi dung , sai so tiền
						{
							// update Recharge
							$arr['trang_thai'] = 'cancel';
							$arr['comment_api'] = $api['description'];
							$obj2->update($arr);
							
							$partners = User::find($obj2->id_partners);
							$txt = 'có text:' . $res['text'] . ' bên trong API TPbank:  ' . $api['description'];
							
							Telegram::sendMessage([
							  'chat_id' => "1281282845",
							  'parse_mode' => 'HTML',
							  'text' => $txt
							]);
							
							$text_content = "<b>CRON JOB TPBANK CẬP NHẬT YÊU CẦU NẠP TIỀN:</b>\n"
							  . "<b>Yêu Cầu: </b>\n"
							  . number_format($obj2->amount, 0, '', ',') . "\n"
							  . "<b>Chuyển Khoản: </b>\n"
							  . number_format($amount_tpbank, 0, '', ',') . "\n"
							  . "<b> Không Cộng Tiền Cho Đối Tác : </b>\n"
							  . $partners->first_name . "\n"
							  . "<b> Binh Luan : </b>\n"
							  . $api['description'] . "\n"
							  . "<b> Người Duyệt   : </b>\n"
							  . "Cron Job: TPBank Ha88 - NDH\n"
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
		
		public function updateTPBankObject($comment, $id)
		{
			$arr = ['api' => $comment];
			$obj = \App\Models\TPBank::find($id);
			$obj->update($arr);
		}
		
		public function getCurrentDateTimeInVietnam()
		{
			return \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
		}
		
		public function update2(Request $request)
		{
			$data = $request->only([
			  'tpbank_username',
			  'tpbank_password',
			  'tpbank_debtorAccountNumber'
			]);
			
			$object = System::find(1002);
			
			if ($object) {
				$object->update($data);
			}
			
			return redirect()->intended('system');
		}
		
		public function doLogin()
		{
			$object = System::where('id', 1002)->first();
			$data['username'] = $object->tpbank_username;
			$data['password'] = $object->tpbank_password;
			$data['debtorAccountNumber'] = $object->tpbank_debtorAccountNumber;
			
			$tpbank = new TPBankNDH();
			$get_imei = $tpbank->get_imei();
			$tpbank->setData($get_imei, "samsung");
			
			$login = $tpbank->doLogin();
			
			if (isset($login['access_token']) && $login['access_token']) {
				$tpbank->setToken($login['access_token'], $data['debtorAccountNumber']);
				
				return Response()->json('thanhcong');
			}
			return Response()->json('loi');
		}
		
		public function getInfo()
		{
			$tpbank = new TPBankNDH();
			return $tpbank->getInfo();
		}
		
		public function getHistories()
		{
			$tpbank = new TPBankNDH();
			
			$dt = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$to = $dt->format('Ymd');
			$from = $dt->subDays(7)->format('Ymd');
			
			return $tpbank->getHistories($to, $from);
		}
	}
