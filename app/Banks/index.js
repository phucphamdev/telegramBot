const fetch = require("node-fetch");
const md5 = require("md5");
const rtrim = require('rtrim');
const crypto = require("crypto");

const config = {
	"appConfig": {
		"appVer": "5.2.5",
		"product": "VIETTELPAY"
	},
	"osConfig": {
		"osVer": "7.1.2",
		"type": "android"
	}
};

const serv = {
	"VALIDATE_ACCOUNT": "https://api8.viettelpay.vn/customer/v1/validate/account",
	"LOGIN_INFOR": "https://api8.viettelpay.vn/customer/v1/accounts/login-infor",
	"AUTH_LOGIN": "https://api8.viettelpay.vn/auth/v1/authn/login",
	"AUTH_REFRESH": "https://api8.viettelpay.vn/auth/v1/authn/refresh",
	"ACCOUNT_INFOR": "https://api8.viettelpay.vn/customer/v1/accounts?sources=1&recommendations=1&home-version=2.0&post-check=1",
	"BANKPLUS": "https://bankplus.vn/MobileAppService2/ServiceAPI"
}

const curl = async (url, typeResult = "JSON", typeRequest = "GET", params = null, headers = null, proxy = null) => {
	var createFetch = await fetch(url, {
		agent: proxy,
		method: typeRequest,
		body: params,
		headers: headers
	});
	
	if (typeResult == "JSON") return await createFetch.json();
	return await createFetch.text();
}

const wait = async (s) => {
	return await new Promise(r => setInterval(r, s*1000));
}

const now = () => {
	var date = new Date();

    return {
    	"d": String(date.getDate()).padStart(2, '0'),
    	"m": String(date.getMonth() + 1).padStart(2, '0'),
    	"y": date.getFullYear(),
    	"H": String(date.getHours()).padStart(2, '0'),
    	"i": String(date.getMinutes()).padStart(2, '0'),
    	"s": String(date.getSeconds()).padStart(2, '0')
    }
}

const getTime = () => {
    var date = new Date();

    var dd = String(date.getDate()).padStart(2, '0');
    var mm = String(date.getMonth() + 1).padStart(2, '0');
    var yyyy = date.getFullYear();

    var hours = String(date.getHours()).padStart(2, '0');
    var minutes = String(date.getMinutes()).padStart(2, '0');
    var seconds = String(date.getSeconds()).padStart(2, '0');

    return hours + ':' + minutes + ':' + seconds + '][' + mm + '/' + dd + '/' + yyyy;
}

const str_split = (string, splitLength) => {
	if (splitLength === null) {
    	splitLength = 1
  	}
  	if (string === null || splitLength < 1) {
    	return false
  	}
  	string += ''
  	const chunks = []
  	let pos = 0
  	const len = string.length
  	while (pos < len) {
    	chunks.push(string.slice(pos, pos += splitLength))
  	}
  	return chunks
}

const getImei = () => {
	return "VTP_" + md5(now()).toUpperCase();
}

const xRequestId = () => {
	var t = now();
    return t.y + t.m + t.d + t.H + t.i + t.s;
}
//
// const buildQuery = (arr) => {
// 	var str = "";
//     for (var key in arr) {
//         str += key + "=" + arr[key] + "&";
//     }
//     str = rtrim(str, '&');
//     return str;
// }
//
// const XmlEncrypt = (cmd, data, singature) => {
// 	var xmlheader = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<SOAP-ENV:Envelope xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ba=\"http://bankplus.vn\"><SOAP-ENV:Header/> \r\n<SOAP-ENV:Body>\r\n<ba:gwOperator><cmd>";
//     xmlheader += cmd + "</cmd>";
//     xmlheader += "<encrypted>" + data + "</encrypted>";
//     xmlheader += "<signature>" + singature + "</signature>";
//     xmlheader += "</ba:gwOperator>";
//     xmlheader += "\r\n";
//     xmlheader += "</SOAP-ENV:Body>";
//     xmlheader += "\r\n";
//     xmlheader += "</SOAP-ENV:Envelope>";
//     return xmlheader;
// }
//
// const encrypt = (str = '', key) => {
//     var arr = str_split(str, 86);
//     var ret = "";
//     for (var item in arr){
//     	var hashed = crypto.publicEncrypt({"key": key, "padding": crypto.constants.RSA_PKCS1_PADDING}, item);
//         if (hashed) {
//             ret += hashed.split("").reverse().join("").toString("base64");
//         }
//     }
//     return $return;
// }
//
// const RSAKeys = (keys, type = 1) => {
//     if(type == 1) {
//         return "-----BEGIN PUBLIC KEY-----\n" . keys ."\n-----END PUBLIC KEY-----";
//     } else {
//         return "-----BEGIN PRIVATE KEY-----\n" . keys ."\n-----END PRIVATE KEY-----";
//     }
// }
//
// const decrypt = (encrypted_data, key) => {
//     var array_split = str_split(encrypted_data, 344);
//     var ret      = "";
//
//     for (item in array_split) {
//     	if (crypto.privateDecrypt(key))
//         if(openssl_private_decrypt(strrev(base64_decode($item)), $decrypted_data, $this->RSAKeys($this->config['client_private_key'], 2) ,OPENSSL_PKCS1_PADDING)){
//
//             $return .= $decrypted_data;
//         }
//     }
//
//     return $this->http_decode($return);
// }
//
// const Xmldecrypt = (xml_encrypted) => {
//     var ret  = [];
//     var exp = xml_encrypted.toString().split('&amp');
//     for (var item in exp){
//         if (item.includes('encrypted')) {
//             var encrypted_data = item.split('encrypted=')[1];
//         }
//     }
//
//     return $this->decrypt($encrypted_data);
// }

