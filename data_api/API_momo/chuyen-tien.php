<?php
include 'k04momo.php';
require_once __DIR__ . "/vendor/autoload.php";
include 'config.php';
$transfer = createTransfer(
	array(
		'username'   => $userInfo['phone'],
		'ohash'      => file_get_contents('ohash.txt'),
		'setupkey'   => file_get_contents('setupKey.txt'),
		'requestkey' => file_get_contents('requestKey.txt'),
		'auth_token' => file_get_contents('authToken.txt'),
	), $_GET['phone'], $_GET['amount'], $_GET['comment']
);

if (isset($transfer['result']) && $transfer['result'] == true) {
    $id = $transfer['momoMsg']['replyMsgs']['0']['id'];
    
    if (!empty($id)) {
        $password = $_GET['password'];
        if($userInfo['password'] == $password)
        {
            $code = $_GET['2fa'];
            $checkfa = file_get_contents("https://bothax.com/public/ajax/2fa.php?key=WWFPBGQMNPMHNMFZYSSNBSJQYACGRPHKYGJ");
            if($code == $checkfa)
            {
                $confirm = confirmTransfer(
                    array(
                        'username' => $userInfo['phone'],
                        'password' => $userInfo['password'],
                        'requestkey' => file_get_contents('requestKey.txt'),
                        'auth_token' => file_get_contents('authToken.txt'),
                        'ohash' => file_get_contents('ohash.txt'),
                        'setupkey' => file_get_contents('setupKey.txt'),
                    ), $id
                );
                $json = array("status" => 200, "data" => $confirm);
                echo json_encode($json);
        //echo json_encode($confirm, JSON_UNESCAPED_UNICODE);
            }
            else
        {
            $json = array("status" => 404, "data" => "2FA ERROR");
            echo json_encode($json);
        }
        }
        else
        {
            $json = array("status" => 404, "data" => "password Error");
            echo json_encode($json);
        }
    } else {
        echo json_encode($transfer, JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode($transfer, JSON_UNESCAPED_UNICODE);
}