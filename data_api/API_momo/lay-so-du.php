<?php
include 'k04momo.php';
require_once __DIR__ . "/vendor/autoload.php";
include 'config.php';

$balance = getBalance(
	array(
		'username'   => $userInfo['phone'],
		'password'   => $userInfo['password'],
		'rkey'       => file_get_contents('rkey.txt'),
		'onesignal'  => file_get_contents('onesignal.txt'),
		'ohash'      => file_get_contents('ohash.txt'),
		'setupkey'   => file_get_contents('setupKey.txt'),
		'imei'       => file_get_contents('imei.txt'),
		'requestkey' => file_get_contents('requestKey.txt'),
		'auth_token' => file_get_contents('authToken.txt'),
	), 12
);
$json = array("status" => 200, "Sodu" => $balance);
echo json_encode($json);