const getRandomInt = (min, max) => {
  	return Math.floor(Math.random() * (max - min + 1) + min)
}

const randomText = (len) => {
	var hash = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var chr = "";
	for (var i = 0; i < len; i++) {
		chr += hash[getRandomInt(0, hash.length - 1)];
	}
	return chr;
}

const getNotifyToken = () => {
	return randomText(22) + ":" + randomText(140);
}

const telno = (text) => {
	return text.toString()[0] == "0" ? text.toString().substring(1): text.toString();
}

const VALIDATE_ACCOUNT = async (phone, imei) => {
	var params = JSON.stringify({
		"type": "msisdn",
		"username": "84" + telno(phone)
	});

	return await curl(serv.VALIDATE_ACCOUNT, "JSON", "POST", params,
		{
			"app-version": config.appConfig.appVer,
			"authority-party": "APP",
			"channel": "APP",
			"content-length": params.length,
			"content-type": "application/json; charset=UTF-8",
			"imei": imei,
			"os-version": config.osConfig.osVer,
			"product": "VIETTELPAY",
			"type-os": config.osConfig.type,
			"user-agent": "okhttp/4.10.0",
			"x-request-id": xRequestId()
		}
	);
}

const LOGIN_INFOR = async (phone, imei) => {
	return await curl(serv.LOGIN_INFOR, "JSON", "GET", null,
		{
			"app-version": config.appConfig.appVer,
			"authority-party": "APP",
			"channel": "APP",
			"content-type": "application/json; charset=UTF-8",
			"imei": imei,
			"msisdn": "84" + telno(phone),
			"os-version": config.osConfig.osVer,
			"product": "VIETTELPAY",
			"type-os": config.osConfig.type,
			"user-agent": "okhttp/4.10.0",
			"x-request-id": xRequestId()
		}
	);
}

const AUTH_LOGIN = async (phone, password, imei, notiToken, otp = "", requestId = "") => {
	var params = JSON.stringify({
		"imei": imei,
		"loginType": "BASIC",
		"msisdn": "84" + telno(phone),
		"notifyToken": notiToken,
		"otp": otp,
		"pin": password,
		"requestId": requestId,
		"typeOs": config.osConfig.type,
		"userType": "msisdn",
		"username": "84" + telno(phone)
	});

	return await curl(serv.AUTH_LOGIN, "JSON", "POST", params,
		{
			"app-version": config.appConfig.appVer,
			"authority-party": "APP",
			"channel": "APP",
			"content-length": params.length,
			"content-type": "application/json; charset=UTF-8",
			"imei": imei,
			"os-version": config.osConfig.osVer,
			"product": "VIETTELPAY",
			"type-os": config.osConfig.type,
			"user-agent": "okhttp/4.10.0",
			"x-request-id": xRequestId()
		}
	);
}

const AUTH_REFRESH = async (imei, accessToken, refreshToken) => {
	var params = JSON.stringify({
		"refreshToken": refreshToken
	});

	return await curl(serv.AUTH_REFRESH, "JSON", "POST", params,
		{
			"app-version": config.appConfig.appVer,
			"authority-party": "APP",
			"channel": "APP",
			"content-length": params.length,
			"content-type": "application/json; charset=UTF-8",
			"imei": imei,
			"os-version": config.osConfig.osVer,
			"product": "VIETTELPAY",
			"type-os": config.osConfig.type,
			"user-agent": "okhttp/4.10.0",
			"authorization": "Bearer " + accessToken,
			"x-request-id": xRequestId()
		}
	);
}

