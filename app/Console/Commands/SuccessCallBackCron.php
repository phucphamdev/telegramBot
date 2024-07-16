<?php
	
	namespace App\Console\Commands;
	
	use App\Models\Recharge;
	use App\Models\User;
	use Illuminate\Console\Command;
	
	class SuccessCallBackCron extends Command
	{
		/**
		 * The name and signature of the console command.
		 *
		 * @var string
		 */
		protected $signature = 'SuccessCallBack:cron';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = 'Command SuccessCallBack';
		
		/**
		 * Execute the console command.
		 *
		 * @return int
		 */
		public function handle()
		{
			
			$recharge  = Recharge::where('callback','success')->get();
			
			if(count($recharge) >0)
			{
				foreach ($recharge as $item)
				{
					$object = Recharge::where('id', $item['id'])->first();
					$partners = User::where('id', $object->id_partners)->first();
					
					if (isset($partners) && isset($object))
					{
						$tranIDHistory = $object->tranIDHistory;
						$tranID = $object->tranID;
						$amount = (int)$object->amount;
						$comment = $object->comment;
						$keyID = $object->number_TranID;
						$key = $partners->key;
                        $status = $object->trang_thai;
						$auth_token = $partners->access_token;
						$access_token = $partners->access_token;
						$link_callback = $partners->callback_link;
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
						
						echo 'HTTP code: ' . $result_request;
						
					}
				}
			}
			
			echo("<script>console.log('SuccessCallBack:cron Run Success');</script>");
			
			return Command::SUCCESS;
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
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_curl['data_body']));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $data_curl['header']);
			$response = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);
			
			return $httpcode;
		}
	}
