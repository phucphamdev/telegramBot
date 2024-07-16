<?php

namespace App\Bank;

use GuzzleHttp\Client;

class VpBank
{
    protected $_timeout = 20;
    protected $username;
    protected $password;
    protected $account_number;
    protected $client;
    public function __construct($username,$password,$account_number)
    {
        $this->username = $username;
        $this->password = $password;
        $this->account_number = $account_number;
        $this->client = new Client(['http_errors' => false,'cookies' => true]);
    }
    public function getCaptcha(){
        $data = array(
            "Id" => "",
            "UserName" => $this->username,
            "AppType" => "Consumers",
            "ChannelType" => "Web",
            "Password" => "CaptchaValue",
            "UserLocale" => ["Country"=>"VN","Language"=>"vi"]
        );

        $res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/ns/authenticationservice/SecureUsers?action=init", [
            'timeout' => $this->_timeout,
            'headers' => [
                "Accept" => "application/json",
                "Accept-Language" => "vi",
                "Content-Type" => "application/json",
                "DataServiceVersion" => "2.0",
                "MaxDataServiceVersion" => "2.0",
                "Captcha" => "dsa",
                "X-Security-Request" => "required"
            ],
            'body' => json_encode($data)
        ]);
        $result = json_decode($res->getBody());
        $getCaptcha = $result->error->message->value;
        $getCaptcha = json_decode($getCaptcha);
        $captcha = $getCaptcha->errorDetails[1]->Desc;
        return $captcha;
    }
    public function solveCaptcha(){
        $captcha = $this->getCaptcha();
        //dd($captcha);
        $solver = new \TwoCaptcha\TwoCaptcha('5b7a04166a639822cef4e763a3a7f048');
        //$balance = $solver->balance();
        $result = $solver->normal(["base64" => $captcha]);
        //$result = json_decode($result);
        $code = $result->code;
        return $code;
    }
    public function doLogin(){
        $data = array(
            "Id" => "",
            "UserName" => $this->username,
            "AppType" => "Consumers",
            "ChannelType" => "Web",
            "Password" => $this->password,
            "UserLocale" => ["Country"=>"VN","Language"=>"vi"]
        );

        $res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/ns/authenticationservice/SecureUsers?action=init", [
            'timeout' => $this->_timeout,
            'headers' => [
                "Accept" => "application/json",
                "Accept-Language" => "vi",
                "Content-Type" => "application/json",
                "DataServiceVersion" => "2.0",
                "MaxDataServiceVersion" => "2.0",
                "Captcha" => $this->solveCaptcha(),
                "X-Security-Request" => "required"
            ],
            'body' => json_encode($data)
        ]);
        foreach ($res->getHeaders() as $name => $values) {
            if($name == "TokenKey"){
                $tokenKey = $values;
            }
            if($name == "x-csrf-token"){
                $x_crsf = $values;
            }
        }
        $result = json_decode($res->getBody());
        dd($result);

        if(isset($result->error)){
            return $res->getBody();
        }
        return json_encode(["status" => true,"data" => ["tokenKey" => $tokenKey[0],"x_crsf" => $x_crsf[0]]]);
    }
    public function storeOtp($tokenKey,$x_crsf,$otp){
        $data = [
            'MultifactorInfo' => [[
                "__metadata" => [
                    "id" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/authenticationservice/MultifactorInfos('$tokenKey')",
                    "uri" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/authenticationservice/MultifactorInfos('$tokenKey')",
                    "type"=>"com.sap.banking.authentication.endpoint.v1_0.beans.MultifactorInfo"
                ],
                "Challenge" => null,
                "Id" => $tokenKey,
                "Response" => $otp,
                "Type" => 5
            ]],
        ];
        $h = [
            "Accept" => "application/json",
            "Accept-Language" => "vi",
            "Expires"=>"-1",
            "Content-Type" => "application/json",
            "channelType"=> "Web",
            "DataServiceVersion" => "2.0",
            "MaxDataServiceVersion" => "2.0",
            "X-Security-Request" => "required"
        ];
        $h['TokenKey'] = $tokenKey;
        $h['x-csrf-token'] = $x_crsf;
        $res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/authenticationservice/SecureUsers?action=authenticateMFA", [
            'timeout' => $this->_timeout,
            'headers' => $h,
            'body' => json_encode($data)
        ]);
        $result = json_decode($res->getBody());
        if(isset($result->error)){
            return $res->getBody();
        }
        $this->CookieUserIdentifys($tokenKey,$x_crsf);
        return json_encode(["status" => true,"data" => $result]);
    }
    public function Accounts($tokenKey,$x_crsf){
        $h = [
            "Accept" => "application/json",
            "Accept-Language" => "vi",
            "Expires"=>"-1",
            "Content-Type" => "application/json",
            "channelType"=> "Web",
            "DataServiceVersion" => "2.0",
            "MaxDataServiceVersion" => "2.0",
            "X-Security-Request" => "required"
        ];
        $h['TokenKey'] = $tokenKey;
        $h['x-csrf-token'] = $x_crsf;
        $res = $this->client->request("GET", 'https://neo.vpbank.com.vn/cb/odata/services/accountservice/Accounts?$top=500', [
            'timeout' => $this->_timeout,
            'headers' => $h,
        ]);
        $result = json_decode($res->getBody());
        if(isset($result->error)){
            return $res->getBody();
        }
        $r = $result->d->results[0];
        return json_encode(["status" => true,"data" => ["accountID" => $r->Id,"balance" => $r->CurrentBalance]]);
    }
    public function CookieUserIdentifys($tokenKey,$x_crsf){

        $h = [
            "Accept" => "application/json",
            "Accept-Language" => "vi",
            "Expires"=>"-1",
            "Content-Type" => "application/json",
            "channelType"=> "Web",
            "DataServiceVersion" => "2.0",
            "MaxDataServiceVersion" => "2.0",
            "X-Security-Request" => "required"
        ];
        $h['TokenKey'] = $tokenKey;
        $h['x-csrf-token'] = $x_crsf;
        $data = ['Id' => null,"OtpType" => null];
        $res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/retailuserservice/CookieUserIdentifys?action=init", [
            'timeout' => $this->_timeout,
            'headers' => $h,
            'body' => json_encode($data)
        ]);
        $result = json_decode($res->getBody());
        $id = $result->d->Id;
        $data = array(
            "OtpType"=>"1",
            "InforPC" => "Windows 10__ANGLE (AMD, AMD Radeon RX 6600 Direct3D11 vs_5_0 ps_5_0, D3D11)__Chrome",
            "Status" => 0,
            "Error_Message"=>null,
            "Id" => $id,
            '__metadata' => [
                "id" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
                "uri" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
                "type" => "com.sap.banking.custom.user.endpoint.v1_0.beans.CookieUserIdentify"
            ],
        );
        $res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/retailuserservice/CookieUserIdentifys?action=verify", [
            'timeout' => $this->_timeout,
            'headers' => $h,
            'body' => json_encode($data)
        ]);
        $data = array(
            "OtpType"=>"1",
            "InforPC" => "Windows 10__ANGLE (AMD, AMD Radeon RX 6600 Direct3D11 vs_5_0 ps_5_0, D3D11)__Chrome",
            "Status" => 0,
            "Error_Message"=>null,
            "Id" => $id,
            '__metadata' => [
                "id" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
                "uri" => "http://ocbplatformvipdcnew.vpbank.com.vn:80/cb/odata/services/retailuserservice/CookieUserIdentifys('$id')",
                "type" => "com.sap.banking.custom.user.endpoint.v1_0.beans.CookieUserIdentify"
            ],
        );
        $res = $this->client->request("POST", "https://neo.vpbank.com.vn/cb/odata/services/retailuserservice/CookieUserIdentifys?action=confirm", [
            'timeout' => $this->_timeout,
            'headers' => $h,
            'body' => json_encode($data)
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
    public function getHistories($tokenKey,$x_crsf,$accountID){
        $h = [
            "Accept" => "multipart/mixed",
            "Accept-Language" => "vi",
            "Content-Type" => "multipart/mixed;boundary=batch_a6f1-ccd6-a369",
            "DataServiceVersion" => "2.0",
            "Expires" => "-1",
            "MaxDataServiceVersion" => "2.0",
            "Pragma" => "no-cache",
            "Sec-Fetch-Dest" => "empty",
            "Sec-Fetch-Mode" => "cors",
            "Sec-Fetch-Site" => "same-origin",
            "X-Security-Request" => "required",
            "channelType" => "Web",
            "sap-cancel-on-close" => "true",
            "sap-contextid-accept" => "header",
        ];
        $h['TokenKey'] = $tokenKey;
        $h['x-csrf-token'] = $x_crsf;
        $data = "--batch_a6f1-ccd6-a369
Content-Type: application/http
Content-Transfer-Encoding: binary

GET DepositAccounts('$accountID')?".'$expand=DepositAccountTransactions&fromDate=26%2F05%2F2022&toDate=02%2F06%2F2022 HTTP/1.1
sap-cancel-on-close: true
channelType: Web
TokenKey: '.$tokenKey.'
Pragma: no-cache
Expires: -1
Cache-Control: no-cache,no-store,must-revalidate
sap-contextid-accept: header
Accept: application/json
x-csrf-token: '.$x_crsf.'
Accept-Language: vi
DataServiceVersion: 2.0
MaxDataServiceVersion: 2.0


--batch_a6f1-ccd6-a369--';
        $res = $this->client->request('POST', 'https://neo.vpbank.com.vn/cb/odata/services/accountservice/$batch', [
            'timeout' => $this->_timeout,
            'headers' => $h,
            'body' => $data,
        ]);
        return $res->getBody();
    }

}
