<?php

	namespace App\Helper\Bank;

	use App\Models\System;

	class TPBank
	{
		private $username;
		private $password;
		private $APP_VERSION = "10.10.81";
		private $SOURCE_APP = "HYDRO";
		private $PLATFORM_VERSION = "15.1.1";
		private $DEVICE_NAME = "";
		private $imei = "";
		private $host = "https://ebank.tpb.vn/";
		private $token = "";
		private $debtorAccountNumber = "";

		public function __construct()
		{
			$object = System::where('id', 999)->first();
			$this->username = $object->tpbank_username;
			$this->password = $object->tpbank_password;
			$this->token = $object->tpbank_token;
			$this->debtorAccountNumber = $object->tpbank_debtorAccountNumber;
		}

		public function setData($imei, $DEVICE_NAME)
		{
			$this->DEVICE_NAME = $DEVICE_NAME;
			$this->imei = $imei;
			$data['tpbank_imei'] = $imei;
			$data['tpbank_DEVICE_NAME'] = $DEVICE_NAME;
			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();
		}

		public function setToken($token, $debtorAccountNumber)
		{
			$this->token = $token;
			$this->debtorAccountNumber = $debtorAccountNumber;
			$data['tpbank_token'] = $token;
			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();

		}

		public function doLogin()
		{
			$params = array(
				"username" => $this->username,
				"password" => $this->password,
				"deviceId" => $this->imei,
				"step_2FA" => "VERIFY"
			);

			$doLogin = $this->curlPost($this->host . "gateway/api/auth/login", $params);
			$doLogin = json_decode($doLogin, true);

			return $doLogin;
		}

		public function getInfo()
		{
			$params = array();
			$getInfo = $this->curlPost($this->host . "gateway/api/customers-presentation-service/v1/customers", $params);
			$getInfo = json_decode($getInfo, true);

			return $getInfo;
		}

		public function getListBank()
		{
			$params = array();
			$getListBank = $this->curlPost($this->host . "gateway/api/common-presentation-service/v1/banknapas", $params);
			$getListBank = json_decode($getListBank, true);

			return $getListBank;
		}

		public function getDetails()
		{
			$params = array();
			$getDetails = $this->curlPost($this->host . "gateway/api/common-presentation-service/v1/bank-accounts/details?accountNumber=" . $this->debtorAccountNumber, $params);
			$getDetails = json_decode($getDetails, true);

			return $getDetails;
		}

		public function getHistories($toDate,$fromDate)
		{
			$params = array("toDate" => $toDate, "fromDate" => $fromDate, "currency" => "VND", "accountNo" => $this->debtorAccountNumber,"keyword" => "");
			$getHistories = $this->curlPost($this->host . "gateway/api/smart-search-presentation-service/v1/account-transactions/find", $params);

			$getHistories = json_decode($getHistories, true);

			return $getHistories;
		}

		public function getNameFromAccountnumber($creditorAccountNumber, $creditorBankId)
		{
			if ($creditorBankId == 970423 || $creditorBankId == "970423") {
				$params = array("creditorAccountNumber" => $creditorAccountNumber);
				$getNameFromAccountnumber = $this->curlPost($this->host . "gateway/api/fund-transfer-presentation-service/v1/creditor-info/internal", $params);
				$getNameFromAccountnumber = json_decode($getNameFromAccountnumber, true);

				return $getNameFromAccountnumber;
			}

			$params = array("creditorAccountNumber" => $creditorAccountNumber, "transferMethod" => "", "creditorBankId" => $creditorBankId, "debtorAccountNumber" => $this->debtorAccountNumber);
			$getNameFromAccountnumber = $this->curlPost($this->host . "gateway/api/fund-transfer-presentation-service/v2/creditor-info/external/account-number", $params);
			$getNameFromAccountnumber = json_decode($getNameFromAccountnumber, true);

			return $getNameFromAccountnumber;
		}

		public function createTranferOutTPBank($creditorAccountNumber, $creditorBankId, $messages, $creditorInfo)
		{
			$amount = 10000;

			if ($creditorBankId == 970423 || $creditorBankId == "970423") {
				$params = array(
					"creditorAccountNumber" => $creditorAccountNumber,
					"debtorAccountNumber" => $this->debtorAccountNumber,
					"remark" => $messages,
					"type" => 0,
					"paymentType" => "VN_INT_TRANS_ACC",
					"amount" => $amount,
					"currency" => $creditorInfo['currency'],
					"transferMode" => "SINGLE",
					"creditorName" => $creditorInfo['name']
				);
				$createTranferOutTPBank = $this->curlPost($this->host . "gateway/api/fund-transfer-presentation-service/v1/fund-transfer/account-number/verify", $params);
				$createTranferOutTPBank = json_decode($createTranferOutTPBank, true);

				return $createTranferOutTPBank;
			}

			$params = array(
				"creditorAccountNumber" => $creditorAccountNumber,
				"creditorBankId" => $creditorBankId,
				"debtorAccountNumber" => $this->debtorAccountNumber,
				"remark" => $messages,
				"type" => 1,
				"creditorBankNameEn" => $creditorInfo['extBankNameEn'],
				"paymentType" => "VN_INTBA_TRANS_ACC",
				"amount" => $amount,
				"currency" => $creditorInfo['currency'],
				"transferMode" => "SINGLE",
				"creditorBankNameVn" => $creditorInfo['extBankNameVn'],
				"creditorName" => $creditorInfo['name']
			);

			$createTranferOutTPBank = $this->curlPost($this->host . "gateway/api/fund-transfer-presentation-service/v2/fund-transfer/napas-account-number/verify", $params);
			$createTranferOutTPBank = json_decode($createTranferOutTPBank, true);

			return $createTranferOutTPBank;
		}

		public function confirmTranfer($id, $code)
		{
			$params = array(
				"transferMode" => "SINGLE",
				"saveTemplate" => false,
				"authCode" => $code,
				"id" => $id,
				"authMethod" => "ETOKEN"
			);
			$confirmTranfer = $this->curlPost($this->host . "gateway/api/fund-transfer-presentation-service/v2/fund-transfer/napas-account-number/confirm", $params);
			$confirmTranfer = json_decode($confirmTranfer, true);

			return $confirmTranfer;
		}


		public function randString($length)
		{
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$size = strlen($chars);
			$str = "";
			for ($i = 0; $i < $length; $i++) {
				$str .= $chars[rand(0, $size - 1)];
			}

			return $str;
		}

		public function get_microtime()
		{
			return floor(microtime(true) * 1000);
		}

		public function get_imei()
		{
			$time = md5($this->get_microtime());
			$text = substr($time, 0, 8) . "-";
			$text .= substr($time, 8, 4) . "-";
			$text .= substr($time, 12, 4) . "-";
			$text .= substr($time, 16, 4) . "-";
			$text .= substr($time, 17, 12);
			$text = strtoupper($text);

			return $text;
		}

		public function writeLog($file_name, $message)
		{
			$body = "\n";
			$body .= date("d/m/Y - H:i:s") . "\n";
			$body .= $message . "\n";
			$body .= '-----------------';
			$file = $file_name;
			$fp = fopen($file, 'a+');
			fwrite($fp, $body);
			fclose($fp);

			return true;
		}

		public function curlPost($url = null, $param = [])
		{
			$uA = "Hydrobank/10.10.81 (com.fpt.tpb.emobile; build:6; iOS 15.1.1) Alamofire/4.8.1";
			$header[] = "Content-Type: application/json";
			$header[] = "Connection: keep-alive";
			$header[] = "Accept-Language: vi-VN;q=1.0, en-VN;q=0.9";
			$header[] = "DEVICE_ID: " . $this->imei;
			$header[] = "APP_VERSION: " . $this->APP_VERSION;
			$header[] = "SOURCE_APP: " . $this->SOURCE_APP;
			$header[] = "PLATFORM_NAME: IOS";
			$header[] = "PLATFORM_VERSION: " . $this->PLATFORM_VERSION;
			$header[] = "DEVICE_NAME: " . $this->DEVICE_NAME;
			$header[] = "User-Agent: " . $uA;

			if ($this->token) {
				$header[] = "Authorization: Bearer " . trim($this->token);
			}
			if (!empty($url)) {
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 120);
				curl_setopt($ch, CURLOPT_USERAGENT, $uA);


				if (count($param) > 0) {
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($param));
				}

				if (curl_errno($ch)) {
					$res = "Lỗi: " . curl_error($ch);
				} else {
					$res = curl_exec($ch);
				}

				curl_close($ch);

				return $res;
			}
		}
	}
