<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\VpBankDataTable;
	use App\Models\System;
	use App\Models\VpBank;
	use GuzzleHttp\Client;
	use Illuminate\Http\Request;
	use Illuminate\Support\Carbon;
	use Curl\Curl;
	use Illuminate\Support\Facades\Auth;
	
	class VpBankController extends Controller
	{
		protected $_timeout = 20;
		protected $username;
		protected $password;
		protected $account_number;
		protected $client;
		
		public function __construct()
		{
			
			$object = System::where('id', 999)->first();
			$this->username = $object->vpbank_username;
			$this->password = $object->vpbank_password;
			$this->account_number = $object->vpbnak_account_number;
			$this->client = new Client(['http_errors' => false, 'cookies' => true]);
		}
		
		public function update2(Request $request)
		{
			$data = $request->all();
			
			$list = [
				'vpbank_username',
				'vpbank_password',
				'vpbnak_account_number',
				'vpbank_accountID'
			
			];
			
			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}
			
			$object = System::where('id', 999)->first();
			
			$object->update($arr);
			$object->save();
			
			return redirect()->intended('system');
		}
		
		public function getCaptcha()
		{
			$data = array(
				"Id" => "",
				"UserName" => $this->username,
				"AppType" => "Consumers",
				"ChannelType" => "Web",
				"Password" => "CaptchaValue",
				"UserLocale" => ["Country" => "VN", "Language" => "vi"]
			);
			
			$res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/ns/authenticationservice/SecureUsers?action=init", [
				'timeout' => $this->_timeout,
				'headers' => [
					"Accept" => "application/json",
					"Accept-Language" => "vi",
					"Content-Type" => "application/json",
					"DataServiceVersion" => "2.0",
					"MaxDataServiceVersion" => "2.0",
					"Captcha" => "dsa",
					"X-Security-Request" => "required"
				],
				'body' => json_encode($data)
			]);
			$result = json_decode($res->getBody());
			$getCaptcha = $result->error->message->value;
			$getCaptcha = json_decode($getCaptcha);
			
			$captcha = $getCaptcha->errorDetails[1]->Desc;
			
			return $captcha;
		}
		
		public function solveCaptcha()
		{
			$captcha = $this->getCaptcha();
			//dd($captcha);
			$solver = new \TwoCaptcha\TwoCaptcha('5b7a04166a639822cef4e763a3a7f048');
			//$balance = $solver->balance();
			$result = $solver->normal(["base64" => $captcha]);
			//$result = json_decode($result);
			$code = $result->code;
			return $code;
		}
		
		public function doLogin()
		{
			$data = array(
				"Id" => "",
				"UserName" => $this->username,
				"AppType" => "Consumers",
				"ChannelType" => "Web",
				"Password" =>$this->password,
				"UserLocale" => ["Country" => "VN", "Language" => "vi"]
			);
			
			$res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/ns/authenticationservice/SecureUsers?action=init", [
				'timeout' => $this->_timeout,
				'headers' => [
					"Accept" => "application/json",
					"Accept-Language" => "vi",
					"Content-Type" => "application/json",
					"DataServiceVersion" => "2.0",
					"MaxDataServiceVersion" => "2.0",
					"Captcha" => $this->solveCaptcha(),
					"X-Security-Request" => "required"
				],
				'body' => json_encode($data)
			]);
			
			foreach ($res->getHeaders() as $name => $values) {
				if ($name == "TokenKey") {
					$tokenKey = $values;
				}
				if ($name == "x-csrf-token") {
					$x_crsf = $values;
				}
			}
			
			$result = json_decode($res->getBody());
			
			if (isset($result->error)) {
				return $res->getBody();
			}
			
			$data = [
				'vpbank_tokenKey' => $tokenKey[0],
				'vpbank_x_crsf' => $x_crsf[0],
			];
			
			$object = System::where('id', 999)->first();
			
			if ( $object)
			{
				$object->update($data);
				$object->save();
				
				$this->Accounts();
//				$this->CookieUserIdentifysCookieUserIdentifys();
			}
			
			return json_encode(["status" => true, "data" => ["tokenKey" => $tokenKey[0], "x_crsf" => $x_crsf[0]]]);
		}
		
