<?php
	
	namespace App\Bank;
	
	class Momo
	{
		public function __construct()
		{
			require_once __DIR__ . "/vendor/autoload.php";
			
			$this->config = [
				'appVer' => '40024',
				'appCode' => "4.0.2",
//				'token' => "GhiGiCungDuocMienDu32KiTuLaDuocc",
				'token' => "wznNGqqpk+b!GREcp?Rf5+wA9SJE%T7D",
				'isVoice' => true,
			];
			
			$this->userInfo = [
				"phone" => "",
				"password" => "",
			];
		
		}
		
		function get_ip_address()
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
		
		function get_device()
		{
			return [
				"device" => "Galaxy S8+",
				"hardware" => "qcom",
				"manufacture" => "samsung",
				"device_os" => "android",
				"model" => "samsung sm-g955n"
			];
		}
		
		function secureid($length = 16)
		{
			$characters = '0123456789abcdef';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		function rkey($length)
		{
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			$size = strlen($chars);
			$string = "";
			
			for ($i = 0; $i < $length; $i++) {
				$string .= $chars[rand(0, $size - 1)];
			}
			
			return $string;
		}
		
		function encryptDecrypt($data, $key, $mode = 'ENCRYPT')
		{
			if (strlen($key) < 32) {
				$key = str_pad($key, 32, 'x');
			}
			$key = substr($key, 0, 32);
			$iv = pack('C*', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
			if ($mode === 'ENCRYPT') {
				return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
			} else {
				return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
			}
		}
		
		function get_RSAencrypt($public_key)
		{
			global $config;
			$rsa = new phpseclib\Crypt\RSA();
			$rsa->setEncryptionMode(phpseclib\Crypt\RSA::ENCRYPTION_PKCS1);
			$rsa->loadKey($public_key);
			$requestkey = base64_encode($rsa->encrypt($config['token']));
			return $requestkey;
		}
		
		function get_microtime()
		{
			return floor(microtime(true) * 1000);
		}
		
		function get_checksum($data_momo, $type)
		{
			$checkSumSyntax = $data_momo['username'] . get_microtime() . '000000' . $type . (get_microtime() / 1000000000000.0) . 'E12';
			return encryptDecrypt($checkSumSyntax, encryptDecrypt($data_momo['setupkey'], $data_momo['ohash'], 'DECRYPT'));
		}
		
		function get_pHash($data_momo)
		{
			$pHashSyntax = $data_momo['imei'] . '|' . $data_momo['password'];
			return encryptDecrypt($pHashSyntax, encryptDecrypt($data_momo['setupkey'], $data_momo['ohash'], 'DECRYPT'));
		}
		
		function get_imei()
		{
			$time = md5(get_microtime());
			$text = substr($time, 0, 8) . '-';
			$text .= substr($time, 8, 4) . '-';
			$text .= substr($time, 12, 4) . '-';
			$text .= substr($time, 16, 4) . '-';
			$text .= substr($time, 17, 12);
			$text = strtoupper($text);
			return $text;
		}
			
		function get_onesignal()
		{
			return generateRandom(22) . ':' .
				generateRandom(9) . '-' .
				generateRandom(20) . '-' .
				generateRandom(12) . '-' .
				generateRandom(7) . '-' .
				generateRandom(7) . '-' .
				generateRandom(53) . '-' .
				generateRandom(9) . '_' .
				generateRandom(11) . '-' .
				generateRandom(4);
		}
		
		function generateRandom($length = 20)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		function request($data_curl)
		{
			global $config;
			
			$data_curl['method'] = (!empty($data_curl['method'])) ? $data_curl['method'] : "POST";
			if ($data_curl['encrypt'] == true) {
				$data_curl['data_body'] = encryptDecrypt(json_encode($data_curl['data_body']), $config['token'], "ENCRYPT");
			}
			
			$curl = new Curl\Curl();
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
			$encrypted = $curl->responseHeaders['encrypted'];
			
			if ($data_curl['encrypt'] == true || $data_curl['encrypt'] == "true") {
				$response = encryptDecrypt($response, $config['token'], "DECRYPT");
			}
			
			if (gettype($response) == 'string') {
				$response = json_decode($response, true);
			} elseif (gettype($response) == "object") {
				$response = json_decode(json_encode($response), true);
			}
			
			return $response;
		}
		
		function checkUserBe($data_momo)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
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
			$response = request($return);
			
			return $response;
		}
		
		function checkUserPrivate($data_momo, $phone)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
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
					'checkSum' => get_checksum($data_momo, 'CHECK_USER_PRIVATE'),
				],
			];
			$response = request($return);
			
			return $response;
			}
		
		function getOtp($data_momo)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
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
					'isVoice' => $config['isVoice'],
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
			
			$response = request($return);
			return $response;
		}
		
		function checkOtp($data_momo, $otp)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
			$secureid = $data_momo['secureid'];
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
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
					'SECUREID' => $secureid,
					'MODELID' => $getDevice['model'] . $getDevice['hardware'] . substr($secureid, 0, 5) . substr($secureid, 5, strlen($secureid) - 1),
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
					'secure_id' => $secureid,
				],
			];
			
			$response = request($return);
			return $response;
		}
		
		function userLogin($data_momo)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
			$secureid = $data_momo['secureid'];
			$return['method'] = "POST";
			$return['encrypt'] = false;
			$return['type'] = "class";
			$return['url'] = "https://owa.momo.vn/public/login";
			$return['header'] = array(
				'User-Agent' => "MoMoPlatform-Release/30280 CFNetwork/1220.1 Darwin/20.3.0",
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'appId' => "vn.momo.platform",
				'buildNumber' => 0,
				'extra' => array(
					'pHash' => get_pHash($data_momo),
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
			$response = request($return);
			
			if (empty($response)) {
				return false;
			}
			return $response;
		}
		
		function getHistory($data_momo, $hours = 24)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
			$return['encrypt'] = true;
			$return['method'] = "POST";
			$return['url'] = "https://api.momo.vn/sync/transhis/list";
			$return['header'] = array(
				'Host' => 'api.momo.vn',
				'content-type' => 'application/json',
				'accept' => 'application/json',
				'authorization' => "Bearer {$data_momo['auth_token']}",
				'requestkey' => $data_momo['requestkey'],
				'user-agent' => "MoMoPlatform-Release/31100 CFNetwork/978.0.7 Darwin/18.7.0"
			);
			$return['data_body'] = array(
				'requestId' => $microtime,
				'offset' => 0,
				'limit' => 5,
				'startDate' => date("d/m/Y", time() - $hours * 3600),
				'endDate' => date("d/m/Y"),
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'lang' => 'vi',
				'deviceOS' => $getDevice['device_os'],
				'channel' => 'APP',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
			);
			
			$response = request($return);
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
						"comment" => getCommentOfTrans($data_momo, $value['transId']),
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
		
		function getCommentOfTrans($data_momo, $transId)
		{
			global $config;
			$result = "";
			$microtime = get_microtime();
			$getDevice = get_device();
			$return['encrypt'] = true;
			$return['method'] = "POST";
			$return['url'] = "https://api.momo.vn/sync/transhis/details";
			$return['header'] = array(
				'Host' => 'api.momo.vn',
				'content-type' => 'application/json',
				'accept' => 'application/json',
				'authorization' => "Bearer {$data_momo['auth_token']}",
				'requestkey' => $data_momo['requestkey'],
				'user-agent' => "MoMoPlatform-Release/31100 CFNetwork/978.0.7 Darwin/18.7.0"
			);
			$return['data_body'] = array(
				'requestId' => $microtime,
				'transId' => $transId,
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'lang' => 'vi',
				'deviceOS' => $getDevice['device_os'],
				'channel' => 'APP',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
			);
			$response = request($return);
			
			if (isset($response['momoMsg']['serviceData'])) {
				$serviceData = json_decode($response['momoMsg']['serviceData'], true);
				if (isset($serviceData['COMMENT_VALUE'])) {
					$result = $serviceData['COMMENT_VALUE'];
				}
			}
			
			$countNull = 0;
			
			while ($result == "" && $countNull <= 10) {
				$response = request($return);
				
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
		
		function createTransfer($data_momo, $to_phone, $balance, $comment)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['encrypt'] = true;
			$return['url'] = "https://owa.momo.vn/api/M2MU_INIT";
			$ip = get_ip_address();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => get_checksum($data_momo, "M2MU_INIT"),
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
			
			$response = request($return);
			return $response;
		}
		
		function confirmTransfer($data_momo, $id)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => get_checksum($data_momo, "M2MU_CONFIRM"),
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
			
			$response = request($return);
			return $response;
		}
		
		function getBalance($data_momo, $hours = 24)
		{
			$response = getHistory($data_momo, $hours);
			
			return $response["momoMsg"]["tranList"][0]["postBalance"];
		}
		
		function bankCodeList($data_momo)
		{
			$return['method'] = "POST";
			$return['type'] = "class";
			$return['url'] = "https://owa.momo.vn/service";
			$return['encrypt'] = true;
			$return['data_body'] = [
				'requestId' => get_onesignal(),
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

			$response = request($return);
			return $response;
		}
		
		function createTransferOut($data_momo, $bank, $CardNum, $CardName, $amount, $partnerRef, $comment)
		{
			global $config;
			$microtime = get_microtime();
			$ip = get_ip_address();
			$getDevice = get_device();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => get_checksum($data_momo, 'TRAN_HIS_INIT_MSG'),
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

			$response = request($return);
			return $response;
		}

		function confirmTransferOut($data_momo, $id, $bank, $CardNum, $CardName, $amount, $fee, $partnerRef, $comment, $extras)
		{
			global $config;
			$microtime = get_microtime();
			$getDevice = get_device();
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
				'appVer' => $config['appVer'],
				'appCode' => $config['appCode'],
				'deviceOS' => $getDevice['device_os'],
				'result' => true,
				'errorCode' => 0,
				'errorDesc' => '',
				'buildNumber' => 0,
				'appId' => 'vn.momo.platform',
				'extra' => [
					'checkSum' => get_checksum($data_momo, 'TRAN_HIS_CONFIRM_MSG'),
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
			
			$response = request($return);
			return $response;
		}
		
	}
