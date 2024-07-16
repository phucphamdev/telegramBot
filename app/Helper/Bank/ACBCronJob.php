<?php
	
	namespace App\Helper\Bank;
	
	use App\Models\Acbank;
	use App\Models\System;
	use GuzzleHttp\Client;
	use Illuminate\Support\Carbon;
	use mysql_xdevapi\Exception;
	
	class ACBCronJob
	{
		public $accountNumber;
		public $username;
		public $password;
		public $cookies;
		public $currentUser;
		public $lastinfo;
		public $userDetails;
		public $listAccount;
		public $clientId;
		public $bankCode;
		public $account;
		public $transactions;
		public $size;
		public $page;
		public $total;
		public $receiveAccount;
		public $mbTransactionLimitInfo;
		public $tranferFee;
		public $tranfer_local_data;
		public $bankLists;
		public $refreshToken;
		public $identity;
		public $accessToken;
		public $took;
		public $shortName;
		
		public function __construct()
		{
			$object = System::where('id', 999)->first();
			$this->shortName = 'ACB';
			$this->accountNumber = $object->acb_accountNumber;
			$this->username = $object->acb_username;
			$this->password = $object->acb_password;
			$this->cookies = [];
			$this->currentUser = [];
			$this->lastinfo = '';
		}
		
		public function addAccount2db()
		{
			$result = Acbank::create([
				'id' => Null,
				'accountNumber' => $this->accountNumber,
				'username' => $this->username,
				'password' => $this->password,
				'shortName' => $this->shortName,
			]);
			
			if ($result) {
				
				echo 'create user thanh cong!! ';
				
			} else {
				
				echo 'Can not insert account';
				
			}
		}
		
		public function updateCookies2DB()
		{
			if ($this->cookies && isset($this->username)) {
				$user = Acbank::where('username', $this->username)->first();
				
				iF(isset($user))
				{
					$data_update = [
						'cookies' => $this->cookies,
						'currentUser' => $this->currentUser,
					];
					
					$user->update($data_update);
					$user->save();
					
					echo 'Cap nhat cookies thành công';
					
					
				}else
				{
					echo "Upate cookies faild:";
				}
				
				
			
				
				
			}
			
			
		}
		
		public function init()
		{
			if (isset($this->username) && isset($this->password)) {
				$data = Acbank::where('username', $this->username)->first();
				$user = json_decode($data->cookies);
				
				if (empty($user)) {
					$this->addAccount2db();
				} else {
					
					$this->lastinfo = $user;
					
				}
				
				$need2_int_new = false;
				
				
				try {
					if (isset($this->lastinfo)) {
						$last_data = $this->lastinfo;
						$this->cookies = $last_data->cookies;
						$this->currentUser = $last_data->currentUser;
						
						echo "Loaded last data ";
					} else {
						$need2_int_new = true;
					}
					
				} catch (Exception $exception) {
					$need2_int_new = true;
				} finally {
					if ($need2_int_new) {
						echo  "  need2_int_new  true - ACB inited successful";
					} else {
						echo  "  need2_int_new -  false - ACB inited successful";
					}
				}
			} else {
				
				echo 'username va password empty roi ';
			}
		}
		
		public function Authorization()
		{
			$acc = $this->currentUser->accessToken;
			
			if (empty($acc))
			{
				echo 'Authorization NULL';
			}
			else
			{
				
				$replace_str = array('"');
				$acc = str_replace($replace_str, "",$acc);

				//echo $acc;
				
				return 'bearer ' . $acc;
			}
		}
		
		public function request($data, $type)
		{
			if ($type == 1) {
				$client = new Client(['http_errors' => false]);
				
				$res = $client->request($data['method'], $data['url'],
					[
						'timeout' => 15,
						'headers' => $data['header'],
						'body' => json_encode($data['data_body'] ?? []),
					]);
				
				return $res->getBody()->getContents();
				
			}
			
			if ($type == 2) {
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_URL => $data['url'],
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 15,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => $data['method'],
					CURLOPT_POSTFIELDS => json_encode($data['data_body'] ?? []),
					CURLOPT_HTTPHEADER => $data['header']
				));
				
				$response = curl_exec($curl);
				echo "<pre>";
				print_r($response);
				echo "</pre>";
				
				
				curl_close($curl);
				
				if (gettype($response) == 'string') {
					$response = json_decode($response, true);
				} elseif (gettype($response) == "object") {
					$response = json_decode(json_encode($response), true);
				}
				
				return $response;
			}
		}
		
		public function getListAccountPayments()
		{
			$data['header'] = [
				'Host' => 'apiapp.acb.com.vn',
				'Accept' => 'application/json, text/plain, */*',
				'Connection' => 'keep-alive',
				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
				'Accept-Language' => 'vi',
				'Authorization' => $this->Authorization(),
			];
			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/list/account-payment";
			$data['data_body'] = [
				'Content-Type' => 'application/json'
			];
			$data['method'] = "POST";
			
			$response = $this->request($data, 2);
			
			if (isset($response)) {
				$this->listAccount = $response;
			}
		}
		
		public function getUserDetails()
		{
			$data['header'] = [
				'Host' => 'apiapp.acb.com.vn',
				'Accept' => 'application/json, text/plain, */*',
				'Connection' => 'keep-alive',
				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
				'Accept-Language' => 'vi',
				'Authorization' => $this->Authorization(),
			];
			$data['method'] = "POST";
			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/user/details";
			$data['data_body'] = [
				'Content-Type' => 'application/json'
			];
			
			$response = $this->request($data, 2);
			
			if ($response) {
				$this->userDetails = $response;
			}
			
			return $this->userDetails;
		}
		
		public function checkLogin()
		{
			$listAccount = $this->getListAccountPayments();
			if (isset($listAccount) && $listAccount)
			{
				$this->listAccount = $listAccount;
				echo $this->listAccount;
			} else {
				echo "login chua thanh cong , ket thuc";
				return;
			}
		}
		
		public function login()
		{
			$data['header'] = [
				'Host' => 'apiapp.acb.com.vn',
				'Accept' => 'application/json, text/plain, */*',
				'Content-Type' => 'application/json',
				'Connection' => 'keep-alive',
				'Accept-Language' => 'vi',
				'Accept-Encoding' => 'gzip, deflate, br',
				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
				'Cookie' => ''
			];
			
			$data['url'] = "https://apiapp.acb.com.vn/mb/auth/tokens";
			$data['method'] = "POST";
			$data['data_body'] = [
				'username' => $this->username,
				'password' => $this->password,
				'clientId' => "iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm",
//				'json' => [
//					'username' => $this->username,
//					'password' => $this->password,
//					'clientId' => "iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm",
//				],
			];
			
			$response = json_decode($this->request($data, 1));
			
			if (isset($response->accessToken) && $response)
			{
				$this->currentUser = $response;
				
				echo "ACB login thanh cong";
				
				return  true;
			} else {
				$this->userDetails = [];
				return false;
			}
		}
		
		public function run_login()
		{
			$this->cookies = [];
			$this->currentUser = [];
			$this->lastinfo = '';
			
			$result = $this->login();
			
			if ($result) {
				$checkLogin = $this->checkLogin();
				if ($checkLogin) {
					$this->updateCookies2DB();
					echo 'Logged in and update Success';
				}
			} else {
				echo 'Logged fail1';
			}
			
		}
		
		public function prepare()
		{
			// khoi tao - login thành
			$this->init();
			
			// kiem tra lai . xem login thanh cong chua mơi cho di tiếp
			$islogined = $this->checkLogin();
			
			if (!$islogined) {
				$this->run_login();
				
			} else {
				echo 'ACB has finished preparing Success';
			}
		}
		
		public function laysaoke()
		{
			$page = 1;
			$size = 100;
			$dt = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$from = $dt->subDay()->format('d-m-Y H:i:s');
			$to = $dt->subDays(7)->format('d-m-Y H:i:s');
			
			$data['url'] = 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/saving/' . $this->accountNumber . '/tx-history';
			$data['method'] = "POST";
			$data['header'] = [
				'Host' => 'apiapp.acb.com.vn',
				'Accept' => 'application/json, text/plain, */*',
				'Connection' => 'keep-alive',
				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
				'Accept-Language' => 'vi',
				'Authorization' => $this->Authorization(),
				'Accept-Encoding' => 'gzip, deflate, br',
				'Cookie' => ''
			];
			$data['data_body'] = [
				'account' => $this->accountNumber,
				'transactionType' => 'ALL',
				'from' => strtotime($from),
				'to' => strtotime($to),
				'min' => 0,
				'max' => 9007199254740991,
				'page' => 1,
				'size' => 100,
				'Content-Type' => 'application/json',
			];
			
			$response = $this->request($data, 2);
			
			echo "<pre>";
			print_r($response);
			echo "</pre>";
			die('$response');
			
			if (isset($response->statusCode) && $response->statusCode == 200) {
				$this->took = $response->took;
				$this->transactions = $response->transactions;
				$this->total = $response->total;
				$this->page = $page;
				$this->size = $size;
				
				$data_temp['success'] = true;
				$data_temp['msg'] = "lay sao ke thanh thanh cong";
				$data_temp['data'] = $response;
				
				return $data_temp;
				
			} else {
				$data_temp['success'] = false;
				$data_temp['msg'] = "sao ke tra ve NULL";
				$data_temp['data'] = $response;
				
				return $data_temp;
			}
			
			
		}
	}