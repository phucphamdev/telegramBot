<?php

	use App\Http\Controllers\Auth\AuthenticatedSessionController;
	use App\Http\Controllers\Auth\PasswordResetLinkController;
	use App\Http\Controllers\Auth\RegisteredUserController;
	use App\Http\Controllers\SampleDataController;
	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\SystemController;
	use App\Http\Controllers\BanksController;
	use \App\Http\Controllers\MbBankController;
	use \App\Http\Controllers\VietcombankController;
	use \App\Http\Controllers\TransactionMbBankHistoryListController;
	use \App\Http\Controllers\VpBankController;
	use \App\Http\Controllers\ViettelpayController;
	use \App\Http\Controllers\MomoController;
	use \App\Http\Controllers\TPBankController;
	use \App\Http\Controllers\AcbtranferController;
	use \App\Http\Controllers\AcbankController;
	use App\Http\Controllers\AuthController;
	use \App\Http\Controllers\UsersController;
	use \App\Http\Controllers\RechargeController;
	use \App\Http\Controllers\WithdrawController;
	use \App\Http\Controllers\BanklistdetailController;
	use \App\Http\Controllers\ACBController;

	/*Route::middleware('auth:api')->get('/user', function (Request $request) {
		return $request->user();
	});*/

// Sample API route
	Route::get('/profits', [SampleDataController::class, 'profits'])->name('profits');

	Route::post('/register', [RegisteredUserController::class, 'apiStore']);

	Route::get('/user', [RegisteredUserController::class, 'apiGetUsers'])->name('apiGetUsers');
	Route::get('/user/{id}', [RegisteredUserController::class, 'apiGetUsersById'])->name('apiGetUsersById');
	Route::get('/user/email/{email}', [RegisteredUserController::class, 'apiGetUsersByEmail'])->name('apiGetUsersByEmail');

	Route::prefix('recharge')->name('recharge.')->group(function () {
		Route::post('/create_recharge', [RechargeController::class, 'create_recharge'])->name('create_recharge');
		Route::post('/check_status', [RechargeController::class, 'check_status'])->name('check_status');
		Route::post('/result_success_recharge', [RechargeController::class, 'result_success_recharge'])->name('result_success_recharge');
		Route::get('/get_recharge', [RechargeController::class, 'getRechargeApi'])->name('getRechargeApi');
	});

	Route::prefix('report')->name('report.')->group(function () {
		Route::post('/daily', [RechargeController::class, 'report_daily'])->name('report_daily');
		Route::post('/week', [RechargeController::class, 'report_week'])->name('report_week');
		Route::post('/month', [RechargeController::class, 'report_month'])->name('report_month');
	});


	Route::prefix('withdraw')->name('withdraw.')->group(function () {
		Route::post('/create_withdraw', [WithdrawController::class, 'create_withdraw'])->name('create_withdraw');
		Route::post('/check_withdraw', [WithdrawController::class, 'check_withdraw'])->name('check_withdraw');
		Route::post('/create_withdraw_result', [WithdrawController::class, 'create_withdraw_result'])->name('create_withdraw_result');

	});


	// system:
	Route::prefix('system')->group(function () {
		//APIs:
		Route::get('/get', [SystemController::class, 'apiSystemGet'])->name('apiSystem.index');
	});

	// banks:
	Route::prefix('banks')->group(function () {
		//APIs:
		Route::get('/get', [BanksController::class, 'apiBanksGet'])->name('apiBanks.index');
	});

	Route::prefix('partnersbanklist')->group(function () {
		//APIs:
		Route::post('/check', [BanklistdetailController::class, 'apiCheckPartner'])->name('apiCheckPartner');
		Route::post('/get_banks', [BanklistdetailController::class, 'apiGetBanksPartner'])->name('apiGetBanksPartner');
	});



	//MBBank
	Route::prefix('mbbank')->name('mbbank.')->group(function () {
		Route::get('/headerDefault', [MbBankController::class, 'apiHeaderDefault'])->name('apiMBBanks.apiHeaderDefault');
		Route::post('/doLogin', [MbBankController::class, 'doLogin'])->name('mbbank.doLogin');
		Route::post('/getHistory', [MbBankController::class, 'getHistory'])->name('mbbank.getHistory');
		Route::post('/getCaptcha', [MbBankController::class, 'getCaptcha'])->name('mbbank.getCaptcha');
		Route::post('/getBalance', [MbBankController::class, 'getBalance'])->name('mbbank.getBalance');
		Route::post('/getList', [MbBankController::class, 'getList'])->name('mbbank.getList');
		Route::post('/getTransactionHistory', [MbBankController::class, 'getTransactionHistory'])->name('mbbank.getTransactionHistory');
		Route::post('/getListBank', [MbBankController::class, 'getListBank'])->name('mbbank.getListBank');
		Route::post('/getNameBank', [MbBankController::class, 'getNameBank'])->name('mbbank.getNameBank');
		Route::post('/createTranfer', [MbBankController::class, 'createTranfer'])->name('mbbank.createTranfer');
		Route::post('/getAuthList', [MbBankController::class, 'getAuthList'])->name('mbbank.getAuthList');
		Route::post('/sendSmsOtp', [MbBankController::class, 'sendSmsOtp'])->name('mbbank.sendSmsOtp');
		Route::post('/createTranferAuthen', [MbBankController::class, 'createTranferAuthen'])->name('mbbank.createTranferAuthen');
		Route::post('/confirmTranfer', [MbBankController::class, 'confirmTranfer'])->name('mbbank.confirmTranfer');
		Route::post('/ref_no', [MbBankController::class, 'ref_no'])->name('mbbank.ref_no');
		Route::get('/headerDefault', [MbBankController::class, 'headerDefault'])->name('mbbank.headerDefault');
	});

	// Cron Jon ACB
	Route::prefix('cronacb')->name('cronacb.')->group(function () {
		Route::get('/', [AcbankController::class, 'cronacb_index'])->name('cronacb_index');
		Route::get('/getUserDetails', [AcbankController::class, 'cronacbGetUserDetails'])->name('getUserDetails');
		Route::post('/getBalance', [AcbankController::class, 'cronacb_getBalance'])->name('getBalance');
		Route::post('/cronacb_transactions', [AcbankController::class, 'cronacb_transactions'])->name('cronacb_transactions');
		Route::post('/tranfer_local', [AcbankController::class, 'cronacb_tranfer_local'])->name('tranfer_local');
		Route::post('/tranfer_247', [AcbankController::class, 'cronacb_tranfer_247'])->name('tranfer_247');
		Route::post('/confirm_tranfer', [AcbankController::class, 'cronacb_confirm_tranfer'])->name('confirm_tranfer');
		Route::post('/getBankCode', [AcbankController::class, 'cronacb_getBankCode'])->name('getBankCode');

	});
	// Cron Jon ACB

	// ACB
	Route::prefix('acb')->name('acb.')->group(function () {
		Route::post('/getUserDetails', [AcbankController::class, 'getUserDetails'])->name('getUserDetails');
		Route::post('/transactions', [AcbankController::class, 'transactions'])->name('transactions');

	});
	// End ACB

	//ACB tranfer
	Route::prefix('acbtranfer')->name('acbtranfer.')->group(function () {
		Route::post('/doLogin', [AcbtranferController::class, 'doLogin'])->name('acbtranfer.doLogin');
	});
	// End ACB tranfer

	//acbbankcode
	Route::prefix('apiacbbankcode')->name('apiacbbankcode.')->group(function () {
		Route::post('/doLogin', [AcbankController::class, 'doLogin'])->name('apiacbbankcode.doLogin');
		Route::post('/updateacbbankcode', [AcbankController::class, 'updateacbbankcode'])->name('updateacbbankcode');
		Route::post('/updatetransactions', [AcbankController::class, 'updatetransactions'])->name('updatetransactions');
		Route::post('/updatetransactionsnani', [AcbankController::class, 'updatetransactionsnani'])->name('updatetransactionsnani');
		Route::post('/updatetransactionsnani88', [AcbankController::class, 'updatetransactionsnani88'])->name('updatetransactionsnani88');
	});
	// End acbbankcode

	// vietcombank
	Route::prefix('vietcombank')->name('vietcombank.')->group(function () {
		Route::post('/getCaptcha', [VietcombankController::class, 'getCaptcha'])->name('vietcombank.getCaptcha');
		Route::post('/solveCaptcha', [VietcombankController::class, 'solveCaptcha'])->name('vietcombank.solveCaptcha');
		Route::post('/doLogin', [VietcombankController::class, 'doLogin'])->name('vietcombank.doLogin');
		Route::post('/setData', [VietcombankController::class, 'setData'])->name('vietcombank.setData');
		Route::post('/getlistAccount', [VietcombankController::class, 'getlistAccount'])->name('vietcombank.getlistAccount');
		Route::post('/getAccountDeltail', [VietcombankController::class, 'getAccountDeltail'])->name('vietcombank.getAccountDeltail');
		Route::post('/getHistories', [VietcombankController::class, 'getHistories'])->name('vietcombank.getHistories');
		Route::post('/getBanks', [VietcombankController::class, 'getBanks'])->name('vietcombank.getBanks');
		Route::post('/createTranferOutVietCombank', [VietcombankController::class, 'createTranferOutVietCombank'])->name('vietcombank.createTranferOutVietCombank');
		Route::post('/createTranferInVietCombank', [VietcombankController::class, 'createTranferInVietCombank'])->name('vietcombank.createTranferInVietCombank');
		Route::post('/genOtpTranFer', [VietcombankController::class, 'genOtpTranFer'])->name('vietcombank.genOtpTranFer');
		Route::post('/confirmTranfer', [VietcombankController::class, 'confirmTranfer'])->name('vietcombank.confirmTranfer');
		Route::post('/curlPost', [VietcombankController::class, 'curlPost'])->name('vietcombank.curlPost');
		Route::post('/headerNull', [VietcombankController::class, 'headerNull'])->name('vietcombank.headerNull');
	});
	// End vietcombank

	// vpbank
	Route::prefix('vpbank')->name('vpbank.')->group(function () {
		Route::post('/getCaptcha', [VpBankController::class, 'getCaptcha'])->name('vpbank.getCaptcha');
		Route::post('/solveCaptcha', [VpBankController::class, 'solveCaptcha'])->name('vpbank.solveCaptcha');
		Route::post('/doLogin', [VpBankController::class, 'doLogin'])->name('vpbank.doLogin');
		Route::post('/storeOtp', [VpBankController::class, 'storeOtp'])->name('vpbank.storeOtp');
		Route::post('/Accounts', [VpBankController::class, 'Accounts'])->name('vpbank.Accounts');
		Route::post('/CookieUserIdentifysCookieUserIdentifys', [VpBankController::class, 'CookieUserIdentifysCookieUserIdentifys'])->name('vpbank.CookieUserIdentifysCookieUserIdentifys');
		Route::post('/getHistories', [VpBankController::class, 'getHistories'])->name('vpbank.getHistories');
	});
	// End vpbank

	// Viettelpay
	Route::prefix('viettelpay')->name('viettelpay.')->group(function () {
		Route::post('/LoadPhone', [ViettelpayController::class, 'LoadPhone'])->name('viettelpay.LoadPhone');
		Route::post('/Register', [ViettelpayController::class, 'Register'])->name('viettelpay.Register');
		Route::post('/ImportOTPRegister', [ViettelpayController::class, 'ImportOTPRegister'])->name('viettelpay.ImportOTPRegister');
		Route::post('/GetSessionID', [ViettelpayController::class, 'GetSessionID'])->name('viettelpay.GetSessionID');
		Route::post('/ImportOTP', [ViettelpayController::class, 'ImportOTP'])->name('viettelpay.ImportOTP');
		Route::post('/LoginUser', [ViettelpayController::class, 'LoginUser'])->name('viettelpay.LoginUser');
		Route::post('/IMPORT_OTP', [ViettelpayController::class, 'IMPORT_OTP'])->name('viettelpay.IMPORT_OTP');
		Route::post('/active', [ViettelpayController::class, 'active'])->name('viettelpay.active');
		Route::post('/LOGIN_L1', [ViettelpayController::class, 'LOGIN_L1'])->name('viettelpay.LOGIN_L1');
		Route::post('/EKYCOnline', [ViettelpayController::class, 'EKYCOnline'])->name('viettelpay.EKYCOnline');
		Route::post('/GetBalance', [ViettelpayController::class, 'GetBalance'])->name('viettelpay.GetBalance');
		Route::post('/GetHisTory', [ViettelpayController::class, 'GetHisTory'])->name('viettelpay.GetHisTory');
		Route::post('/SendMoney', [ViettelpayController::class, 'SendMoney'])->name('viettelpay.SendMoney');
		Route::post('/SendMoneyOTP', [ViettelpayController::class, 'SendMoneyOTP'])->name('viettelpay.SendMoneyOTP');
		Route::post('/SendMoneyBank', [ViettelpayController::class, 'SendMoneyBank'])->name('viettelpay.SendMoneyBank');
		Route::post('/ImageFace', [ViettelpayController::class, 'ImageFace'])->name('viettelpay.ImageFace');
		Route::post('/ImageCCCD', [ViettelpayController::class, 'ImageCCCD'])->name('viettelpay.ImageCCCD');
		Route::post('/RegisterAPI', [ViettelpayController::class, 'RegisterAPI'])->name('viettelpay.RegisterAPI');
		Route::post('/ImportOTPRegisterAPI', [ViettelpayController::class, 'ImportOTPRegisterAPI'])->name('viettelpay.ImportOTPRegisterAPI');
		Route::post('/SendMoneyBankOTP', [ViettelpayController::class, 'SendMoneyBankOTP'])->name('viettelpay.SendMoneyBankOTP');
		Route::post('/GetListBank', [ViettelpayController::class, 'GetListBank'])->name('viettelpay.GetListBank');
		Route::post('/MONEY_TRANSFER_INSIDE_SMS_OTP', [ViettelpayController::class, 'MONEY_TRANSFER_INSIDE_SMS_OTP'])->name('viettelpay.MONEY_TRANSFER_INSIDE_SMS_OTP');
		Route::post('/MONEY_TRANSFER_INSIDE_SMS', [ViettelpayController::class, 'MONEY_TRANSFER_INSIDE_SMS'])->name('viettelpay.MONEY_TRANSFER_INSIDE_SMS');
		Route::post('/CHANGE_CURRENT_MONEY_SOURCE', [ViettelpayController::class, 'CHANGE_CURRENT_MONEY_SOURCE'])->name('viettelpay.CHANGE_CURRENT_MONEY_SOURCE');
		Route::post('/GET_TRANSACTION_FEE', [ViettelpayController::class, 'GET_TRANSACTION_FEE'])->name('viettelpay.GET_TRANSACTION_FEE');
		Route::post('/BALANCE_INQUIRY_NO_PIN', [ViettelpayController::class, 'BALANCE_INQUIRY_NO_PIN'])->name('viettelpay.BALANCE_INQUIRY_NO_PIN');
		Route::post('/MONEY_TRANSFER_OUTSIDE_SMS', [ViettelpayController::class, 'MONEY_TRANSFER_OUTSIDE_SMS'])->name('viettelpay.MONEY_TRANSFER_OUTSIDE_SMS');
		Route::post('/MONEY_TRANSFER_OUTSIDE_SMS_OTP', [ViettelpayController::class, 'MONEY_TRANSFER_OUTSIDE_SMS_OTP'])->name('viettelpay.MONEY_TRANSFER_OUTSIDE_SMS_OTP');
		Route::post('/GET_BENNAME_FROM_ACCOUNT_NUMBER', [ViettelpayController::class, 'GET_BENNAME_FROM_ACCOUNT_NUMBER'])->name('viettelpay.GET_BENNAME_FROM_ACCOUNT_NUMBER');
		Route::post('/GET_LIST_BANK_FROM_MSISDN', [ViettelpayController::class, 'GET_LIST_BANK_FROM_MSISDN'])->name('viettelpay.GET_LIST_BANK_FROM_MSISDN');
		Route::post('/GET_INFO_ACCOUNT', [ViettelpayController::class, 'GET_INFO_ACCOUNT'])->name('viettelpay.GET_INFO_ACCOUNT');
		Route::post('/GET_HISTORY_VTP', [ViettelpayController::class, 'GET_HISTORY_VTP'])->name('viettelpay.GET_HISTORY_VTP');
		Route::post('/Xmldecrypt', [ViettelpayController::class, 'Xmldecrypt'])->name('viettelpay.Xmldecrypt');
		Route::post('/signature', [ViettelpayController::class, 'signature'])->name('viettelpay.signature');
		Route::post('/REFRESH_AUTH', [ViettelpayController::class, 'REFRESH_AUTH'])->name('viettelpay.REFRESH_AUTH');
		Route::post('/LOGIN_AUTH', [ViettelpayController::class, 'LOGIN_AUTH'])->name('viettelpay.LOGIN_AUTH');
	});
	// End Viettelpay

	Route::prefix('momo')->name('momo.')->group(function () {
		Route::post('/index', [MomoController::class, 'index'])->name('apimomo.getHistory');
		Route::post('/lichsu', [MomoController::class, 'getHistory'])->name('apimomo.lichsu');
		Route::post('/userLogin', [MomoController::class, 'userLogin'])->name('apimomo.userLogin');
		Route::post('/DoLogin', [MomoController::class, 'DoLogin'])->name('apimomo.DoLogin');
		Route::post('/getBalance', [MomoController::class, 'getBalance'])->name('apimomo.getBalance');
		Route::post('/bankCodeList', [MomoController::class, 'bankCodeList'])->name('apimomo.bankCodeList');

	});

	Route::prefix('tpbank')->name('tpbank.')->group(function () {
		Route::post('/doLogin', [TPBankController::class, 'doLogin'])->name('tpbank.doLogin');
		Route::post('/getInfo', [TPBankController::class, 'getInfo'])->name('tpbank.getInfo');
		Route::post('/getDetails', [TPBankController::class, 'getDetails'])->name('tpbank.getDetails');
		Route::post('/getListBank', [TPBankController::class, 'getListBank'])->name('tpbank.getListBank');
		Route::post('/getHistories', [TPBankController::class, 'getHistories'])->name('tpbank.getHistories');
	});

//	Route::group([
//		'middleware' => 'api',
//		'prefix' => 'auth'
//	], function ($router) {
//		Route::post('/login', [AuthController::class, 'login']);
//		Route::post('/register', [AuthController::class, 'register']);
//		Route::post('/logout', [AuthController::class, 'logout']);
//		Route::post('/refresh', [AuthController::class, 'refresh']);
//		Route::get('/user-profile', [AuthController::class, 'me']);
//	});

	Route::post('/auth/register', [AuthController::class, 'createUser']);
	Route::post('/auth/login', [AuthController::class, 'loginUser']);

	Route::prefix('users')->name('users.')->group(function () {
		Route::post('/get', [UsersController::class, 'apiIndex'])->name('get');
		Route::post('/getdetail/{id}', [UsersController::class, 'apiGetUserDetail'])->name('getdetail');
	});


//	Route::post('/login', [AuthenticatedSessionController::class, 'apiStore']);
//
//	Route::post('/forgot_password', [PasswordResetLinkController::class, 'apiStore']);
//
//	Route::post('/verify_token', [AuthenticatedSessionController::class, 'apiVerifyToken']);

	Route::get('/users', [SampleDataController::class, 'getUsers']);

