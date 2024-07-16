<?php
//
//namespace App\Helper;
//
//use App\Models\System;
//use Crypt_RSA;
//use Exception;
//use GuzzleHttp\Client;
//use Illuminate\Support\Carbon;
//use Illuminate\Support\Str;
//use TwoCaptcha\TwoCaptcha;
//
//class CronVCBHelper
//{
//	public string $defaultPublicKey = "-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAikqQrIzZJkUvHisjfu5ZCN+TLy//43CIc5hJE709TIK3HbcC9vuc2+PPEtI6peSUGqOnFoYOwl3i8rRdSaK17G2RZN01MIqRIJ/6ac9H4L11dtfQtR7KHqF7KD0fj6vU4kb5+0cwR3RumBvDeMlBOaYEpKwuEY9EGqy9bcb5EhNGbxxNfbUaogutVwG5C1eKYItzaYd6tao3gq7swNH7p6UdltrCpxSwFEvc7douE2sKrPDp807ZG2dFslKxxmR4WHDHWfH0OpzrB5KKWQNyzXxTBXelqrWZECLRypNq7P+1CyfgTSdQ35fdO7M1MniSBT1V33LdhXo73/9qD5e5VQIDAQAB\n-----END PUBLIC KEY-----";
//	public string $clientPublicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCeEk3hNBXhvUKOl62RX2lf9KE1SZ3SCWu5qOWZsCcIBvD6fpDRP1iuKCmK49lAfP3ntdNRFN8i8MMYnaokZu+Pux3dywIiNVVLVCXFr00UcTR45M6hdbnLct9cJ+XLJIoJQW2TGz9xINErTMnvlj4n2uIm6nDv2AbR6Ii9+kq+iQIDAQAB";
//	public string $clientPrivateKey = "-----BEGIN RSA PRIVATE KEY-----\r\nMIICWwIBAAKBgQCeEk3hNBXhvUKOl62RX2lf9KE1SZ3SCWu5qOWZsCcIBvD6fpDR\r\nP1iuKCmK49lAfP3ntdNRFN8i8MMYnaokZu+Pux3dywIiNVVLVCXFr00UcTR45M6h\r\ndbnLct9cJ+XLJIoJQW2TGz9xINErTMnvlj4n2uIm6nDv2AbR6Ii9+kq+iQIDAQAB\r\nAoGAC3igljtFa0Bk2BxByE74QrJqEIfrIBb27l5Ha0PRUU/PpR4SPF0wflMD0MSA\r\nO6HWez5Cu5ucJdj7D4pBkqq1r8dd7OV+Fmx1NuRhMvbS6ZCMC3SuG9NiW5lA74zF\r\nn6rTLm4pOk1t4mFBkI1SSLn/qnTeY+8XL99qu1awcMYFMAECQQDKXYswd57B5gLL\r\n3K2plIMbvESIdGxFS2Km8VJn1uC+akE7VMiVlb+zPlI0+09mn0WfVt5Kfp5rmP+4\r\nTav2B38JAkEAx/dtVURT8kUePxOEiSwqqVpG1pAB3aLIoQ4TWNzw1X/0vEPT2kS5\r\ncM5kBqUtMmYEpyboTYgDIIAwapdALNmjgQJAeTJA9EwP5qysrA+EanWpd+jvWpHv\r\nbijR8o3A/rOwchoM603Bu+StpNoEPfrs+NcWyXErPI5MrsA5FtZd0MF4kQJAXCcA\r\ncb0NWqbTq4nZGEYMWwNJhfPTiEpOXzpXXCplql5PcLtpVDs7omra2d0hGQq+tjFN\r\n+PznRAEPTu/pGUIrAQJAeUexJMRoPXmxPjSSwNw4C+Exsysek+eiCsxj8fNibN5J\r\n1SwVsv30sUMm+n96Tmv/syE8xlXitb8+LMKvAE7anQ==\r\n-----END RSA PRIVATE KEY-----\r\n";
//	public array $url = [
//		"getCaptcha" => "https://digiapp.vietcombank.com.vn/utility-service/v1/captcha/",
//		"login" => "https://digiapp.vietcombank.com.vn/authen-service/v1/login",
//		"getHistories" => "https://digiapp.vietcombank.com.vn/bank-service/v1/transaction-history",
//		"tranferOut" => "https://digiapp.vietcombank.com.vn/napas-service/v1/init-fast-transfer-via-accountno",
//		"genOtpOut" => "https://digiapp.vietcombank.com.vn/napas-service/v1/transfer-gen-otp",
//		"genOtpIn" => "https://digiapp.vietcombank.com.vn/transfer-service/v1/transfer-gen-otp",
//		"confirmTranferOut" => "https://digiapp.vietcombank.com.vn/napas-service/v1/transfer-confirm-otp",
//		"confirmTranferIn" => "https://digiapp.vietcombank.com.vn/transfer-service/v1/transfer-confirm-otp",
//		"tranferIn" => "https://digiapp.vietcombank.com.vn/transfer-service/v1/init-internal-transfer",
//		"getBanks" => "https://digiapp.vietcombank.com.vn/utility-service/v1/get-banks",
//		"getAccountDeltail" => "https://digiapp.vietcombank.com.vn/bank-service/v1/get-account-detail",
//		"getlistAccount" => "https://digiapp.vietcombank.com.vn/bank-service/v1/get-list-account-via-cif"
//	];
//	public int $captchaMode = 0;
//	public array $captchaApiKeys = [
//		"0063422cec412fac797d7d61d0ca9b1d"
//	];
//	public string $lang = 'vi';
//	public int $_timeout = 99999;
//	public string $DT = "Windows";
//	public string $OV = "10";
//	public string $PM = "Chrome 104.0.0.0";
//	public string $checkAcctPkg = "1";
//	public string $username = "";
//	public string $password = "";
//	public string $account_number = "";
//	public string $captchaToken;
//	public string $sessionId;
//	#account
//	public string $mobileId;
//	public string $clientId;
//	public string $cif;
//	public string $captchaKey;
//
//	public function setData($sessionId, $mobileId, $clientId, $cif)
//	{
//		$this->sessionId = $sessionId;
//		$this->mobileId = $mobileId;
//		$this->clientId = $clientId;
//		$this->cif = $cif;
//		return $this;
//	}
//
//	public   function curlPost($url = "", $data = array())
//	{
//		try {
//			$client = new Client(['http_errors' => false]);
//
//			$res = $client->request('POST', $url, [
//				'timeout' => $this->_timeout,
//				'headers' => $this->headerNull(),
//				'body' => json_encode($this->encryptData($data)),
//			]);
//
//			$result = json_decode($res->getBody()->getContents());
//
//			return $this->decryptData($result);
//		} catch (Exception) {
//			return false;
//		}
//	}
//
//	public function headerNull()
//	{
//		return array(
//			'Accept' => 'application/json',
//			'Accept-Encoding' => 'gzip, deflate, br',
//			'Accept-Language' => 'vi',
//			'Connection' => 'keep-alive',
//			'Content-Type' => 'application/json',
//			'Host' => 'digiapp.vietcombank.com.vn',
//			'Origin' => 'https://vcbdigibank.vietcombank.com.vn',
//			'Referer' => 'https://vcbdigibank.vietcombank.com.vn/',
//			'sec-ch-ua-mobile' => '?0',
//			'Sec-Fetch-Dest' => 'empty',
//			'Sec-Fetch-Mode' => 'cors',
//			'Sec-Fetch-Site' => 'same-site',
//			'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36',
//			'X-Channel' => 'Web',
//		);
//	}
//
//	public   function encryptData($str)
//	{
//		$str["clientPubKey"] = $this->clientPublicKey;
//		$key = Str::random(32);
//		$iv = Str::random(16);
//		$rsa = new  Crypt_RSA();
//		$rsa->loadKey($this->defaultPublicKey);
//		$rsa->setEncryptionMode(2);
//		$body = base64_encode($iv . openssl_encrypt(json_encode($str), 'AES-256-CTR', $key, OPENSSL_RAW_DATA, $iv));
//		$header = base64_encode($rsa->encrypt(base64_encode($key)));
//
//		return [
//			'd' => $body,
//			'k' => $header,
//		];
//	}
//
//	public function decryptData($cipher)
//	{
//		$header = $cipher->k;
//		$body = base64_decode($cipher->d);
//		$rsa = new  Crypt_RSA();
//		$rsa->loadKey($this->clientPrivateKey);
//		$rsa->setEncryptionMode(2);
//		$key = $rsa->decrypt(base64_decode($header));
//		$iv = substr($body, 0, 16);
//		$cipherText = substr($body, 16);
//		$text = openssl_decrypt($cipherText, 'AES-256-CTR', base64_decode($key), OPENSSL_RAW_DATA, $iv);
//		return json_decode($text);
//	}
//
//	public function getHistories($data)
//	{
//		$date = Carbon::now();
//
//		$toDate = $date->format('d/m/Y');
//		$fromDate = $date->subDays(30)->format('d/m/Y');
//
//		$this->captchaKey = $object->vcb_captchaKey ?? "0063422cec412fac797d7d61d0ca9b1d";
//		$this->_timeout = $data['_timeout'];
//		$this->username = $data['username'];
//		$this->password = $data['username'];
//		$this->account_number = $data['username'];
//		$this->sessionId = $data['username'] ?? Null;
//		$this->mobileId = $data['username'] ?? Null;
//		$this->clientId = $data['username'] ?? Null;
//		$this->cif = $data['username'] ?? Null;
//		$this->captchaApiKeys = [
//			"0063422cec412fac797d7d61d0ca9b1d"
//		];
//
//		if (isset($this->mobileId) && isset($this->clientId) && isset($this->sessionId) && isset($this->cif)) {
//			$param = array(
//				"DT" => $this->DT,
//				"OV" => $this->OV,
//				"PM" => $this->PM,
//				"accountNo" => $this->account_number,
//				"accountType" => "D",
//				"fromDate" => $fromDate,
//				"toDate" => $toDate,
//				"lang" => $this->lang,
//				"pageIndex" => 0,
//				"lengthInPage" => 999999,
//				"stmtDate" => "",
//				"stmtType" => "",
//				"mid" => 14,
//				"cif" => $data['cif'],
//				"user" => $data['username'],
//				"mobileId" => $data['mobileId'],
//				"clientId" => $data['clientId'],
//				"sessionId" => $data['sessionId'],
//			);
//
//			return $this->curlPost($this->url['getHistories'], $param);
//
//		}
//
//		return [];
//	}
//
//	public function doLogin()
//	{
//		$solveCaptcha = $this->solveCaptcha();
//
//		$param = array(
//			"DT" => $this->DT,
//			"OV" => $this->OV,
//			"PM" => $this->PM,
//			"captchaToken" => $solveCaptcha['key'],
//			"captchaValue" => $solveCaptcha['captcha'],
//			"checkAcctPkg" => $this->checkAcctPkg,
//			"lang" => $this->lang,
//			"mid" => 6,
//			"password" => $this->password,
//			"user" => $this->username
//		);
//
//		$result = $this->curlPost($this->url['login'], $param);
//
//		if (isset($result->code) && $result->code == 00) {
//			$this->sessionId = $result->sessionId;
//			$this->mobileId = $result->userInfo->mobileId;
//			$this->clientId = $result->userInfo->clientId;
//			$this->cif = $result->userInfo->cif;
//
//			$data = [
//				'vcb_sessionId' => $this->sessionId,
//				'vcb_mobileId' => $this->mobileId,
//				'vcb_clientId' => $this->clientId,
//				'vcb_cif' => $this->cif
//			];
//
//			$object = System::where('id', 999)->first();
//			if ($object) {
//				$object->update($data);
//				$object->save();
//			}
//
//			return array(
//				'success' => true,
//				'message' => "success",
//				'data' => $result ?: ""
//			);
//
//		} else {
//			return array(
//				'success' => false,
//				'message' => $result->des,
//				"param" => $param,
//				'data' => $result ?: ""
//			);
//		}
//	}
//
//	public function solveCaptcha()
//	{
//		$getCaptcha = $this->getCaptcha();
//		$solver = new TwoCaptcha($this->captchaApiKeys[$this->captchaMode]);
//		$curl = $solver->normal(['base64' => $getCaptcha, 'numeric' => 1]);
//
//		$this->captchaValue = $curl->code;
//
//		return ["status" => true, "key" => $this->captchaToken, "captcha" => $this->captchaValue];
//	}
//
//	public function getCaptcha()
//	{
//		$this->captchaToken = Str::random(30);
//		$url = "https://digiapp.vietcombank.com.vn/utility-service/v1/captcha/" . $this->captchaToken;
//		$client = new Client(['http_errors' => false]);
//
//		$res = $client->request('GET', $url, [
//			'timeout' => $this->_timeout,
//			'headers' => array(
//				'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'
//			),
//		]);
//
//		$result = $res->getBody()->getContents();
//
//		return base64_encode($result);
//	}
//
//	//	public function getlistAccount()
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"mid" => 8,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		return $this->curlPost($this->url['getlistAccount'], $param);
//	//
//	//	}
//
//	//	public function createTranferInVietCombank($account_number, $amount, $message)
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"lang" => $this->lang,
//	//			"debitAccountNo" => $this->account_number,
//	//			"creditAccountNo" => $account_number,
//	//			"amount" => $amount,
//	//			"activeTouch" => 0,
//	//			"feeType" => 1,
//	//			"content" => $message,
//	//			"ccyType" => "",
//	//			"mid" => 16,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		return  $this->curlPost($this->url['tranferIn'], $param);
//	//
//	//	}
//	//
//	//	public function genOtpTranFer($tranId, $type = "OUT")
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"lang" => $this->lang,
//	//			"tranId" => $tranId,
//	//			"type" => 5, // 1 là SMS,5 là smart otp
//	//			"mid" => 17,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		if ($type == "IN") {
//	//			$result = $this->curlPost($this->url['genOtpIn'], $param);
//	//		} else {
//	//			$result = $this->curlPost($this->url['genOtpOut'], $param);
//	//		}
//	//
//	//		return $result;
//	//	}
//	//
//	//	public function confirmTranfer($tranId, $challenge, $otp, $type = "OUT")
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"lang" => $this->lang,
//	//			"tranId" => $tranId,
//	//			"otp" => $otp,
//	//			"challenge" => $challenge,
//	//			"mid" => 18,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		if ($type == "IN") {
//	//			$result = $this->curlPost($this->url['confirmTranferIn'], $param);
//	//		} else {
//	//			$result = $this->curlPost($this->url['confirmTranferOut'], $param);
//	//		}
//	//
//	//		return $result;
//	//	}
//	//	public function getAccountDeltail()
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"accountNo" => $this->account_number,
//	//			"accountType" => "D",
//	//			"mid" => 13,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		return $this->curlPost($this->url['getAccountDeltail'], $param);
//	//
//	//	}
//	//	public function getBanks()
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"lang" => $this->lang,
//	//			"fastTransfer" => "1",
//	//			"mid" => 23,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		return $this->curlPost($this->url['getBanks'], $param);
//	//	}
//	//
//	//	public function createTranferOutVietCombank($bankCode, $account_number, $amount, $message)
//	//	{
//	//		$param = array(
//	//			"DT" => $this->DT,
//	//			"OV" => $this->OV,
//	//			"PM" => $this->PM,
//	//			"lang" => $this->lang,
//	//			"debitAccountNo" => $this->account_number,
//	//			"creditAccountNo" => $account_number,
//	//			"creditBankCode" => $bankCode,
//	//			"amount" => $amount,
//	//			"feeType" => 1,
//	//			"content" => $message,
//	//			"ccyType" => "1",
//	//			"mid" => 62,
//	//			"cif" => $this->cif,
//	//			"user" => $this->username,
//	//			"mobileId" => $this->mobileId,
//	//			"clientId" => $this->clientId,
//	//			"sessionId" => $this->sessionId
//	//		);
//	//
//	//		return $this->curlPost($this->url['tranferOut'], $param);
//	//	}
//}
