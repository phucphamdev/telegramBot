<?php
include 'k04momo.php';
require_once __DIR__ . "/vendor/autoload.php";
include 'config.php';

$rkey = rkey(32);
$get_imei = get_imei();
$onesignal = get_onesignal();
$get_secureid = secureid();
$isVoice = false;

$checkUser = checkUserBe(
	array(
		'username'   => $userInfo['phone'],
		'rkey'       => $rkey,
		'onesignal'  => $onesignal,
		'imei'       => $get_imei,
		'secureid'   => $get_secureid,
	)
);

$otp = getOtp(
	array(
		'username'   => $userInfo['phone'],
		'password'   => $userInfo['password'],
		'rkey'       => $rkey,
		'onesignal'  => $onesignal,
		'imei'       => $get_imei,
		'secureid'   => $get_secureid,
	)
);

//var_dump($otp);
//echo "------------------</br>";

do {
 $otp1 = file_get_contents("otp.txt");
} while(!$otp1);

if (!$otp1) {
	die();
}

//echo $otp1;
//echo "------------------</br>";

$cf = checkOtp(
	array(
		'username'   => $userInfo['phone'],
		'rkey'       => $rkey,
		'onesignal'  => $onesignal,
		'imei'       => $get_imei,
		'secureid'   => $get_secureid,
	), $otp1
);

if (!empty($cf['extra']['setupKey']) && !empty($cf['extra']['ohash'])) {
	$setupKey = fopen("setupKey.txt", "w");
	$oHash = fopen("ohash.txt", "w");

	fwrite($setupKey, $cf['extra']['setupKey']);
	fwrite($oHash, $cf['extra']['ohash']);

	fclose($setupKey);
	fclose($oHash);
}

//var_dump($cf);

$rkey1 = fopen("rkey.txt" , "w");
fwrite($rkey1,$rkey);
fclose($rkey1);

$onesignal1 = fopen("onesignal.txt" , "w");
fwrite($onesignal1,$onesignal);
fclose($onesignal1);

$imei = fopen("imei.txt" , "w");
fwrite($imei, $get_imei);
fclose($imei);

$secureid = fopen("secureid.txt" , "w");
fwrite($secureid, $get_secureid);
fclose($secureid);

$login = userLogin(
	array(
		'username'   => $userInfo['phone'],
		'password'   => $userInfo['password'],
		'rkey'       => $rkey,
		'onesignal'  => $onesignal,
		'ohash'  => file_get_contents('ohash.txt'),
		'otp'  => file_get_contents('otp.txt'),
		'setupkey'  => file_get_contents('setupKey.txt'),
		'imei'       => $get_imei,
		'secureid'   => $get_secureid,
	)
);

if (!empty($login['extra']['AUTH_TOKEN'])) {
	$requestKey = fopen("requestKey.txt", "w");
	$authToken = fopen("authToken.txt", "w");
	$sessionKey = fopen("sessionKey.txt", "w");

	fwrite($requestKey, trim(get_RSAencrypt($login['extra']['REQUEST_ENCRYPT_KEY'])));
	fwrite($authToken, trim($login['extra']['AUTH_TOKEN']));
	fwrite($sessionKey, trim($login['extra']['SESSION_KEY']));

	fclose($requestKey);
	fclose($authToken);
}

//echo "------------------</br>";
echo json_encode($login);