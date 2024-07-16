<?php
//
//	namespace App\Helper\Bank;
//
//	use App\Models\Acbank;
//	use App\Models\Acbbankcode;
//	use App\Models\Acbtranfer;
//	use App\Models\System;
//	use GuzzleHttp\Client;
//	use Illuminate\Support\Carbon;
//	use phpDocumentor\Reflection\Types\This;
//
//	class ACB
//	{
//		public $accountNumber;
//		public $username;
//		public $password;
//		public $cookies;
//		public $currentUser;
//		public $lastinfo;
//		public $userDetails;
//		public $listAccount;
//		public $clientId;
//		public $bankCode;
//		public $account;
//		public $transactions;
//		public $size;
//		public $page;
//		public $total;
//		public $receiveAccount;
//		public $mbTransactionLimitInfo;
//		public $tranferFee;
//		public $tranfer_local_data;
//		public $bankLists;
//		public $refreshToken;
//		public $identity;
//		public $accessToken;
//		public $took;
//
//		public function __construct()
//		{
//			$object = System::where('id', 999)->first();
//
//			$this->config = [
//				'port' => $object->acb_port,
//				'db_host' => $object->acb_db_host,
//				'db_port' => $object->acb_db_port,
//				'db_user' => $object->acb_db_user,
//				'db_password' => $object->acb_db_password,
//				'db_database' => $object->acb_db_database,
//				'captcha_service' => $object->acb_captcha_service,
//				'captcha_key' => $object->acb_captcha_key,
//				'accountNumber' => $object->acb_accountNumber,
//			];
//
//			$this->refreshToken = $object->acb_refreshToken;
//			$this->identity = $object->acb_identity;
//			$this->accessToken = $object->acb_accessToken;
//			$this->username = '';
//			$this->password = '';
//			$this->cookies = [];
//			$this->currentUser = [];
//			$this->lastinfo = '';
//			$this->listAccount = [];
//			$this->userDetails = [];
//			$this->bankCode = '';
//			$this->account = [];
//			$this->took = [];
//			$this->transactions = '';
//			$this->size = '';
//			$this->page = '';
//			$this->total = '';
//			$this->receiveAccount = '';
//			$this->mbTransactionLimitInfo = '';
//			$this->tranferFee = '';
//			$this->tranfer_local_data = '';
//			$this->bankLists = '';
//			$this->clientId = 'iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm';
//		}
//
//		public function addAccount2db($data)
//		{
//			$result = Acbank::create([
//				'id' => Null,
//				'accountNumber' => $data['accountNumber'],
//				'username' => $data['username'],
//				'password' => $data['password'],
//				'shortName' => $data['shortName'],
//			]);
//
//			if ($result) {
//				return "Thêm Thành Công";
//			} else {
//				return "Can not insert account";
//			}
//		}
//
//		public function updateCookies2DB()
//		{
//			if ($this->cookies && isset($this->username)) {
//				$user = Acbank::where('username', $this->username)->first();
//				$data_update = [
//					'cookies' => $this->cookies,
//					'currentUser' => $this->currentUser,
//				];
//
//				if (isset($user)) {
//					$user->update($data_update);
//					$user->save();
//
//					return "Cap nhat cookies thành công";
//				}
//			}
//
//			return "Upate cookies faild:";
//		}
//
//		public function init()
//		{
//			$hethong = System::where('id', 999)->first();
//
//			if (isset($hethong->username) && isset($hethong->password)) {
//				$data = Acbank::where('username', $hethong->username)->first();
//				$user = $data->cookies ?? Null;
//
//				if (isset($user) && $user) {
//					$this->lastinfo = $user;
//				} else {
//					$user['username'] = $hethong->username;
//					$user['password'] = $hethong->password;
//					$user['accountNumber'] = $hethong->accountNumber;
//					$user['shortName'] = $hethong->shortName;
//					$this->addAccount2db($user);
//				}
//
//
//			} else {
//				return "Mat khau hoac ten dang nhap khong de trong";
//			}
//
//		}
//
//		public function cookiez(): string
//		{
//			return $this->cookies;
//		}
//
//		public function close_all()
//		{
//			return "ket thuc";
//		}
//
//		public function Authorization()
//		{
//			$system = System::where('id', 999)->first();
//			$system = json_decode($system);
//			$acc = $system->acb_accessToken;
//			$replace_str = array('"');
//			$acc = str_replace($replace_str, "", $acc);
//
//			$hethong = System::where('id', 999)->first();
//			$hethong->update([
//				'acb_accessToken' => $acc,
//			]);
//			$hethong->save();
//
//			return 'bearer ' . $acc;
//		}
//
//		public function request($data, $type)
//		{
//
//			if ($type == 1) {
//				$client = new Client(['http_errors' => false]);
//
//				$res = $client->request($data['method'], $data['url'],
//					[
//						'timeout' => 15,
//						'headers' => $data['header'],
//						'body' => json_encode($data['data_body'] ?? []),
//					]);
//
//				return $res->getBody()->getContents();
//
//			} elseif ($type == 2) {
//				$curl = curl_init();
//				curl_setopt_array($curl, array(
//					CURLOPT_RETURNTRANSFER => true,
//					CURLOPT_URL => $data['url'],
//					CURLOPT_ENCODING => '',
//					CURLOPT_MAXREDIRS => 10,
//					CURLOPT_TIMEOUT => 15,
//					CURLOPT_FOLLOWLOCATION => true,
//					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//					CURLOPT_CUSTOMREQUEST => $data['method'],
//					CURLOPT_POSTFIELDS => json_encode($data['data_body'] ?? []),
//					CURLOPT_HTTPHEADER => $data['header'],
//				));
//
//				$response = curl_exec($curl);
//
//				curl_close($curl);
//
//				if (gettype($response) == 'string') {
//					$response = json_decode($response, true);
//				} elseif (gettype($response) == "object") {
//					$response = json_decode(json_encode($response), true);
//				}
//
//				return $response;
//			} else {
//				return "response false";
//			}
//		}
//
//		public function getListAccountPayments()
//		{
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Accept-Language' => 'vi',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/list/account-payment";
//			$data['data_body'] = [
//				'Content-Type' => 'application/json'
//			];
//			$data['method'] = "POST";
//
//			$response = $this->request($data, 2);
//
//			echo "<pre>";
//			print_r($data);
//			print_r($response);
//			echo "</pre>";
//			die('aaaa');
//
//
//			if (isset($response)) {
//				// [{
//				//     accountNumber: '1287037',
//				//     accountDescription: 'TG PAYROLL KHTN (CN) VND',
//				//     owner: 'NGUYEN TIN ANH THU', currency: 'VND',
//				//     balance: 9550, totalBalance: 9550, cardToken: null,
//				//     status: 1, amountDue: null, dueDate: null
//				// }]
//
//				$this->listAccount = $response;
//				echo "Request getListAccountPayments Success";
//			} else {
//				$this->listAccount = [];
//				echo "Request getListAccountPayments failed";
//			}
//		}
//
//		public function getUserDetails($user)
//		{
//			$this->login($user);
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Accept-Language' => 'vi',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['method'] = "POST";
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/user/details";
//			$data['data_body'] = [
//				'Content-Type' => 'application/json'
//			];
//
//			$response = json_decode($this->request($data, 2));
//
//			if ($response) {
//				// userInfomation: {
//				//     person: number, firstName: string, lastName: string, middleName: null, taxId: string,
//				//     issueDate: string, personTaxId: [], primaryAddress: string, businessAddress: null,
//				//     cellPhone: stirng, businessPhone: null, birthDate: string, email: string,
//				//     residentialTaxCountry: 'VN', residentialTaxCountryName: 'VIET NAM', country: 'VN',
//				//     orgname: 'ACB - PGD BIEN HOA', orgnbr: number, provinceCd: 'VDNA', matinh: null
//				// }
//
//				$this->userDetails = $response;
//
//				echo json_encode($response);
//
////				return "Request getUserDetails Success";
//			} else {
//				return "Request getUserDetails failed";
//			}
//		}
//
//		public function checkLogin()
//		{
//			$listAccount = $this->getListAccountPayments();
//
//			if (isset($listAccount) && $listAccount) {
//				$this->listAccount = $listAccount;
//				return true;
//			} else {
//				return false;
//			}
//		}
//
//
//		public function refreshToken($refreshToken)
//		{
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Accept-Language' => 'vi',
//				'Authorization' => 'Bearer ' . $refreshToken ?? $this->currentUser['refreshToken'],
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'Cookie' => ''
//			];
//
//			$data['url'] = "https://apiapp.acb.com.vn/mb/auth/refresh";
//			$data['method'] = "POST";
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				$this->currentUser['accessToken'] = $response->accessToken ?? $response['accessToken'];
//				$this->currentUser['expiresIn'] = $response->expiresIn ?? $response['expiresIn'];
//
//				return "Refresh Success";
//			} else {
//				$this->userDetails = [];
//				return "Can not refresh token some error";
//			}
//		}
//
//		public function login()
//		{
//			$hethong = System::where('id', 999)->first();
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Content-Type' => 'application/json',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => ''
//			];
//
//			$data['url'] = "https://apiapp.acb.com.vn/mb/auth/tokens";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'username' => $hethong->acb_username,
//				'password' => $hethong->acb_password,
//				'clientId' => "iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm",
//				'json' => [
//					'username' => $hethong->acb_username,
//					'password' => $hethong->acb_password,
//					'clientId' => "iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm",
//				],
//			];
//
//			$response = json_decode($this->request($data, 1));
//
//			$hethong = System::where('id', 999)->first();
//			$hethong->update([
//				'acb_accessToken' => json_encode($response->accessToken),
//				'acb_refreshToken' => json_encode($response->refreshToken),
//				'acb_identity' => json_encode($response->identity),
//			]);
//			$hethong->save();
//
//			if (isset($response))
//			{
//				$this->currentUser = $response;
//				System::where('id', 999)
//					->update([
//						'acb_accessToken' => json_encode($response->accessToken),
//						'acb_refreshToken' => json_encode($response->refreshToken),
//						'acb_identity' => json_encode($response->identity),
//					]);
//				echo "Login Success";
//			}
//			else {
//				$this->userDetails = [];
//				return "Login fail1";
//			}
//		}
//
//		public function run_login()
//		{
//			$this->cookies = [];
//			$this->currentUser = [];
//			$this->lastinfo = '';
//			$result = $this->login();
//			if (isset($result) && $result) {
//				$checkLogin = $this->checkLogin();
//				if (isset($checkLogin) && $checkLogin) {
//					$this->updateCookies2DB();
//
//					echo "Logged in and update Success";
//				}
//			} else {
//				echo "Logged fail1";
//			}
//
//		}
//
//		public function prepare()
//		{
//			$this->init();
//			$islogined = $this->checkLogin();
//			if ($islogined && isset($islogined)) {
//				return "ACB has finished preparing Success";
//			} else {
//				$this->run_login();
//			}
//		}
//
//		public function choiceBankCode($napasBankCode = "970416")
//		{
//			$bankCode = Acbbankcode::where('napasBankCode', $napasBankCode)->first();
//
//			if ($bankCode && isset($bankCode)) {
//				$this->bankCode = $bankCode;
//			} else {
//				return 'Can not find bank code';
//			}
//		}
//
//		public function choiceAccount($napasBankCode = "970416")
//		{
//			if (isset($this->listAccount)) {
//				foreach ($this->listAccount as $user) {
//					if ($user->accountNumber == $this->accountNumber) {
//						$this->account = $user->accountNumber;
//						echo "find and update account number Success";
//					}
//				}
//			} else {
//				echo "Can not find account number";
//			}
//		}
//
//		public function todayUnix()
//		{
////			$current_date_time = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"
////			$current_timestamp = Carbon::now()->timestamp; // Produces something like 1552296328
//
//			$current_timestamp = Carbon::now()->timestamp; // Produces something like 1552296328
//
//			return $current_timestamp;
//		}
//
//		public function date2Unix()
//		{
////			$date_time = 'DD/MM/YYYY HH:mm:ss'
////			$current_date_time = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"
////			$current_timestamp = Carbon::now()->timestamp; // Produces something like 1552296328
//
//			$current_date_time = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"
//
//			return $current_date_time;
//		}
//
//		public function getBalance()
//		{
//			$listAccount = $this->getListAccountPayments();
//
//			if (isset($listAccount) && $listAccount) {
//				$this->accountNumber = $this->accountNumber ?? $this->choiceAccount();
//			}
//		}
//
//		public function laysaoke()
//		{
//
////			$this->choiceAccount();
//			$hethong = System::where('id', 999)->first();
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Accept-Language' => 'vi',
//				'Authorization' => $this->Authorization(),
//				'Accept-Encoding' => 'gzip, deflate, br',
////				'Authorization' => 'Basic '. base64_encode("toidicodedao@gmail.com:12345678"),
//				'Cookie' => ''
//			];
//
//			$dt = Carbon::now();
//			$from = $dt->subDay()->format('d-m-Y H:i:s');
//			$to = $dt->subDays(7)->format('d-m-Y H:i:s');
//
//			$data['url'] = 'https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/saving/' . $hethong->acb_accountNumber . '/tx-history';
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'account' => $hethong->acb_accountNumber,
//				'transactionType' => 'ALL',
//				'from' => strtotime($from),
//				'to' => strtotime($to),
//				'min' => 0,
//				'max' => 9007199254740991,
//				'page' => 1,
//				'size' => 100,
//				'Content-Type' => 'application/json',
//			];
//
//			$response = $this->request($data, 1);
//
//
//			if (isset($response->statusCode) && $response->statusCode == 200) {
//				$this->took = $response->took;
//				$this->transactions = $response->transactions;
//				$this->total = $response->total;
//				$this->page = $page;
//				$this->size = $size;
//				return "get transaction  Success";
//			} else {
//				return "get transaction fail1";
//			}
//		}
//
//
//		public function checkReceiveAccount($receivedAccountNumber = '', $napasBankCode = '970416')
//		{
//			$bankCode = $napasBankCode == '970416' ? "307" : $napasBankCode;
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => '',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/accounts/'.$receivedAccountNumber.'";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'bankCode' => $bankCode,
//				'accountNumber' => $this->accountNumber,
//				'Content-Type' => 'application/json'
//			];
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				$this->receiveAccount = $response;
//
//				return "checkReceiveAccount  Success";
//			} else {
//				return "checkReceiveAccount fail1";
//			}
//		}
//
//		public function getTransactionLimits($receivedAccountNumber = '', $transferType = "local", $napasBankCode = "970416")
//		{
//			$transferType = $transferType == 'local' ? 1 : 3;
//			$bankCode = $this->choiceBankCode($napasBankCode);
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => '',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/accounts/'.$receivedAccountNumber.'";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'accountNumber' => $this->accountNumber,
//				'transferType' => $transferType,
//				'receivedBank' => $bankCode['bank'],
//				'napasBankCode' => $napasBankCode,
//				'receivedAccountNumber' => $receivedAccountNumber,
//				'transferTime' => [
//					'type' => 1,
//					'period' => 0,
//					'startDate' => 0,
//					'endDate' => 0,
//				],
//				"receivedCardNumber" => "",
//				"receivedIdCardNumber" => "",
//				"receivedPassportNumber" => "",
//				'Content-Type' => 'application/json',
//			];
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				$this->mbTransactionLimitInfo = $response;
//
//				return "getTransactionLimits  Success";
//			} else {
//				return "getTransactionLimits fail1";
//			}
//		}
//
//		public function checkTranferFee($amount, $transferType = "local", $napasBankCode = "970416")
//		{
//			$transferType = $transferType == 'local' ? 1 : 3;
//			$bankCode = $this->choiceBankCode($napasBankCode);
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => '',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/transaction-fee";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'transferType' => $transferType,
//				'receiveBank' => $bankCode['bank'],
//				'napasBankCode' => $napasBankCode,
//				'checkingAccount' => $this->accountNumber,
//				'accountNumber' => $this->receiveAccount,
//				'amount' => 'amount',
//				'bankcheckId' => 0,
//				"transferTime" => [
//					'type' => 1,
//					'period' => 0,
//					'startDate' => 0,
//					'endDate' => 0,
//				],
//				"cardNumber" => "",
//				"idCardNumber" => "",
//				"passportNumber" => "",
//				'Content-Type' => 'application/json',
//			];
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				$this->tranferFee = $response;
//
//				return "checkTranferFee  Success";
//			} else {
//				return "checkTranferFee fail1";
//			}
//		}
//
//		public function submitTranfer($amount = 10000, $message = "", $otp_type = 'SMS', $transferType = "local", $napasBankCode = "970416", $referenceNumber = '')
//		{
//			$transferType = $transferType == 'local' ? 1 : 3;
//			$bankCode = $this->choiceBankCode($napasBankCode);
//			$menuCode = $transferType == 'local' ? 14 : 34;
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => '',
//				'Authorization' => $this->Authorization(),
//			];
//
//			// OTPS: ACB SafeKey
//			$this->tranfer_local_data = [
//				'type' => $transferType,
//				'authMethod' => $otp_type,
//				'menu' => $menuCode,
//				'amount' => $amount,
//				'currency' => 'VND',
//				'fromAccount' => $this->accountNumber,
//				'transactionAmount' => $this->account,
//				'receiverName' => $this->receiveAccount['ownerName'],
//				'bankName' => $bankCode['bankName'],
//				'comment' => $message,
//				"transferTime" => [
//					'type' => 1,
//					'period' => 0,
//					'startDate' => 0,
//					'endDate' => 0,
//				],
//				'fee' => $this->tranferFee,
//				'feeTo' => 0,
//				'resultToEmails' => [],
//				"accountInfo" => [
//					'accountNumber' => $this->receiveAccount['account'],
//					'bankCode' => $bankCode['bank'],
//					'bankName' => $bankCode['bankName'],
//					'napasBankCode' => $napasBankCode,
//					'bankcheckId' => 0,
//				],
//				'bankCode' => $bankCode['bank'],
//				'napasBankCode' => $napasBankCode,
//				'referenceNumber' => $referenceNumber,
//				'province' => '',
//				'mbTransactionLimitInfo' => [
//					'byAdvSafeKey' => 1,
//					'mbTransactionLimitInfo' => $this->mbTransactionLimitInfo
//				],
//			];
//
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/submit";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'transferType' => $transferType,
//				'receiveBank' => $bankCode['bank'],
//				'napasBankCode' => $napasBankCode,
//				'checkingAccount' => $this->accountNumber,
//				'accountNumber' => $this->receiveAccount,
//				'amount' => 'amount',
//				'bankcheckId' => 0,
//				"transferTime" => [
//					'type' => 1,
//					'period' => 0,
//					'startDate' => 0,
//					'endDate' => 0,
//				],
//				"cardNumber" => "",
//				"idCardNumber" => "",
//				"passportNumber" => "",
//				'Content-Type' => 'application/json',
//			];
//			$data['json'] = $this->tranfer_local_data;
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				return " submit tranfer local  Success";
//			} else {
//				return "Can not submit tranfer local fail1";
//			}
//
//		}
//
//		public function make_tranfer_local()
//		{
//			// this.account
//			$this->choiceAccount();
//
//			// this.receiveAccount
//			$this->checkReceiveAccount();
//
//			// this.mbTransactionLimitInfo
//			$this->getTransactionLimits();
//
//			// this.tranferFee
//			$this->checkTranferFee($this->account);
//
//			$amount = $this->account;
//			$message = '';
//			$otp_type = '4545';
//
//			$submitResult = $this->submitTranfer($amount, $message, $otp_type);
//		}
//
//		public function confirm_tranfer()
//		{
//			$uuid = '';
//			$code = '';
//			$otp_type = '4545';
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => '',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/verify";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'Content-Type' => 'application/json',
//			];
//			$data['data_body'] = [
//				"uuid" => $uuid,
//				"code" => $code,
//				"authMethod" => $otp_type,
//			];
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				return "Confirm failed  Success";
//			} else {
//				return "Confirm failed fail1";
//			}
//		}
//
//		public function getTranferBanks()
//		{
//
//			$data['header'] = [
//				'Host' => 'apiapp.acb.com.vn',
//				'Accept' => 'application/json, text/plain, */*',
//				'Connection' => 'keep-alive',
//				'Accept-Language' => 'vi',
//				'Accept-Encoding' => 'gzip, deflate, br',
//				'User-Agent' => 'ACB-MBA/3 CFNetwork/1128.0.1 Darwin/19.6.0',
//				'Cookie' => '',
//				'Authorization' => $this->Authorization(),
//			];
//			$data['url'] = "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/transfers/banks";
//			$data['method'] = "POST";
//			$data['data_body'] = [
//				'Content-Type' => 'application/json',
//			];
//
//			$response = $this->request($data, 1);
//			if ($response) {
//				$this->bankLists = $response;
//				return "getTranferBanks  Success";
//			} else {
//				return "getTranferBanks fail1";
//			}
//		}
//
//		public function make_tranfer_247()
//		{
//			$napasBankCode = "";
//			$tranfer_to = "";
//			$amount = "";
//			$message = "";
//			$otp_type = ['SMS', 'OTPS'];
//
//			// this.account
//			$this->choiceAccount();
//
//			// this.receiveAccount
//			$this->checkReceiveAccount($tranfer_to, $napasBankCode);
//
//			// this.mbTransactionLimitInfo
//			$this->getTransactionLimits($tranfer_to, '247', $napasBankCode);
//
//			// this.tranferFee
//			$submitResult = $this->checkTranferFee($amount, $message, $otp_type, "247", $napasBankCode);
//
//			if ($submitResult) {
//				return "Success";
//			} else {
//				return "fail1";
//			}
//		}
//
//
//	}