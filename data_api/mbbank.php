<?php
	$captchaKey = "";
	
	$defaultHeader = [
		"Content-Type"        => "application/json; charset=UTF-8",
		"User-Agent"          => "MB%20Bank/2 CFNetwork/1331.0.3 Darwin/21.4.0",
		"Authorization"       => "Basic QURNSU46QURNSU4=",
	];
	
	$_timeout = 15;
	
	function requestPost($url, $data, $headers) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => $_timeout,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => $headers,
		));
		$response = json_decode(curl_exec($curl), true);
		curl_close($curl);
		return $response;
	}
	
	function solveCaptcha($captchaImage) {
		global $captchaKey;
		$curl = requestPost("https://api.tungduy.com/api/captcha/mb",
			[
				"base64" => $captchaImage,
				"apikey" => $captchaKey,
			],[ "Content-Type" => "application/json"]);
			
		return $curl->data;
	}
	
	function getCaptcha($imei) {
		global $defaultHeader, $captchaKey;
		$curl = requestPost("https://online.mbbank.com.vn/retail-web-internetbankingms/getCaptchaImage", [
			"sessionId" => "",
			"refNo"     => date("YmdHms"),
			"deviceIdCommon" => $imei,
		], $defaultHeader);
		
		$captchaImage = $curl->imageString;
		return solveCaptcha($captchaImage, $captchaKey);
	}
	
	function doLogin($username, $password, $imei) {
		global $defaultHeader, $captchaKey;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/internetbanking/doLogin", [
			"userId"          => $username,
			"password"        => $password,
			"refNo"           => ref_no($username),
			"deviceIdCommon"  => $imei,
			"captcha"         => getCaptcha($imei)
		], $defaultHeader);
		
		return $curl;
	}
	
	function getBalance($username, $session_id, $imei) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail-web-accountms/getBalance", [
			"sessionId"      => $session_id,
			"refNo"          => ref_no($username),
			"deviceIdCommon" => $imei,
		], $defaultHeader);
		
		return $curl;
	}
	
	function getList($username, $session_id, $imei) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/card/getList", [
			"sessionId"      => $session_id,
			"refNo"          => ref_no($username),
			"deviceIdCommon" => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function getHistory($username, $accountNo, $session_id, $imei, $days) {
		global $defaultHeader;
		
		$fromDate = date("d/m/Y", time() - 86400 * $days);
		$toDate   = date("d/m/Y");
		
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/common/getTransactionHistory", [
			"accountNo"      => $accountNo,
			"fromDate"       => $fromDate,
			"historyNumber"  => "",
			"historyType"    => "DATE_RANGE",
			"toDate"         => $toDate,
			"type"           => "ACCOUNT",
			"sessionId"      => $session_id,
			"refNo"          => ref_no($username),
			"deviceIdCommon" => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function getBankList($username, $session_id, $imei) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/common/getBankList", [
			"sessionId"      => $session_id,
			"refNo"          => ref_no($username),
			"deviceIdCommon" => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function createTransfer($username, $srcAccountNo, $session_id, $imei, $partnerBankId, $partnerAccountNumber, $partnerName, $amount, $message) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/transfer/verifyMakeTransfer", [
			"benBankCd" 	   => $partnerBankId,
			"benAccountNumber" => $partnerAccountNumber,
			"benAccountName"   => $partnerName,
			"destType"         => "ACCOUNT",
			"srcAccountNumber" => $srcAccountNo,
			"message"          => $message,
			"amount" 		   => $amount,
			"transferType"	   => $partnerBankId == "970422" ? "INHOUSE" : "FAST",
			"sessionId"        => $session_id,
			"refNo"            => ref_no($username),
			"deviceIdCommon"   => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function getAuthList($username, $session_id, $imei, $amount) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/internetbanking/getAuthList", [
			"amount" 		   => $amount,
			"serviceCode"      => "GCM_FTR_DOM_FAST",
			"sessionId"        => $session_id,
			"refNo"            => ref_no($username),
			"deviceIdCommon"   => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function sendSmsOtp($username, $session_id, $imei, $amount, $deviceId) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/internetbanking/generateSMSOTP", [
			"transType"        => "TRANSFER",
			"amount" 		   => $amount,
			"authSerialNumber" => $deviceId,
			"sessionId"        => $session_id,
			"refNo"            => ref_no($username),
			"deviceIdCommon"   => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function createTransferAuthen($username, $srcAccountNo, $session_id, $imei, $partnerBankId, $partnerAccountNumber, $partnerName, $amount, $cust_id) {
		global $defaultHeader;
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/vtap/createTransactionAuthen", [
			"transactionAuthen" => [
				"refNo"  => ref_no($username),
				"custId" => $cust_id,
				"sourceAccount" => $srcAccountNo,
				"destAccount"   => $partnerAccountNumber,
				"amount"        => $amount,
				"transactionType" => $partnerBankId == "970422" ? "GCM_FTR_IH_3RD" : "GCM_FTR_DOM_FAST",
				"destAccountName" => $partnerName,
			],
			"sessionId"         => $session_id,
			"refNo"             => ref_no($username),
			"deviceIdCommon"    => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function confirmTransfer($username, $srcAccountNo, $session_id, $imei, $partnerBankId, $partnerAccountNumber, $partnerName, $amount, $message, $otp = []) {
		global $defaultHeader;
		
		if ($otp['type'] == "soft") $otp = "ibr|".$otp['deviceID_OTP'] ."||" . $otp['otp'] ."||".time()."|" . $otp['authenID'] . "|" . $otp['refNoAuthen'];
        else $otp = "ibr|".$otp['deviceID_OTP'] ."|" . $otp['otp'];
		
		$curl = requestPost("https://online.mbbank.com.vn/retail_web/transfer/makeTransfer", [
			"benBankCd"        => $partnerBankId,
			"benAccountNumber" => $partnerAccountNumber,
			"benAccountName"   => $partnerName,
			"destType"         => "ACCOUNT",
			"srcAccountNumber" => $srcAccountNo,
			"message"          => $message,
			"amount"           => $amount,
			"transferType"     => $partnerBankId == "970422" ? "INHOUSE" : "FAST",
			"otp"              => $otp,
			"sessionId"        => $session_id,
			"refNo"            => ref_no($username),
			"deviceIdCommon"   => $imei,
		], $defaultHeader);
		return $curl;
	}
	
	function ref_no($username) {
        return $username . '-' . date('YmdHms');
    }
	
	function generateImei() {
		return generateRandomString(8) . '-' . generateRandomString(4) . '-' . generateRandomString(4) . '-' . generateRandomString(4) . '-' . generateRandomString(12);
	}
	
	function generateRandomString($length = 20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
	}