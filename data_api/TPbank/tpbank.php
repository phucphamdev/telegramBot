<?php
	include "class.tpbank.php";
	$auto = new autoTPBank();
	$auto->setData("E1B02D89-5E57-48F9-99E4-C910C377H326", "Junoo Pro Vip");
	$login = $auto->doLogin("tên đăng nhập", "mk");
	$debtorAccountNumber = "stk";
	$act = $_GET['act'] ?: "";
	$tranferTo = $tranferTo;
	$bankCode = 970423;
	$tranferAmount = 10000;
	$tranferMessage = "Junoo";
	$r = array();
	if (array_key_exists("access_token", $login)) {
		$access_token = $login['access_token'];
		$auto->setToken($access_token, $debtorAccountNumber);
		if ($act == "getInfo") {
			$info = $auto->getInfo();
			var_dump($info);
		} else if ($act == "getNameFromAccountnumber") {
			$name = $auto->getNameFromAccountnumber($tranferTo, "970423");
			if (array_key_exists("creditorInfo", $name)) {
				$r["status"] = true;
				$r["message"] = "Thành công.";
				$r["data"] = $name['creditorInfo'];
				die(json_encode($r));
			} else {
				$r["status"] = false;
				$r["error_code"] = 1;
				$r["message"] = $name['errorMessage']['messages']['vn'];
				die(json_encode($r));
			}
		} else if ($act == "createTranferOutTPBank") {
			$name = $auto->getNameFromAccountnumber($tranferTo, $bankCode);
			if (array_key_exists("creditorInfo", $name)) {
				$tranfer = $auto->createTranferOutTPBank($tranferTo, $bankCode, $tranferAmount, $tranferMessage, $name['creditorInfo']);
				if (array_key_exists("id", $tranfer) && array_key_exists("authMethod", $tranfer)) {
					$r["status"] = true;
					$r["message"] = "Thành công.";
					$r["data"] = $tranfer;
					die(json_encode($r));
				} else {
					$r["status"] = false;
					$r["error_code"] = 2;
					$r["message"] = $tranfer['errorMessage']['messages']['vn'];
					die(json_encode($r));
					
				}
			} else {
				$r["status"] = false;
				$r["error_code"] = 1;
				$r["message"] = $name['errorMessage']['messages']['vn'];
				die(json_encode($r));
			}
		} else if ($act == "confirmTranferOutTPBank") {
			$tranfer = $auto->confirmTranfer("id lấy ở bước tạo", "otp lấy từ file");
			if (array_key_exists("id", $tranfer)) {
				$r["status"] = true;
				$r["message"] = "Thành công.";
				$r["data"] = $tranfer;
				die(json_encode($r));
			} else {
				$r["status"] = false;
				$r["error_code"] = 2;
				$r["message"] = $tranfer['errorMessage']['messages']['vn'];
				die(json_encode($r));
			}
		} else if ($act == "getListBank") {
			$lists = $auto->getListBank();
			if (array_key_exists("banksnapas", $lists)) {
				$tpb = array("en_name" => "Junoo Pro Vip", "vn_name" => "NGAN HANG TMCP TIEN PHONG (TPBANK)", "bankId" => "970423", "napasSupported" => true);
				$lists['banksnapas'][] = $tpb;
				$r["status"] = true;
				$r["message"] = "Thành công.";
				$r["data"] = $lists['banksnapas'];
				die(json_encode($r));
			} else {
				$r["status"] = false;
				$r["error_code"] = 3;
				$r["message"] = $lists['errorMessage']['messages']['vn'];
				die(json_encode($r));
			}
		}
	} else {
		$r["status"] = false;
		$r["error_code"] = 0;
		$r["message"] = $login['error']['error_message'];
		if ($login['error']['require_captcha']) {
			$r['require_captcha'] = true;
		}
		if ($login['error']['require_update_pass']) {
			$r['require_update_pass'] = true;
		}
		
		die(json_encode($r));
	}
