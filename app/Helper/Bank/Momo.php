<?php
	
	namespace App\Helper\Bank;
	
	use App\Helper\Helper;
	use App\Models\Momo as ModelsMomo;
	use DateTime;
	use GuzzleHttp\Client;
	use Illuminate\Support\Facades\Auth;
	use phpseclib\Crypt\RSA;
	use Crypt_RSA;
	use phpseclib3\Crypt\DH\Formats\Keys\PKCS1;
	use Storage;
	use Curl\Curl;
	class Momo extends Helper
	{
		private $account;
		
		private $appVer = 40044;
		
		private $appCode = '4.0.4';
		
		private $userInfo = [];
		
		private $config = [];
		
		public function __construct()
		{
			$object = ModelsMomo::where('id', 888)->first();
			$this->config = [
				'appVer' => $object->appVer,
				'appCode' => $object->appCode,
				'token' => "wznNGqqpkab2GRE6pzRf5awA9SJEhT7D",
				'isVoice' => false,
			];
			
			$this->userInfo = [
				"phone" => $object->username,
				"password" => $object->password,
			];
		}
		
		public function get_ip_address()
		{
			if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED'])) {
				return $_SERVER['HTTP_X_FORWARDED'];
			}
			
			if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
				return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			}
			
			if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR'])) {
				return $_SERVER['HTTP_FORWARDED_FOR'];
			}
			
			if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED'])) {
				return $_SERVER['HTTP_FORWARDED'];
			}
			
			return $_SERVER['REMOTE_ADDR'];
		}
		
		public function get_device()
		{
			return [
				"device" => "Galaxy S8+",
				"hardware" => "qcom",
				"manufacture" => "samsung",
				"device_os" => "android",
				"model" => "samsung sm-g955n"
			];
		}
		
		public function secureid($length = 16)
		{
			$characters = '0123456789abcdef';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		public function rkey($length)
		{
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			$size = strlen($chars);
			$string = "";
			
			for ($i = 0; $i < $length; $i++) {
				$string .= $chars[rand(0, $size - 1)];
			}
			
			return $string;
		}
		
		public function encryptDecrypt($data, $key, $mode = 'ENCRYPT')
		{
			if (strlen($key) < 32) {
				$key = str_pad($key, 32, 'x');
			}
			$key = substr($key, 0, 32);
			$iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
			if ($mode === 'ENCRYPT') {
				return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
			} else {
				return base64_encode(json_encode($data));
			}
		}
		
		public function get_RSAencrypt($public_key)
		{
			$rsa = new Crypt_RSA();
//			$rsa->setEncryptionMode(Crypt_RSA::ENCRYPTION_PKCS1);
			$rsa->setEncryptionMode(PKCS1::MODE_PEM);
			$rsa->loadKey($public_key);
			$requestkey = base64_encode($rsa->encrypt($this->config['token']));
			return $requestkey;
		}
		
		public function get_microtime()
		{
			return floor(microtime(true) * 1000);
		}
		
		public function get_checksum($data_momo, $type)
		{
			$checkSumSyntax = $data_momo['username'] . $this->get_checksum() . '000000' . $type . ($this->get_checksum() / 1000000000000.0) . 'E12';
			return $this->encryptDecrypt($checkSumSyntax, $this->encryptDecrypt($data_momo['setupkey'], $data_momo['ohash'], 'DECRYPT'));
		}
		
		public function get_pHash($data_momo)
		{
			$pHashSyntax = $data_momo['imei'] . '|' . $data_momo['password'];
			return $this->encryptDecrypt($pHashSyntax, $this->encryptDecrypt($data_momo['setupkey'], $data_momo['ohash'], 'DECRYPT'));
		}
		
		public function get_imei()
		{
			$time = md5($this->get_microtime(true));
			$text = substr($time, 0, 8) . '-';
			$text .= substr($time, 8, 4) . '-';
			$text .= substr($time, 12, 4) . '-';
			$text .= substr($time, 16, 4) . '-';
			$text .= substr($time, 17, 12);
			$text = strtoupper($text);
			return $text;
		}
		
		public function get_onesignal()
		{
			return $this->generateRandom(22) . ':' .
				$this->generateRandom(9) . '-' .
				$this->generateRandom(20) . '-' .
				$this->generateRandom(12) . '-' .
				$this->generateRandom(7) . '-' .
				$this->generateRandom(7) . '-' .
				$this->generateRandom(53) . '-' .
				$this->generateRandom(9) . '_' .
				$this->generateRandom(11) . '-' .
				$this->generateRandom(4);
		}
		
		public function generateRandom($length = 20)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		public function request($data_curl, $type = 1)
		{
			
			if ($type == 1) {
				$data_curl['method'] = (!empty($data_curl['method'])) ? $data_curl['method'] : "POST";
				
				if ($data_curl['encrypt'] == true || $data_curl['encrypt'] == "true" || $data_curl['encrypt'] || $data_curl['encrypt'] == 1) {
					$data_curl['data_body'] = $this->encryptDecrypt(json_encode($data_curl['data_body']), $this->config['token'], "ENCRYPT");
				}
				
				$client = new Client(['http_errors' => false]);
				
				$res = $client->request($data_curl['method'], $data_curl['url'],
					[
						'timeout' => 15,
						'headers' => $data_curl['header'],
						'body' => json_encode($data_curl['data_body']),
					]);
				
				$response = $res->getBody()->getContents();
				
				if ($data_curl['encrypt'] == true || $data_curl['encrypt'] == "true" || $data_curl['encrypt'] || $data_curl['encrypt'] == 1) {
					if (isset($response['encrypt'])) {
						$response = $this->encryptDecrypt($response, $this->config['token'], "DECRYPT");
					}
				}
			}
			
			if ($type == 2) {
				$data_curl['method'] = (!empty($data_curl['method'])) ? $data_curl['method'] : "POST";
				
				if ($data_curl['encrypt'] == true || $data_curl['encrypt'] == "true" || $data_curl['encrypt'] || $data_curl['encrypt'] == 1) {
					$data_curl['data_body'] = $this->encryptDecrypt(json_encode($data_curl['data_body']), $this->config['token'], "ENCRYPT");
				}
				
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_URL => $data_curl['url'],
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 15,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => $data_curl['method'],
					CURLOPT_POSTFIELDS => json_encode($data_curl['data_body']),
					CURLOPT_HTTPHEADER => $data_curl['header'],
				));
				
				$response = curl_exec($curl);
				
				curl_close($curl);
				
				
				if ($data_curl['encrypt'] == true || $data_curl['encrypt'] == "true" || $data_curl['encrypt'] || $data_curl['encrypt'] == 1) {
					if (isset($response['encrypt'])) {
						$response = $this->encryptDecrypt($response, $this->config['token'], "DECRYPT");
					}
				}
			}
			
			if ($type == 3) {
				
				$data_curl['method'] = (!empty($data_curl['method'])) ? $data_curl['method'] : "POST";
				if ($data_curl['encrypt'] == true) {
					$data_curl['data_body'] = $this->encryptDecrypt(json_encode($data_curl['data_body']), $this->config['token'], "ENCRYPT");
				}
				
				$curl = new Curl();
				$curl->setHeaders($data_curl['header']);
				if ($data_curl['method'] == "POST") {
					$curl->post($data_curl['url'], $data_curl['data_body']);
				}
				if ($data_curl['method'] == "GET") {
					$curl->get($data_curl['url'], $data_curl['data_body']);
				}
				
				if (empty($curl->response)) {
					$response = $curl->getHttpStatusCode();
				}
				
				$response = $curl->response;
				
				if ($data_curl['encrypt'] == true || $data_curl['encrypt'] == "true") {
					$response = $this->encryptDecrypt($response, $this->config['token'], "DECRYPT");
				}
				
				if (empty($response)) {
					$response = 401;
				}
				
				if (isset($response['errorCode'])) {
					if ($response['errorCode'] == -83) {
						$response = 404;
					}
				}
			}
			
			if (gettype($response) == 'string') {
				$response = json_decode($response, true);
			} elseif (gettype($response) == "object") {
				$response = json_decode(json_encode($response), true);
			}
			
			return $response;
		}
		
		public function checkUserBe($data_momo)
		{
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$secureid = $data_momo['secureid'];
			$return['method'] = "POST";
			$return['encrypt'] = false;
			$return['url'] = "https://api.momo.vn/backend/auth-app/public/CHECK_USER_BE_MSG";
			$return['header'] = [
				'User-Agent' => "MoMoPlatform-Release/30280 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "CHECK_USER_BE_MSG",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				"Accept-Language" => "vi-vn",
			];
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => "CHECK_USER_BE_MSG",
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'buildNumber' => 0,
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'appId' => 'vn.momo.platform',
				'momoMsg' => [
					'_class' => 'mservice.backend.entity.msg.RegDeviceMsg',
					'number' => $data_momo['username'],
					'imei' => $data_momo['imei'],
					'cname' => 'Vietnam',
					'ccode' => '084',
					'device' => $getDevice['device'],
					'firmware' => '23',
					'hardware' => $getDevice['hardware'],
					'manufacture' => $getDevice['manufacture'],
					'csp' => 'Viettel Mobile',
					'icc' => '',
					'mcc' => '452',
					'device_os' => $getDevice['device_os'],
					'secure_id' => $secureid,
				],
				'extra' => [
					'checkSum' => '',
				],
			];
			$response = $this->request($return);
			
			return $response;
		}
		
		public function checkUserPrivate($data_momo, $phone)
		{
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['method'] = "POST";
			$return['encrypt'] = true;
			$return['url'] = "https://owa.momo.vn/api/CHECK_USER_PRIVATE";
			$return['header'] = [
				'User-Agent' => "MoMoPlatform-Release/30280 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "CHECK_USER_PRIVATE",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				"Accept-Language" => "vi-vn",
				"sessionkey" => $data_momo['session_key'],
				"requestkey" => $data_momo['requestkey'],
				'authorization' => "Bearer {$data_momo['auth_token']}",
			];
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => "CHECK_USER_PRIVATE",
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'buildNumber' => 0,
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'appId' => 'vn.momo.platform',
				'momoMsg' => [
					'_class' => 'mservice.backend.entity.msg.LoginMsg',
					'getMutualFriend' => false,
				],
				'extra' => [
					'CHECK_INFO_NUMBER' => $phone,
					'checkSum' => $this->get_checksum($data_momo, 'CHECK_USER_PRIVATE'),
				],
			];
			$response = $this->request($return);
			
			return $response;
		}
		
		public function getOtp($data_momo)
		{
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$secureid = $data_momo['secureid'];
			$return['url'] = "https://api.momo.vn/backend/otp-app/public/SEND_OTP_MSG";
			$return['encrypt'] = false;
			$return['method'] = "POST";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "USER_LOGIN_MSG",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				"Accept-Language" => "vi-vn",
			);
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => 'SEND_OTP_MSG',
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'buildNumber' => 0,
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'appId' => "vn.momo.platform",
				'extra' => [
					'action' => 'SEND',
					'rkey' => $data_momo['rkey'],
					'IDFA' => '',
					'TOKEN' => $data_momo['onesignal'],
					'ONESIGNAL_TOKEN' => $data_momo['onesignal'],
					'SIMULATOR' => '',
					'isVoice' => false,
					'REQUIRE_HASH_STRING_OTP' => true,
					'SECUREID' => $secureid,
					'MODELID' => $getDevice['model'] . $getDevice['hardware'] . substr($secureid, 0, 5) . substr($secureid, 5, strlen($secureid) - 1),
				],
				'momoMsg' => [
					'_class' => 'mservice.backend.entity.msg.RegDeviceMsg',
					'number' => $data_momo['username'],
					'imei' => $data_momo['imei'],
					'cname' => 'Vietnam',
					'ccode' => '084',
					'device' => $getDevice['device'],
					'firmware' => '23',
					'hardware' => $getDevice['hardware'],
					'manufacture' => $getDevice['manufacture'],
					'csp' => 'Viettel Mobile',
					'icc' => '',
					'mcc' => '452',
					'mnc' => '',
					'device_os' => $getDevice['device_os'],
					'secure_id' => $secureid,
				],
			];
			
			$response = $this->request($return);
			
			return $response;
		}
		
		public function checkOtp($data_momo, $otp)
		{
			
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['method'] = "POST";
			$return['encrypt'] = false;
			$return['url'] = "https://api.momo.vn/backend/otp-app/public/REG_DEVICE_MSG";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "USER_LOGIN_MSG",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				"Accept-Language" => "vi-vn",
			);
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => "REG_DEVICE_MSG",
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'buildNumber' => 0,
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'appId' => 'vn.momo.platform',
				'extra' => [
					'ohash' => hash('sha256', $data_momo['username'] . $data_momo['rkey'] . $otp),
					'IDFA' => '',
					'TOKEN' => $data_momo['onesignal'],
					'ONESIGNAL_TOKEN' => $data_momo['onesignal'],
					'SIMULATOR' => false,
					'SECUREID' => $data_momo['secureid'],
					'MODELID' => $getDevice['model'] . $getDevice['hardware'] . substr($data_momo['secureid'], 0, 5) . substr($data_momo['secureid'], 5, strlen($data_momo['secureid']) - 1),
					'DEVICE_TOKEN' => '',
					'REQUIRE_HASH_STRING_OTP' => true,
					'checkSum' => '',
				],
				'momoMsg' => [
					'_class' => 'mservice.backend.entity.msg.RegDeviceMsg',
					'number' => $data_momo['username'],
					'imei' => $data_momo['imei'],
					'cname' => 'Vietnam',
					'ccode' => '084',
					'device' => $getDevice['device'],
					'firmware' => '23',
					'hardware' => $getDevice['hardware'],
					'manufacture' => $getDevice['manufacture'],
					'csp' => 'Viettel Mobile',
					'icc' => '',
					'mcc' => '452',
					'mnc' => '',
					'device_os' => $getDevice['device_os'],
					'secure_id' => $data_momo['secureid'],
				],
			];
			
			$response = $this->request($return);
			
			return $response;
		}
		
		public function userLogin($data_momo)
		{
			
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$secureid = $data_momo['secureid'];
			$return['method'] = "POST";
			$return['encrypt'] = false;
			$return['type'] = "class";
			$return['url'] = "https://owa.momo.vn/public/login";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "USER_LOGIN_MSG",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'accept-language' => 'vi-vn',
			);
			$return['data_body'] = array(
				'user' => $data_momo['username'],
				'pass' => $data_momo['password'],
				'msgType' => 'USER_LOGIN_MSG',
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'appId' => "vn.momo.platform",
				'buildNumber' => 0,
				'extra' => array(
					'pHash' => $this->get_pHash($data_momo),
					'IDFA' => '',
					'TOKEN' => $data_momo['onesignal'],
					'ONESIGNAL_TOKEN' => $data_momo['onesignal'],
					'SIMULATOR' => false,
					'SECUREID' => $secureid,
					'MODELID' => $getDevice['model'] . $getDevice['hardware'] . substr($secureid, 0, 5) . substr($secureid, 5, strlen($secureid) - 1),
					'DEVICE_TOKEN' => '',
				),
				'momoMsg' => array(
					'_class' => 'mservice.backend.entity.msg.LoginMsg',
					'isSetup' => false,
				),
			);
			$response = $this->request($return, 2);
			
			if (empty($response)) {
				return false;
			}
			return $response;
		}
		
		public function getHistory($data_momo, $hours = 24)
		{
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['encrypt'] = true;
			$return['method'] = "POST";
			$return['url'] = "https://api.momo.vn/sync/transhis/list";
			$return['header'] = array(
				'Host' => 'api.momo.vn',
				'content-type' => 'application/json',
				'accept' => 'application/json',
				'authorization' => "Bearer {$data_momo['auth_token']}",
				'requestkey' => $data_momo['requestkey'],
				'user-agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0"
			);
			$return['data_body'] = array(
				'requestId' => $microtime,
				'offset' => 0,
				'limit' => 5,
				'startDate' => date("d/m/Y", time() - $hours * 3600),
				'endDate' => date("d/m/Y"),
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'lang' => 'vi',
				'deviceOS' => $getDevice['device_os'],
				'channel' => 'APP',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
			);
			
			
			$response = $this->request($return, 3);
			
			$data = [];
			
			if (!empty($response) && !empty($response['momoMsg'])) {
				$tranList = $response['momoMsg'];
				
				foreach ($tranList as $value) {
					$rsp2 = [
						"transId" => $value['transId'],
						"io" => $value['io'],
						"partnerId" => $value['io'] == 1 ? $value['sourceId'] : $value['targetId'],
						"partnerName" => $value['io'] == 1 ? $value['sourceName'] : $value['targetName'],
						"amount" => $value['totalAmount'],
						"comment" => $this->getCommentOfTrans($data_momo, $value['transId']),
						"postBalance" => $value['postBalance'],
						"status" => $value['status'],
					];
					array_push($data, $rsp2);
				}
			}
			
			return [
				"status" => 200,
				"momoMsg" => [
					"tranList" => $data
				]
			];
		}
		
		public function getCommentOfTrans($data_momo, $transId)
		{
			
			$result = "";
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['encrypt'] = true;
			$return['method'] = "POST";
			$return['url'] = "https://api.momo.vn/sync/transhis/details";
			$return['header'] = array(
				'Host' => 'api.momo.vn',
				'content-type' => 'application/json',
				'accept' => 'application/json',
				'authorization' => "Bearer {$data_momo['auth_token']}",
				'requestkey' => $data_momo['requestkey'],
				'user-agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0"
			);
			$return['data_body'] = array(
				'requestId' => $microtime,
				'transId' => $transId,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'lang' => 'vi',
				'deviceOS' => $getDevice['device_os'],
				'channel' => 'APP',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
			);
			$response = $this->request($return, 3);
			
			if (isset($response['momoMsg']['serviceData'])) {
				$serviceData = json_decode($response['momoMsg']['serviceData'], true);
				if (isset($serviceData['COMMENT_VALUE'])) {
					$result = $serviceData['COMMENT_VALUE'];
				}
			}
			
			$countNull = 0;
			
			while ($result == "" && $countNull <= 10) {
				$response = $this->request($return);
				
				if (isset($response['momoMsg']['serviceData'])) {
					$serviceData = json_decode($response['momoMsg']['serviceData'], true);
					if (isset($serviceData['COMMENT_VALUE'])) {
						$result = $serviceData['COMMENT_VALUE'];
					}
				}
				
				$countNull++;
			}
			
			return $result;
		}
		
		public function createTransfer($data_momo, $to_phone, $balance, $comment)
		{
			
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['encrypt'] = true;
			$return['url'] = "https://owa.momo.vn/api/M2MU_INIT";
			$ip = $this->get_ip_address();
			$ip = $ip ? $ip : "115.79.139.158";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => 'M2MU_INIT',
				'Userhash' => md5($data_momo['username']),
				'userid' => $data_momo['username'],
				'requestkey' => $data_momo['requestkey'],
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'Authorization' => "Bearer {$data_momo['auth_token']}",
			);
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => 'M2MU_INIT',
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => $this->get_checksum($data_momo, "M2MU_INIT"),
				],
				'momoMsg' => [
					'_class' => 'mservice.backend.entity.msg.M2MUInitMsg',
					'ref' => '',
					'tranList' => [
						0 => [
							'_class' => 'mservice.backend.entity.msg.TranHisMsg',
							'tranType' => 2018,
							'partnerId' => $to_phone,
							'originalAmount' => $balance,
							'comment' => $comment,
							'moneySource' => 1,
							'partnerCode' => 'momo',
							'partnerName' => "",
							'rowCardId' => NULL,
							'serviceMode' => 'transfer_p2p',
							'serviceId' => 'transfer_p2p',
							'extras' => json_encode(
								array(
									"vpc_CardType" => "SML",
									"vpc_TicketNo" => $ip,
									"receiverMembers" => array(
										"receiverNumber" => $to_phone,
										"receiverName" => "",
										"originalAmount" => $balance,
									),
									"loanId" => 0,
									"contact" => array(),
								)
							),
						],
					],
				],
			];
			
			$response = $this->request($return);
			return $response;
		}
		
		public function confirmTransfer($data_momo, $id)
		{
			
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['encrypt'] = true;
			$return['url'] = "https://owa.momo.vn/api/M2MU_CONFIRM";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => 'M2MU_CONFIRM',
				'Userhash' => md5($data_momo['username']),
				'userid' => $data_momo['username'],
				'Accept' => 'application/json',
				'requestkey' => $data_momo['requestkey'],
				'accept-language' => 'vi-vn',
				'Content-Type' => 'application/json',
				'Authorization' => "Bearer {$data_momo['auth_token']}",
			);
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => 'M2MU_CONFIRM',
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => $this->get_checksum($data_momo, "M2MU_CONFIRM"),
				],
				'momoMsg' => [
					'ids' => [
						0 => $id,
					],
					'bankInId' => '',
					'_class' => 'mservice.backend.entity.msg.M2MUConfirmMsg',
					'otp' => '',
					'otpBanknet' => '',
					'extras' => '',
				],
				'pass' => $data_momo['password'],
			];
			
			$response = $this->request($return);
			return $response;
		}
		
		public function getBalance($data_momo, $hours = 24)
		{
			$response = $this->getHistory($data_momo, $hours);
			
			return $response["momoMsg"]["tranList"][0]["postBalance"] ?? "No Data";
		}
		
		public function bankCodeList($data_momo)
		{
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['url'] = "https://owa.momo.vn/service";
			$return['encrypt'] = true;
			$return['data_body'] = [
				'requestId' => $this->get_onesignal(),
				'agent' => $data_momo['username'],
				'msgType' => "NapasBankCodeRequestMsg",
				'serviceId' => "2001",
				'source' => 2,
			
			];
			
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'msgtype' => "NapasBankCodeRequestMsg",
				'userhash' => md5($data_momo['username']),
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'userid' => $data_momo['username'],
				'requestkey' => $data_momo['requestkey'],
				'accept-language' => 'vi-vn',
				'Authorization' => "Bearer {$data_momo['auth_token']}",
			);
			
			$response = $this->request($return, 2);
			
			return $response;
		}
		
		public function createTransferOut($data_momo, $bank, $CardNum, $CardName, $amount, $partnerRef, $comment)
		{
			
			$microtime = $this->get_microtime();
			$ip = get_ip_address();
			$getDevice = $this->get_device();
			$ip = $ip ? $ip : "115.79.139.158";
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['encrypt'] = true;
			$return['url'] = "https://owa.momo.vn/api/TRAN_HIS_INIT_MSG/8/transfer_p2b";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "TRAN_HIS_INIT_MSG",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'Userhash' => md5($data_momo['username']),
				'userid' => $data_momo['username'],
				'requestkey' => $data_momo['requestkey'],
				'accept-language' => 'vi-vn',
				'Authorization' => "Bearer {$data_momo['auth_token']}",
			);
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => 'TRAN_HIS_INIT_MSG',
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => $this->get_checksum($data_momo, 'TRAN_HIS_INIT_MSG'),
				],
				'momoMsg' => [
					'user' => $data_momo['username'],
					'clientTime' => $microtime,
					'tranType' => 8,
					'comment' => $comment,
					'amount' => $amount,
					'moneySource' => 1,
					'partnerCode' => 'momo',
					'partnerId' => $bank['bankCode'],
					'partnerName' => $bank['bankName'],
					'serviceId' => "transfer_p2b",
					'rowCardNum' => $CardNum,
					'rowCardId' => null,
					'ownerName' => $CardName,
					'partnerRef' => $partnerRef,
					'extras' => json_encode(
						array(
							"bankName" => $bank['shortBankName'],
							"bankLinkImage" => 139,
							"bankNumber" => $CardNum,
							"saveCard" => false,
							"vpc_CardType" => "SML",
							"vpc_TicketNo" => $ip,
						)
					),
					'_class' => 'mservice.backend.entity.msg.TranHisMsg',
					'giftId' => "",
				],
			];
			
			$response = $this->request($return);
			return $response;
		}
		
		public function confirmTransferOut($data_momo, $id, $bank, $CardNum, $CardName, $amount, $fee, $partnerRef, $comment, $extras)
		{
			
			$microtime = $this->get_microtime();
			$getDevice = $this->get_device();
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['encrypt'] = true;
			$return['url'] = "https://owa.momo.vn/api/TRAN_HIS_CONFIRM_MSG/8/transfer_p2b";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30100 CFNetwork/1220.1 Darwin/20.3.0",
				'Msgtype' => "TRAN_HIS_CONFIRM_MSG",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'Userhash' => md5($data_momo['username']),
				'userid' => $data_momo['username'],
				'requestkey' => $data_momo['requestkey'],
				'accept-language' => 'vi-vn',
				'Authorization' => "Bearer {$data_momo['auth_token']}",
			);
			$return['data_body'] = [
				'user' => $data_momo['username'],
				'msgType' => 'TRAN_HIS_CONFIRM_MSG',
				'cmdId' => "{$microtime}000000",
				'lang' => "vi",
				'channel' => "APP",
				'time' => $microtime,
				'appVer' => $this->config['appVer'],
				'appCode' => $this->config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => $this->get_checksum($data_momo, 'TRAN_HIS_CONFIRM_MSG'),
					"cvn" => "",
				],
				'momoMsg' => [
					"ID" => $id,
					'user' => $data_momo['username'],
					"commandInd" => "{$microtime}000000",
					'tranId' => $microtime,
					'clientTime' => $microtime,
					'ackTime' => $microtime,
					'tranType' => 8,
					'io' => -1,
					'partnerId' => $bank['bankCode'],
					'partnerCode' => 'momo',
					'partnerName' => $bank['bankName'],
					'partnerRef' => $partnerRef,
					'amount' => intval($amount),
					'comment' => $comment,
					'status' => 4,
					'ownerNumber' => $data_momo['username'],
					'ownerName' => $CardName,
					'moneySource' => 1,
					'desc' => "Thành Công",
					'fee' => $fee,
					'originalAmount' => $amount - $fee,
					'serviceId' => "transfer_p2b",
					"quantity" => 1,
					"lastUpdate" => $microtime,
					"share" => "0.0",
					"receiverType" => 2,
					'extras' => json_encode($extras),
					"rowCardNum" => $CardNum,
					'_class' => 'mservice.backend.entity.msg.TranHisMsg',
					"channel" => "END_USER",
					"otpType" => "NA",
				],
				"pass" => $data_momo['password'],
			];
			
			$response = $this->request($return);
			return $response;
		}
		
		
	}