//		public function storeOtp($tokenKey, $x_crsf, $otp)
//		{
//			$data = [
//				'MultifactorInfo' => [[
//					"__metadata" => [
//						"id" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/authenticationservice/MultifactorInfos('$tokenKey')",
//						"uri" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/authenticationservice/MultifactorInfos('$tokenKey')",
//						"type" => "com.sap.banking.authentication.endpoint.v1_0.beans.MultifactorInfo"
//					],
//					"Challenge" => null,
//					"Id" => $tokenKey,
//					"Response" => $otp,
//					"Type" => 5
//				]],
//			];
//			$h = [
//				"Accept" => "application/json",
//				"Accept-Language" => "vi",
//				"Expires" => "-1",
//				"Content-Type" => "application/json",
//				"channelType" => "Web",
//				"DataServiceVersion" => "2.0",
//				"MaxDataServiceVersion" => "2.0",
//				"X-Security-Request" => "required"
//			];
//			$h['TokenKey'] = $tokenKey;
//			$h['x-csrf-token'] = $x_crsf;
//			$res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/authenticationservice/SecureUsers?action=authenticateMFA", [
//				'timeout' => $this->_timeout,
//				'headers' => $h,
//				'body' => json_encode($data)
//			]);
//			$result = json_decode($res->getBody());
//			if (isset($result->error)) {
//				return $res->getBody();
//			}
//			$this->CookieUserIdentifys($tokenKey, $x_crsf);
//			return json_encode(["status" => true, "data" => $result]);
//		}
		
		public function Accounts()
		{
			$object = System::where('id', 999)->first();
			
			$h = [
				"Accept" => "application/json",
				"Accept-Language" => "vi",
				"Expires" => "-1",
				"Content-Type" => "application/json",
				"channelType" => "Web",
				"DataServiceVersion" => "2.0",
				"MaxDataServiceVersion" => "2.0",
				"X-Security-Request" => "required"
			];
			
			$h['TokenKey'] =  $object->vpbank_tokenKey;
			$h['x-csrf-token'] = $object->vpbank_x_crsf;
			$res = $this->client->request("GET", 'https://neo.vpbank.com.vn/cb/odata/services/accountservice/Accounts?$top=500', [
				'timeout' => $this->_timeout,
				'headers' => $h,
			]);
			
			$result = json_decode($res->getBody());
			
			if (isset($result->error)) {
				return $res->getBody();
			}
			
			$r = $result->d->results[0];
			
			$data['vpbank_accountID'] = $r->Id;
			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();
			
			return json_encode(["status" => true, "data" => ["accountID" => $r->Id, "balance" => $r->CurrentBalance]]);
		}
		
		public function CookieUserIdentifysCookieUserIdentifys()
		{
			$object = System::where('id', 999)->first();
			$tokenKey =  $object->vpbank_tokenKey;
			$x_crsf = $object->vpbank_x_crsf;
		
			$h = [
				"Accept" => "application/json",
				"Accept-Language" => "vi",
				"Expires" => "-1",
				"Content-Type" => "application/json",
				"channelType" => "Web",
				"DataServiceVersion" => "2.0",
				"MaxDataServiceVersion" => "2.0",
				"X-Security-Request" => "required"
			];
			$h['TokenKey'] = $tokenKey;
			$h['x-csrf-token'] = $x_crsf;
			$data = ['Id' => null, "OtpType" => null];
			$res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/retailuserservice/CookieUserIdentifys?action=init", [
				'timeout' => $this->_timeout,
				'headers' => $h,
				'body' => json_encode($data)
			]);
			
			$result = json_decode($res->getBody());
			$id = $result->d->Id;
			
			$data = array(
				"OtpType" => "1",
				"InforPC" => "Windows 10__ANGLE (AMD, AMD Radeon RX 6600 Direct3D11 vs_5_0 ps_5_0, D3D11)__Chrome",
				"Status" => 0,
				"Error_Message" => null,
				"Id" => $id,
				'__metadata' => [
					"id" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
					"uri" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
					"type" => "com.sap.banking.custom.user.endpoint.v1_0.beans.CookieUserIdentify"
				],
			);
			
			$res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/retailuserservice/CookieUserIdentifys?action=verify", [
				'timeout' => $this->_timeout,
				'headers' => $h,
				'body' => json_encode($data)
			]);
			
			$data = array(
				"OtpType" => "1",
				"InforPC" => "Windows 10__ANGLE (AMD, AMD Radeon RX 6600 Direct3D11 vs_5_0 ps_5_0, D3D11)__Chrome",
				"Status" => 0,
				"Error_Message" => null,
				"Id" => $id,
				'__metadata' => [
					"id" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
					"uri" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
					"type" => "com.sap.banking.custom.user.endpoint.v1_0.beans.CookieUserIdentify"
				],
			);
			
			$res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/retailuserservice/CookieUserIdentifys?action=confirm", [
				'timeout' => $this->_timeout,
				'headers' => $h,
				'body' => json_encode($data)
			]);
			
			$result = json_decode($res->getBody());
			
			return $result;
		}
		
		public function getHistories()
		{
			
			$object = System::where('id', 999)->first();
			$h = [
				"Accept" => "multipart/mixed",
				"Accept-Language" => "vi",
				"Content-Type" => "multipart/mixed;boundary=batch_a6f1-ccd6-a369",
				"DataServiceVersion" => "2.0",
				"Expires" => "-1",
				"MaxDataServiceVersion" => "2.0",
				"Pragma" => "no-cache",
				"Sec-Fetch-Dest" => "empty",
				"Sec-Fetch-Mode" => "cors",
				"Sec-Fetch-Site" => "same-origin",
				"X-Security-Request" => "required",
				"channelType" => "Web",
				"sap-cancel-on-close" => "true",
				"sap-contextid-accept" => "header",
			];
			$h['TokenKey'] = $object->vpbank_tokenKey;
			$tokenKey = $object->vpbank_tokenKey;
			$h['x-csrf-token'] =  $object->vpbank_x_crsf;
			$x_crsf =  $object->vpbank_x_crsf;
			$accountID = $object->vpbank_accountID;
			
			$dt = Carbon::now();
			$fromDate = $dt->subDay()->format('d-m-Y');
			$toDate = $dt->subDays(7)->format('d-m-Y');
			
			$data = "--batch_a6f1-ccd6-a369
Content-Type: application/http
Content-Transfer-Encoding: binary

GET DepositAccounts('$accountID')?" . '$expand=DepositAccountTransactions&fromDate='.$toDate.'&toDate='.$fromDate.' HTTP/1.1
sap-cancel-on-close: true
channelType: Web
TokenKey: ' . $tokenKey . '
Pragma: no-cache
Expires: -1
Cache-Control: no-cache,no-store,must-revalidate
sap-contextid-accept: header
Accept: application/json
x-csrf-token: '.$x_crsf.'
Accept-Language: vi
DataServiceVersion: 2.0
MaxDataServiceVersion: 2.0


--batch_a6f1-ccd6-a369--';
			
			$res = $this->client->request('POST', 'https://neo.vpbank.com.vn/cb/odata/services/accountservice/$batch', [
				'timeout' => $this->_timeout,
				'headers' => $h,
				'body' => json_decode($data),
			]);
			
			// load bang Curl()
			$curl = new Curl();
			$curl->setHeaders($h);
			$curl->post('POST', json_decode($data));
			if (empty($curl->response)) {
				$response = $curl->getHttpStatusCode();
			}
			$response = $curl->response;
			// end load bang Curl()
			
			
			echo "<pre>";
			print_r($curl);
			print_r($res);
			echo "</pre>";
			
			return $res->getBody();
		}
		
		public function index(VpBankDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.vpbank.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.vpbank.index');
			}
		}
		
		public function create()
		{
			//
		}
		
		public function store(Request $request)
		{
			//
		}
		
		public function show(VpBank $vpBank)
		{
			//
		}
		
		public function edit(VpBank $vpBank)
		{
			//
		}
		
		public function update(Request $request, VpBank $vpBank)
		{
			//
		}
		
		public function destroy(VpBank $vpBank)
		{
			//
		}
	}
