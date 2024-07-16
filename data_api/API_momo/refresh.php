<?php
include 'k04momo.php';
require_once __DIR__ . "/vendor/autoload.php";
include 'config.php';

$cooldown = file_get_contents('cooldown.txt');

if ($cooldown == null || $cooldown == '') {
  	$cooldownFile = fopen("cooldown.txt", "w");
  	fwrite($cooldownFile, 0);
  	$cooldown = 0;
}

if (time() - $cooldown >= 864) {
  	$login = userLogin(
        array(
            'username'   => $userInfo['phone'],
            'password'   => $userInfo['password'],
            'rkey'       => file_get_contents('rkey.txt'),
            'onesignal'  => file_get_contents('onesignal.txt'),
            'ohash'  => file_get_contents('ohash.txt'),
            'otp'  => file_get_contents('otp.txt'),
            'setupkey'  => file_get_contents('setupKey.txt'),
            'imei'       => file_get_contents('imei.txt'),
            'secureid'   => file_get_contents('secureid.txt'),
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
  	$cooldownFile = fopen("cooldown.txt", "w");
  	fwrite($cooldownFile, time());
  
  	echo json_encode([
      	"status" => 2,
      	"message" => "Refresh tài khoản thành công",
    ]);
} else echo json_encode([
    "status" => 0,
    "message" => "Refresh tài khoản không thành công, vui lòng chờ ".(864 - (time() - $cooldown))." giây nữa.",
]);