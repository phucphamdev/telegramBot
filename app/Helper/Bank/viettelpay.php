<?php
	
	class Viettelpay
	{
		
		private $Action = array(
			'BANKPLUS' => 'https://bankplus.vn/MobileAppService2/ServiceAPI',
			'LOGIN' => 'https://api8.viettelpay.vn/customer/v1/validate/account',
			'LOGIN_AUTH' => 'https://api8.viettelpay.vn/auth/v1/authn/login',
			'REFRESH_AUTH' => 'https://api8.viettelpay.vn/auth/v1/authn/refresh',
			'SESSION_ID' => 'https://api8.viettelpay.vn/customer/v1/accounts?sources=1&recommendations=1',
			'E_KYCFACE' => 'https://api8.viettelpay.vn/customer-ekyc/v1/kyc/portrait',
			'E_KYCCCCD' => 'https://api8.viettelpay.vn/customer-ekyc/v1/kyc/gov-id',
			'REGISTER' => 'https://api8.viettelpay.vn/customer/v2/accounts/register'
		);
		
		private $connect;
		
		private $config = array();
		
		public function __construct($username, $database, $password, $hostname = 'localhost')
		{
			$conn = mysqli_connect($hostname, $username, $password, $database);
			if ($conn) {
				$this->connect = $conn;
				return $this;
			}
			
			die("connect to mysqli error: " . mysqli_connect_error());
		}
		
		public function LoadPhone($PhoneNumber)
		{
			if (empty($PhoneNumber)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập số điện thoại'
				);
			}
			
			$PhoneNumber = $this->ConvertPhone($PhoneNumber);
			$num_rows = mysqli_query($this->connect, "SELECT * FROM `account_vtp` WHERE `phone` = '{$PhoneNumber}' ");
			if (empty(mysqli_num_rows($num_rows))) {
				$imei = strtoupper($this->generateImei());
				$token_notification = $this->get_TOKEN();
				$this->config = array(
					'phone' => $PhoneNumber,
					'imei' => $imei,
					'token_notification' => $token_notification
				);
				
				$results = $this->GenerateRSA();
				
				if (empty($results['client_private_key']) or empty($results['viettel_public_key'])) {
					return array(
						'success' => false,
						'msg' => 'Lỗi get KEY RSA'
					);
				}
				
				mysqli_query($this->connect, "INSERT INTO `account_vtp` SET `phone` = '{$PhoneNumber}',
                                                                            `imei`  = '{$imei}',
                                                                            `token_notification` = '{$token_notification}',
                                                                            `client_private_key` = '{$results['client_private_key']}',
                                                                            `viettel_public_key` = '{$results['viettel_public_key']}' ");
				
				return $this;
			}
			
			$this->config = mysqli_fetch_assoc($num_rows);
			
			return $this;
			
		}
		
		public function Register()
		{
			$result = $this->RegisterAPI();
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Đã xảy ra lỗi với server ViettelPay'
				);
			}
			$DataJson = addslashes($result);
			mysqli_query($this->connect, "UPDATE `account_vtp` SET `DataSend` = '{$DataJson}' WHERE `phone` = '{$this->config['phone']}' ");
			return $result;
		}
		
		public function ImportOTPRegister($otp)
		{
			$config = json_decode($this->config['DataSend'], true);
			if (empty($otp)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập mã OTP'
				);
			}
			$config['otp'] = trim($otp);
			$result = $this->ImportOTPRegisterAPI($config);
			
			return $result;
		}
		
		public function GetSessionID()
		{
			$result = $this->GET_INFO_ACCOUNT();
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Lỗi server viettel pay!!'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'msg' => $result['status']['displayMessage']
				);
			}
			$session_id = $result['data']['otherData']['sessionId'];
			$fullname = $result['data']['sources']['infra']['0']['fullname'];
			$accNo = $result['data']['sources']['infra']['0']['accNo'];
			$accountId = $result['data']['accountId'];
			mysqli_query($this->connect, "UPDATE `account_vtp` SET `session_id` = '{$session_id}',
                                                                   `fullname`   = '{$fullname}',
                                                                   `accNo`      = '{$accNo}',
                                                                   `accountId` = '{$accountId}' WHERE `phone` = '{$this->config['phone']}'");
			return array(
				'success' => true
			);
		}
		
		public function ImportOTP($OTP)
		{
			$result = $this->IMPORT_OTP(trim($OTP));
			if (empty($result['status'])) {
				return array(
					'success' => false,
					'msg' => 'Lỗi server !!'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'code' => $result['status']['code'],
					'msg' => $result['status']['message']
				);
			}
			
			mysqli_query($this->connect, "UPDATE `account_vtp` SET `authorization` = '{$result['data']['accessToken']}',
                                                                   `refreshToken` = '{$result['data']['refreshToken']}' WHERE `phone` = '{$this->config['phone']}' ");
			
			$this->config['authorization'] = $result['data']['accessToken'];
			$result = $this->GetSessionID();
			if (empty($result['success'])) {
				return array(
					'success' => false,
					'mag' => $result['msg']
				);
			}
			
			return array(
				'success' => true,
				'msg' => 'Đăng nhập thành công'
			);
		}
		
		public function LoginUser($password = '')
		{
			if (!empty($password)) {
				$this->config['password'] = $password;
			} else {
				if (empty($this->config['password'])) {
					return array(
						'success' => false,
						'msg' => 'Vui lòng nhập mật khẩu để đăng nhập'
					);
				}
				$password = $this->config['password'];
			}
			$result = $this->LOGIN_L1();
			if (empty($result['status'])) {
				return array(
					'success' => false,
					'msg' => 'Lỗi server !!'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'code' => $result['status']['code'],
					'msg' => $result['status']['message']
				);
			}
			
			$result = $this->LOGIN_AUTH();
			if (!empty($result['data']['requestId'])) {
				mysqli_query($this->connect, "UPDATE `account_vtp` SET `password` = '{$password}',
                                                                       `requestId` = '{$result['data']['requestId']}' 
                                                                       WHERE `phone` = '{$this->config['phone']}' ");
			}
			
			if (empty($result['status'])) {
				return array(
					'success' => false,
					'mag' => 'Lỗi server !!'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'code' => $result['status']['code'],
					'msg' => $result['status']['message']
				);
			}
			
			mysqli_query($this->connect, "UPDATE `account_vtp` SET `authorization` = '{$result['data']['accessToken']}',
                                                                   `refreshToken` = '{$result['data']['refreshToken']}'
                                                                    WHERE `phone` = '{$this->config['phone']}' ");
			$this->config['authorization'] = $result['data']['accessToken'];
			$result = $this->GetSessionID();
			if (empty($result['success'])) {
				return array(
					'success' => false,
					'mag' => $result['msg']
				);
			}
			
			return array(
				'success' => true,
				'msg' => 'Đăng nhập thành công'
			);
		}
		
		private function IMPORT_OTP($OTP)
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				''
			);
			
			$Data = array(
				'typeOs' => 'iOS',
				'notifyToken' => $this->config['token_notification'],
				'userType' => 'msisdn',
				'pin' => $this->config['password'],
				'imei' => $this->config['imei'],
				'msisdn' => $this->config['phone'],
				'loginType' => 'BASIC',
				'otp' => $OTP,
				'username' => $this->config['phone'],
				'requestId' => $this->config['requestId'],
			);
			
			return $this->Curl('LOGIN_AUTH', $header, json_encode($Data));
		}
		
		private function active($config)
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				'authorization: Bearer ' . $this->config['authorization']
			);
			$Data = array(
				'type' => 'NHS',
				'app_version: 5.1.0',
				'birthDate' => $config['dateOfBirth'],
				'gender' => ($config['gender'] == 'FEMALE') ? 'Nữ' : 'Nam',
				'currentAddress' => $config['addressPermanent'],
				'order_id' => $this->get_order_id(),
				'imei' => $this->config['imei'],
				'typeOs' => 'iOS',
				'notifyToken' => $this->config[''],
				'ekycData' =>
					array(
						'partner' => 'TS',
					),
				'idIssueDate' => $config['govIdIssueDate'],
				'app_name' => 'VIETTELMONEY',
				'districtName' => $config['district'],
				'pin' => $this->config['password'],
				'custName' => $config['fullname'],
				'refreshToken' => $this->config['refreshToken'],
				'onboardingId' => 'CS-f35c8eb3b37744b9a2ed0973f3dd056c',
				'birthplace' => $config['addressPermanent'],
				'residenceStatus' => '',
				'identityValue' => $this->config['phone'],
				'nationality' => 'VN',
				'identityType' => 'msisdn',
				'idNo' => $config['govId'],
				'idType' => '6',
				'provinceName' => $config['province'],
				'precinctName' => $config['area'],
				'type_os' => 'ios',
				'residentialAddress' => $config['addressPermanent'],
				'idIssuePlace' => $config['govIdIssuePlace'],
			);
			
			return $this->Curl('https://api8.viettelpay.vn/customer/v2/accounts/active', $header, json_encode($Data));
		}
		
		public function LOGIN_L1()
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP'
			);
			
			$Data = array(
				'username' => $this->config['phone'],
				'type' => 'msisdn',
			);
			
			return $this->Curl('LOGIN', $header, json_encode($Data));
		}
		
		public function GET_RANK()
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELPAY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				'authorization: Bearer ' . $this->config['authorization']
			);
			$this->Action['RANK'] = 'https://api8.viettelpay.vn/loyalty/mobile/v2/accounts/get-account-rank?msisdn=' . $this->config['phone'];
			return $this->Curl('RANK', $header, '');
		}
		
		public function EKYCOnline($config)
		{
			if (empty($config['faceImage'])) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng chọn ảnh có khuôn mặt'
				);
			} else if (empty($config['ImageBack'])) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng gửi ảnh có mặt trước CCCD',
				);
			} else if (empty($config['ImageFront'])) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng gửi ảnh có mặt sau CCCD'
				);
			}
			
			$result = $this->ImageFace($config['faceImage']);
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Đã xảy ra lỗi server ViettelPay'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'errorCode' => $result['status']['code'],
					'msg' => $result['displayMessage']
				);
			}
			
			$result = $this->ImageCCCD($config);
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Đã xảy ra lỗi server ViettelPay'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'errorCode' => $result['status']['code'],
					'msg' => $result['displayMessage'],
					'data' => $result['data']
				);
			}
			$result = $this->active($result['data']);
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Đã xảy ra lỗi server ViettelPay'
				);
			} else if ($result['status']['code'] != '00') {
				return array(
					'success' => false,
					'errorCode' => $result['status']['code'],
					'msg' => $result['displayMessage'],
					'data' => $result['data']
				);
			}
			return $result;
		}
		
		public function GetBalance()
		{
			$result = $this->BALANCE_INQUIRY_NO_PIN();
			
			if (empty($result) || !is_array($result)) {
				return array(
					'success' => false,
					'msg' => 'Lỗi server vui lòng thử lại'
				);
			}
			if ($result['response_code'] != '00') {
				return array(
					'success' => false,
					'msg' => $result['error_code_detail']
				);
			}
			mysqli_query($this->connect, "UPDATE `account_vtp` WHERE SET `balance` = '{$result['balance']}'
                                                                         `phone` = '{$this->config['phone']}' ");
			return array(
				'success' => true,
				'balance' => $result['balance'],
				'msg' => $result['error_code_detail']
			);
		}
		
		public function GetHisTory($days = 30)
		{
			$time_new = date('Y-m-d', time() + 86400);
			
			$time_old = date('Y-m-d', time() - ($days * 86400));
			$config = array(
				'start_date' => $time_old,
				'end_date' => $time_new
			);
			$result = $this->GET_HISTORY_VTP($config);
			
			return $result;
		}
		
		public function SendMoney($recevicer, $amount = 1000, $comment = '')
		{
			if (empty($recevicer)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập số cần chuyển đến'
				);
			}
			
			$config = array(
				'recevicer' => $recevicer,
				'amount' => $amount,
				'comment' => $comment
			);
			
			$result = $this->MONEY_TRANSFER_INSIDE_SMS($config);
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Lỗi server viettelpay khi tạo đơn chuyển tiền'
				);
			}
			$DataJson = array(
				'recv_cust_mobile' => $result['recv_cust_mobile'],
				'trans_amount' => $result['trans_amount'],
				'trans_content' => $result['trans_content'],
				'otp_order_id' => $result['order_id']
			);
			$DataJson = addslashes(json_encode($DataJson));
			mysqli_query($this->connect, "UPDATE `account_vtp` SET `DataSend` = '{$DataJson}' WHERE `phone` = '{$this->config['phone']}' ");
			
			return $result;
			
		}
		
		public function SendMoneyOTP($code)
		{
			if (empty($code)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập mã xác nhận OTP'
				);
			}
			$config = json_decode($this->config['DataSend'], true);
			$config['otp_code'] = $code;
			return $this->MONEY_TRANSFER_INSIDE_SMS_OTP($config);
		}
		
		public function SendMoneyBank($BankName, $BankNumber, $amount, $comment = '')
		{
			if (empty($BankName)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng điền tên ngân hàng cần chuyển đến'
				);
			} else if (empty($BankNumber)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng điền số tài khoản ngân hàng cần chuyển'
				);
			} else if (empty($amount)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng điền số tiền cần chuyển'
				);
			} else if (empty($comment)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập nội dung cần chuyển'
				);
			}
			
			$config = array(
				'recv_bankcode' => $BankName,
				'recv_cust_bank_acc' => $BankNumber,
				'trans_content' => $comment,
				'trans_amount' => $amount,
			);
			
			$result = $this->GET_BENNAME_FROM_ACCOUNT_NUMBER($config);
			$config['ben_name'] = $result['ben_name'];
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Đã xảy ra lỗi server Viettel Pay'
				);
			} else if ($result['response_code'] != '00') {
				return array(
					'success' => false,
					'errorCode' => $result['response_code'],
					'msg' => $result['error_code_detail']
				);
			}
			
			$result = $this->MONEY_TRANSFER_OUTSIDE_SMS($config);
			if (empty($result)) {
				return array(
					'success' => false,
					'msg' => 'Đã xảy ra lỗi server Viettel Pay'
				);
			} else if ($result['response_code'] != 'OTP') {
				return array(
					'success' => false,
					'errorCode' => $result['response_code'],
					'msg' => $result['error_code_detail']
				);
			}
			$config['order_id'] = $result['order_id'];
			
			$DataJson = addslashes(json_encode($config));
			
			mysqli_query($this->connect, "UPDATE `account_vtp` SET `DataSend` = '{$DataJson}' WHERE `phone` = '{$this->config['phone']}' ");
			
			return $result;
		}
		
		private function ImageFace($config)
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				'authorization: Bearer ' . $this->config['authorization']
			);
			$Data = array(
				'base64Image' => $config['base64Image']
			);
			
			return $this->Curl('E_KYCFACE', $header, json_encode($Data));
		}
		
		private function ImageCCCD($config)
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				'authorization: Bearer ' . $this->config['authorization']
			);
			$Data = array(
				'govIdType' => 'CCCD',
				'base64ImageBack' => $config['base64ImageBack'],
				'base64ImageFront' => $config['base64ImageFront']
			);
			
			return $this->Curl('E_KYCCCCD', $header, json_encode($Data));
		}
		
		private function RegisterAPI()
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
			);
			$Data = array(
				'type' => 'REGISTER',
				'identityValue' => $this->config['phone'],
				'identityType' => 'msisdn',
			);
			
			return $this->Curl('REGISTER', $header, json_encode($Data));
		}
		
		private function ImportOTPRegisterAPI($config)
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
			);
			$Data = array(
				'hash' => $config['data']['hash'],
				'identityValue' => $this->config['phone'],
				'imei' => $this->config['imei'],
				'identityType' => 'msisdn',
				'typeOs' => 'iOS',
				'type' => 'VERIFY',
				'verifyMethod' => 'sms',
				'otp' => $config['otp'],
				'notifyToken' => $this->config['token_notification'],
				'transactionId' => $config['data']['transactionId'],
			);
			return $this->Curl('REGISTER', $header, json_encode($Data));
			
		}
		
		public function SendMoneyBankOTP($code)
		{
			if (empty($code)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập mã xác nhận OTP'
				);
			}
			$config = json_decode($this->config['DataSend'], true);
			$config['otp_code'] = $code;
			return $this->MONEY_TRANSFER_OUTSIDE_SMS_OTP($config);
		}
		
		public function GetListBank($rervicer = null)
		{
			if (empty($rervicer)) {
				return array(
					'success' => false,
					'msg' => 'Vui lòng nhập số điện thoại cần chuyển'
				);
			}
			$result = $this->GET_LIST_BANK_FROM_MSISDN($rervicer);
			
			return $result;
		}
		
		private function MONEY_TRANSFER_INSIDE_SMS_OTP($config)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'recv_cust_mobile' => $config['recv_cust_mobile'],
				'otp_order_id' => $config['otp_order_id'],
				'bank_code' => 'VTT',
				'service_type' => '0',
				'recv_cust_bank_acc' => '',
				'recv_bankcode' => 'VTT',
				'trans_amount' => $config['trans_amount'],
				'trans_content' => $config['trans_content'],
				'money_source' => $this->config['accNo'],
				'money_source_bank_code' => 'VTT',
				'otp_code' => $config['otp_code'],
				'pin' => $this->config['password']
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('MONEY_TRANSFER_INSIDE_SMS_OTP', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function MONEY_TRANSFER_INSIDE_SMS($config)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'recv_cust_mobile' => $config['recevicer'],
				'recv_cust_bank_acc' => '',
				'recv_bankcode' => 'VTT',
				'trans_amount' => $config['amount'],
				'trans_content' => $config['comment'],
				'service_type' => '0',
				'money_source' => $this->config['accNo'],
				'money_source_bank_code' => 'VTT',
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('MONEY_TRANSFER_INSIDE_SMS', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function CHANGE_CURRENT_MONEY_SOURCE()
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'money_source' => $this->config['accNo'],
				'money_source_bank_code' => 'VTT',
				'pin' => $this->config['password']
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('CHANGE_CURRENT_MONEY_SOURCE', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function GET_TRANSACTION_FEE($amount = 1000)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'is_new' => '1',
				'amount_org' => '',
				'trans_content' => json_encode(array(
					0 =>
						array(
							'sourceBankCode' => 'VTT',
							'transType' => '1',
							'serviceCode' => '',
							'transAmount' => $amount,
							'fee' => '0',
							'packageBank' => 'VTT_BANKPLUS_ECO',
							'walletSrcMoney' => 'VTT',
							'benBankCode' => 'VTT',
							'limitPerRequest' => '100',
							'limitPerDay' => '1000',
							'transCode' => 'MOBILE',
						),
				)),
				'trans_amount' => $amount,
				'cust_code' => '',
				'merchant_key' => '',
				'customer_type' => ''
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('GET_TRANSACTION_FEE', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function BALANCE_INQUIRY_NO_PIN()
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			
			$Data = array(
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'bank_code' => 'VTT',
				'money_source' => $this->config['accNo'],
				'money_source_bank_code' => 'VTT'
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('BALANCE_INQUIRY_NO_PIN', $this->encrypt($http_encode), $this->signature($http_encode)));
			
		}
		
		private function MONEY_TRANSFER_OUTSIDE_SMS($config)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'bank_code' => 'VTT',
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'money_source_bank_code' => 'VTT',
				'recv_cust_mobile' => '',
				'recv_bank_branch_name' => $config['ben_name'],
				'session_id' => $this->config['session_id'],
				'trans_content' => $config['trans_content'],
				'trans_amount' => $config['trans_amount'],
				'recv_cust_bank_acc' => $config['recv_cust_bank_acc'],
				'recv_bankcode' => $config['recv_bankcode'],
				'money_source' => $this->config['accNo'],
				'pin' => $this->config['password']
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('MONEY_TRANSFER_OUTSIDE_SMS', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function MONEY_TRANSFER_OUTSIDE_SMS_OTP($config)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELPAY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'money_source_bank_code' => 'VTT',
				'recv_bank_branch_name' => $config['ben_name'],
				'session_id' => $this->config['session_id'],
				'trans_content' => $config['trans_content'],
				'trans_amount' => $config['trans_amount'],
				'recv_cust_bank_acc' => $config['recv_cust_bank_acc'],
				'recv_bankcode' => $config['recv_bankcode'],
				'money_source' => $this->config['accNo'],
				'otp_order_id' => $config['order_id'],
				'pin' => $config['password'],
				'otp_code' => $config['otp_code']
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('MONEY_TRANSFER_OUTSIDE_SMS_OTP', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function GET_BENNAME_FROM_ACCOUNT_NUMBER($config)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELPAY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'recv_cust_bank_acc' => $config['recv_cust_bank_acc'],
				'recv_bankcode' => $config['recv_bankcode'],
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('GET_BENNAME_FROM_ACCOUNT_NUMBER', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function GET_LIST_BANK_FROM_MSISDN($rervicer)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELPAY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'ben_msisdn' => $rervicer,
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('GET_LIST_BANK_FROM_MSISDN', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function GET_INFO_ACCOUNT()
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELPAY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				'authorization: Bearer ' . $this->config['authorization']
			);
			
			return $this->Curl('SESSION_ID', $header);
		}
		
		private function GET_HISTORY_VTP($config)
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			$Data = array(
				'app_name' => 'VIETTELMONEY',
				'typeos' => 'ios',
				'app_version' => '5.1.0',
				'os_version' => '15.1.1',
				'imei' => $this->config['imei'],
				'order_id' => $this->get_order_id(),
				'session_id' => $this->config['session_id'],
				'account_number' => $this->config['phone'],
				'start_date' => $config['start_date'],
				'end_date' => $config['end_date'],
				'process_code' => '0',
				'service_code' => '',
				'bank_code_query' => 'ALL',
				'page' => '0',
				'transfer_type' => '1',
			);
			
			$http_encode = $this->Build_query($Data);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('GET_HISTORY_VTP', $this->encrypt($http_encode), $this->signature($http_encode)));
		}
		
		private function Xmldecrypt($xml_encrypted)
		{
			
			$return = array();
			$explode = explode('&amp', $xml_encrypted);
			foreach ($explode as $item) {
				if (strstr($item, 'encrypted')) {
					$encrypted_data = explode('encrypted=', $item)[1];
				}
			}
			
			return $this->decrypt($encrypted_data);
		}
		
		private function signature($string)
		{
			if (openssl_sign($string, $signature, $this->RSAKeys($this->config['client_private_key'], 2))) {
				
				return base64_encode($signature);
				
			}
			
			return false;
		}
		
		private function REFRESH_AUTH()
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP',
				'authorization: Bearer ' . $this->config['authorization']
			);
			
			$Data = array(
				'refreshToken' => $this->config['refreshToken'],
			);
			
			return $this->Curl('REFRESH_AUTH', $header, json_encode($Data));
		}
		
		private function LOGIN_AUTH()
		{
			$header = array(
				'host: api8.viettelpay.vn',
				'content-type: application/json',
				'accept: */*',
				'app_version: 5.1.0',
				'product: VIETTELMONEY',
				'type_os: ios',
				'accept-language: vi',
				'imei: ' . $this->config['imei'],
				'user-agent: ViettelPay/5.1.0 (com.viettel.viettelpay; build:1; iOS 15.1.1) Alamofire/5.1.0',
				'os_version: 15.1.1',
				'authority-party: APP'
			);
			$Data = array(
				'userType' => 'msisdn',
				'loginType' => 'BASIC',
				'pin' => $this->config['password'],
				'msisdn' => $this->config['phone'],
				'imei' => $this->config['imei'],
				'username' => $this->config['phone'],
				'notifyToken' => $this->config['token_notification'],
				'typeOs' => 'iOS',
			);
			
			return $this->Curl('LOGIN_AUTH', $header, json_encode($Data));
		}
		
		private function Build_query(array $array)
		{
			$return = "";
			foreach ($array as $keys => $values) {
				
				$return .= "{$keys}={$values}&";
				
			}
			
			$return = rtrim($return, '&');
			
			return $return;
		}
		
		public function SETUP_SOFTWARE()
		{
			$header = array(
				'Host: bankplus.vn',
				'Content-Type: text/xml; charset=utf-8',
				'Connection: keep-alive',
				'SOAPAction: gwOperator',
				'Accept: */*',
				'User-Agent: ViettelPay/5.1.0 (iPhone; iOS 15.1.1; Scale/3.00)',
				'Accept-Language: vi;q=1',
			);
			
			$Data = array(
				'app_version' => '5.1.0',
				'order_id' => $this->get_order_id(),
				'imei' => $this->config['imei'],
				'os_version' => '15.1.1',
				'type_os' => 'ios',
				'token_notification' => $this->config['token_notification'],
				'app_name' => 'VIETTELMONEY',
			);
			
			return $this->Curl('BANKPLUS', $header, $this->XmlEncrypt('SETUP_SOFTWARE', urlencode(http_build_query($Data)), 'null'), false);
		}
		
		private function GenerateRSA()
		{
			$results = $this->SETUP_SOFTWARE();
			$explode = explode('&amp', $results);
			$return = array();
			foreach ($explode as $values) {
				if (strstr($values, 'client_private_key')) {
					$return['client_private_key'] = substr($values, 20);
				} else if (strstr($values, 'viettel_public_key')) {
					$return['viettel_public_key'] = substr($values, 20);
				}
			}
			
			return $return;
		}
		
		private function XmlEncrypt($cmd, $data, $singature)
		{
			$xmlheader = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<SOAP-ENV:Envelope xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ba=\"http://bankplus.vn\"><SOAP-ENV:Header/> \r\n<SOAP-ENV:Body>\r\n<ba:gwOperator><cmd>";
			$xmlheader .= $cmd . "</cmd>";
			$xmlheader .= "<encrypted>" . $data . "</encrypted>";
			$xmlheader .= "<signature>" . $singature . "</signature>";
			$xmlheader .= "</ba:gwOperator>";
			$xmlheader .= "\r\n";
			$xmlheader .= "</SOAP-ENV:Body>";
			$xmlheader .= "\r\n";
			$xmlheader .= "</SOAP-ENV:Envelope>";
			return $xmlheader;
		}
		
		private function get_order_id()
		{
			return date('Ymdhis');
		}
		
		private function encrypt($string = '')
		{
			
			$array_split = str_split($string, 86);
			$return = "";
			foreach ($array_split as $item) {
				
				if (openssl_public_encrypt($item, $encrypted_data, $this->RSAKeys($this->config['viettel_public_key'], 1), OPENSSL_PKCS1_PADDING)) {
					$return .= base64_encode(strrev($encrypted_data));
				}
			}
			
			
			return $return;
		}
		
		private function http_decode($response)
		{
			$return = array();
			if (is_object(json_decode($response))) {
				
				return json_decode($response, true);
			} else if (strstr($response, '&')) {
				$response = ltrim(rtrim($response, '&'), '&');
				$explode = explode('&', $response);
				foreach ($explode as $values) {
					$explo = explode('=', $values);
					$return[$explo[0]] = $explo[1];
				}
			}
			return $return;
		}
		
		public function decrypt($encrypted_data)
		{
			
			$array_split = str_split($encrypted_data, 344);
			$return = "";
			
			foreach ($array_split as $item) {
				if (openssl_private_decrypt(strrev(base64_decode($item)), $decrypted_data, $this->RSAKeys($this->config['client_private_key'], 2), OPENSSL_PKCS1_PADDING)) {
					
					$return .= $decrypted_data;
				}
			}
			
			return $this->http_decode($return);
		}
		
		private function RSAKeys($keys, $type = 1)
		{
			if ($type == 1) {
				return "-----BEGIN PUBLIC KEY-----\n" . $keys . "\n-----END PUBLIC KEY-----";
			} else {
				return "-----BEGIN PRIVATE KEY-----\n" . $keys . "\n-----END PRIVATE KEY-----";
			}
		}
		
		private function Curl($action, $header, $request = '', $xml = true)
		{
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->Action[$action],
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_HTTPHEADER => $header,
				CURLOPT_POST => empty($request) ? FALSE : TRUE,
				CURLOPT_POSTFIELDS => $request,
				CURLOPT_CUSTOMREQUEST => empty($request) ? 'GET' : 'POST',
			));
			
			$response = curl_exec($curl);
			if (is_object(json_decode($response))) {
				
				return json_decode($response, true);
			} else if ($xml == true) {
				
				return $this->Xmldecrypt($response);
				
			} else {
				return $response;
			}
			
		}
		
		public function ConvertPhone($phonenumber)
		{
			$CELL = array(
				'016966' => '03966',
				'0169' => '039',
				'0168' => '038',
				'0167' => '037',
				'0166' => '036',
				'0165' => '035',
				'0164' => '034',
				'0163' => '033',
				'0162' => '032',
				'0120' => '070',
				'0121' => '079',
				'0122' => '077',
				'0126' => '076',
				'0128' => '078',
				'0123' => '083',
				'0124' => '084',
				'0125' => '085',
				'0127' => '081',
				'0129' => '082',
				'01992' => '059',
				'01993' => '059',
				'01998' => '059',
				'01999' => '059',
				'0186' => '056',
				'0188' => '058'
			);
			
			$phonenumber = str_replace(' ', '', $phonenumber);
			//2. Xóa các dấu chấm phân cách
			$phonenumber = str_replace('.', '', $phonenumber);
			//3. Xóa các dấu gạch nối phân cách
			$phonenumber = str_replace('-', '', $phonenumber);
			//4. Xóa dấu mở ngoặc đơn
			$phonenumber = str_replace('(', '', $phonenumber);
			//5. Xóa dấu đóng ngoặc đơn
			$phonenumber = str_replace(')', '', $phonenumber);
			//6. Xóa dấu +
			$phonenumber = str_replace('+', '', $phonenumber);
			//7. Chuyển 84 đầu thành 0
			if (substr($phonenumber, 0, 2) == '84') {
				$phonenumber = '0' . substr($phonenumber, 2, strlen($phonenumber) - 2);
			}
			foreach ($CELL as $key => $value) {
				//$prefixlen=strlen($key);
				if (strpos($phonenumber, $key) === 0) {
					$prefix = $key;
					$prefixlen = strlen($key);
					$phone = substr($phonenumber, $prefixlen, strlen($phonenumber) - $prefixlen);
					$prefix = str_replace($key, $value, $prefix);
					$phonenumber = $prefix . $phone;
					//$phonenumber=str_replace($key,$value,$phonenumber);
					break;
				}
			}
			
			if (substr($phonenumber, 0, 1) == '0') {
				$phonenumber = '84' . substr($phonenumber, 1, strlen($phonenumber) - 1);
			}
			return $phonenumber;
		}
		
		private function get_TOKEN()
		{
			return $this->generateRandom(22) . ':' . $this->generateRandom(9) . '-' . $this->generateRandom(20) . '-' . $this->generateRandom(12) . '-' . $this->generateRandom(7) . '-' . $this->generateRandom(7) . '-' . $this->generateRandom(53) . '-' . $this->generateRandom(9) . '_' . $this->generateRandom(11) . '-' . $this->generateRandom(4);
		}
		
		private function generateRandom($length = 20)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		public function generateImei()
		{
			return $this->generateRandomString(8) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(4) . '-' . $this->generateRandomString(12);
		}
		
		private function generateRandomString($length = 20)
		{
			$characters = '0123456789abcdef';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		public function get_microtime()
		{
			return round(microtime(true) * 1000);
		}
		
		
	}


?>