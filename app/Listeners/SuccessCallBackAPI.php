<?php
	
	namespace App\Listeners;
	
	use App\Events\SuccessCallBack;
	use App\Models\Partners;
	use App\Models\Recharge;
	use App\Models\User;
	use Carbon\Carbon;
	use GuzzleHttp\Client;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Queue\InteractsWithQueue;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Str;
	use Telegram\Bot\Laravel\Facades\Telegram;
	
	class SuccessCallBackAPI
	{
		/**
		 * Create the event listener.
		 *
		 * @return void
		 */
		
		public function __construct()
		{
		
		}
		
		/**
		 * Handle the event.
		 *
		 * @param \App\Events\SuccessCallBack $event
		 * @return void
		 */
		public function handle(SuccessCallBack $event)
		{
			$object = Recharge::where('id', $event->recharge['id'])->first();
			$partners = User::where('id', $object->id_partners)->first();
			
			if (isset($partners) && isset($object)) {
				$tranIDHistory = $object->tranIDHistory;
				$tranID = $object->tranID;
				$amount = (int)$object->amount;
				$comment = $object->comment;
				$keyID = $object->number_TranID;
                $status = $object->trang_thai;
				$key = $partners->key;
				$auth_token = $partners->access_token;
				$access_token = $partners->access_token;
				$link_callback = $partners->callback_link ?? "#";
				$signature = md5($tranID . '|' . $amount . '|' . $comment . '|' . $key . '|' . $access_token);
				$phoneAccount = $object->number1;
				$phoneCustomer = '';
				$nameCustomer = '';
				
				// chuan bi data
				$type = 1;
				$data_curl = array();
				$data_curl['url'] = $link_callback;
				$data_curl['auth_token'] = $auth_token;
				$data_curl['method'] = "POST";
				$data_curl['http_errors'] = false;
				$data_curl['header'] = [
					'Content-Type: application/json',
					'Accept' => 'application/json',
					'Content-Type' => 'application/json',
					'Authorization' => "Bearer {$auth_token}",
				];
				
				$data_curl['data_body'] = [
					'tranID' => $tranID,
					'keyID' => $tranID,
					'phoneAccount' => $phoneAccount,
					'phoneCustomer' => $phoneCustomer,
					'nameCustomer' => $nameCustomer,
					'comment' => $comment,
					'amount' => $amount,
					'type' => $type,
                    'status' => $status,
					'signature' => $signature,
				];
				
				$result_request = json_decode($this->request($data_curl));
				
				if ($result_request == 200) {
					$arr['trang_thai'] = "success";
					$arr['callback'] = "success";
					$arr['callback_result'] = 200;
					$object = Recharge::where('id', $event->recharge['id'])->first();
					$object->update($arr);
					$object->save();
//					echo "Result: " . $result_request;
					
//					$text_content = "<b>CallBack Thành Công:</b>\n"
//						. "<b> Đối Tác : </b>\n"
//						. $partners->first_name . "\n"
//						. "<b> URL : </b>\n"
//						. $data_curl['url'] . "\n"
//						. "<b> Kết Quả  : </b>\n"
//						. $arr['callback_result'] . "\n"
//						. "<b> CallBack bởi    : </b>\n"
//						. Auth::user()->first_name . "\n"
//						. "<b> Cập Nhật Lúc : </b>\n"
//						. now();
//
//					Telegram::sendMessage([
//						'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
//						'parse_mode' => 'HTML',
//						'text' => $text_content
//					]);
					
				} else {
					
					$arr['trang_thai'] = "success";
					$arr['callback'] = "success";
					$arr['callback_result'] = 404;
					$arr['callback_time'] = (int)$object->callback_time + 1;
					$object = Recharge::where('id', $event->recharge['id'])->first();
					$object->update($arr);
					$object->save();
//					echo "Result: " . $result_request;
					
//					$text_content = "<b>CallBack Thất Bại:</b>\n"
//						. "<b> Đối Tác : </b>\n"
//						. $partners->first_name . "\n"
//						. "<b> URL : </b>\n"
//						. $data_curl['url'] . "\n"
//						. "<b> Kết Quả  : </b>\n"
//						. $arr['callback_result'] . "\n"
//						. "<b> CallBack bởi    : </b>\n"
//						. Auth::user()->first_name . "\n"
//						. "<b> Cập Nhật Lúc : </b>\n"
//						. now();
//
//					Telegram::sendMessage([
//						'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
//						'parse_mode' => 'HTML',
//						'text' => $text_content
//					]);
				}
				
				return;
			}
			
			return;
		}
		
		public function request($data_curl)
		{
			
			$data_curl['method'] = (!empty($data_curl['method'])) ? $data_curl['method'] : "POST";
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $data_curl['method']);
			curl_setopt($curl, CURLOPT_URL, $data_curl['url']);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_ENCODING, '');
			curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
			curl_setopt($curl, CURLOPT_TIMEOUT, 5);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_curl['data_body']));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $data_curl['header']);
			$response = curl_exec($curl);
			$error_msg = curl_error($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);
			
			
			if (isset($error_msg)) {
				$httpcode = 500;
//				echo "cURL Error #:" . $error_msg;
			}
			
			return $httpcode;
		}
	}