const ACCOUNT_INFOR = async (imei, accessToken) => {
	return await curl(serv.ACCOUNT_INFOR, "JSON", "GET", null,
		{
			"app-version": config.appConfig.appVer,
			"authority-party": "APP",
			"channel": "APP",
			"content-type": "application/json; charset=UTF-8",
			"imei": imei,
			"os-version": config.osConfig.osVer,
			"product": "VIETTELPAY",
			"type-os": config.osConfig.type,
			"user-agent": "okhttp/4.10.0",
			"authorization": "Bearer " + accessToken,
			"x-request-id": xRequestId()
		}
	);
}

const SETUP_SOFTWARE = async (imei, notiToken) => {
	var params = JSON.stringify({
		"app_version": config.appConfig.appVer,
		"order_id": xRequestId(),
		"imei": imei,
		"os_version": config.osConfig.osVer,
		"type_os": config.osConfig.type,
		"token_notification": notiToken,
		"app_name": "VIETTELPAY"
	});

	return await curl(serv.BANKPLUS, "TEXT", "POST", params,
		{
			"user-agent": "Dalvik/2.1.0 (Linux; U; Android 7.1.2; SM-G988N Build/NRD90M) client: 5.2.5",
			"soapaction": "gwOperator",
			"content-length": params.length,
			"content-type": "text/xml; charset=utf-8"
		}
	);
}

(async () => {
	var imei = "VTP_143E78421A9F331EA234611290FC1EE3";
	var token = "dIbzw8aGRYinajUTeiq4gt:APA91bFXmHgiQrPmEsWM9yX2JPm5nJx3CgHf1DbaGuCKIr3AHYJVcz9eg2a5dtyetvCUVAQzyQ8zzEhYVe0k4ebTnwu7JmPkq1Jdc7ExzzC21wyBL2mZ35zvsXqPmkFmR9prnSMF6Xsw";
	var accessToken = "eyJhbGciOiJSUzI1NiJ9.eyJzdWIiOiIwMUZBMEU3OFgzQkZGTk44MTZaSjROOEtXUSIsImF1ZCI6IlVTRVIiLCJyb2xlcyI6WyJERUZBVUxUIl0sInVzciI6Ijg0OTM4Nzg4MDkxIiwidGZjdCI6Ik1TSVNETiIsInRmY3YiOiI4NDkzODc4ODA5MSIsInVzdCI6Im1zaXNkbiIsInR5cGUiOiJCQVNJQyIsImlzcyI6IkF1dGhTZXIiLCJhenAiOiJBUFAiLCJpbWVpIjoiVlRQXzE0M0U3ODQyMUE5RjMzMUVBMjM0NjExMjkwRkMxRUUzIiwidG9zIjoiYW5kcm9pZCIsInZybSI6IlNNUyIsImlhdCI6MTY3NDIwOTg1NiwiZXhwIjoxNjc0MjEzNDU2LCJqdGkiOiIwMUdRN0FZMlREVlk2SjlFTlBYNVk2S0UzQiJ9.GLsKAYKQ6xCioC8gQDLuBT+JjI2gvaYMv7g01g9+3nV86Izk6unlSobkr20HzDDC00bRKxl5CFRQYTZo5tYNA+yvWlJyxaxJyCDkLFn/YqzHqQW4+ccVKa9DFMWXR3LPq7NZwaqRY7+qSoC9BLYHNExFwEx2R1/G/YM35J8o6DOftRNNdn/4E4b9Nm5e+8goPEnMsNL3MtZyu9BdITTleVnT11cJTgxv+jHXdyaVpCdpXeeacIl8Q2IdODuiFiE4Mr6HqbjfrHU6k+L+qA2no4O9a/to/32BxxSimZCkf230cjhO8yNyDHmyGx5ih/eFkA0Lj61iR5yksvYuwBLC6A==";
	//var rq1 = await LOGIN_INFOR("0938788091", imei);
	//var rq2 = await AUTH_LOGIN("0938788091", "666999", imei, token);

	var rq2 = await ACCOUNT_INFOR(imei, accessToken)

	console.log(rq2.data);
})();