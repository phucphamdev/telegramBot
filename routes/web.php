<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\BankscodeController;
use App\Http\Controllers\CronjobsettingController;
use App\Http\Controllers\AcbankController;
use App\Http\Controllers\AcbtranferController;
use App\Http\Controllers\AcbbankcodeController;
use App\Http\Controllers\TPBankController;
use App\Http\Controllers\VietcombankController;
use App\Http\Controllers\ViettelpayController;
use App\Http\Controllers\TransactionsVietcombankController;
use App\Http\Controllers\VpBankController;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\MomoTranferController;
use App\Http\Controllers\TransactionMbBankHistoryListController;
use App\Http\Controllers\MbBankController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PartnersCategoryController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\PartnersCustomerCategoryController;
use App\Http\Controllers\PartnersCustomerController;
use App\Http\Controllers\HistoryBankController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\ApiManageController;
use App\Http\Controllers\HistoryMomoController;
use App\Http\Controllers\HistoryViettelPayController;
use App\Http\Controllers\HistoryZaloPayController;
use App\Http\Controllers\BanklistdetailController;
use App\Http\Controllers\RolesPermissionsViewController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\KpayproController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\BankUsersController;
use App\Http\Controllers\LogsUsersController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('index');
// });

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
	if (isset($val['path'])) {
		$route = Route::get($val['path'], [PagesController::class, 'index']);

		// Exclude documentation from auth middleware
		if (!Str::contains($val['path'], 'documentation')) {
			$route->middleware('auth');
//				$route->middleware('jwt.auth');
//				$route->middleware('auth');
		}

		// Custom page demo for 500 server error
		if (Str::contains($val['path'], 'error-500')) {
			Route::get($val['path'], function () {
				abort(500, 'Something went wrong! Please try again later.');
			});
		}
	}
});

Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);
Route::get('/set-webhook', function () {
    $response = Telegram::setWebhook(['url' => url('telegram/webhook')]);

    dd($response);
});

Route::prefix('updated-activity')->name('updated-activity.')->group(function () {
	Route::get('/', [TelegramController::class, 'updatedActivity']);
	Route::get('/telegram', [TelegramController::class, 'contactForm']);
	Route::post('/send-message', [TelegramController::class, 'storeMessage']);
});


Route::group(['middleware' => 'auth'], function () {


	// Documentations pages
	Route::prefix('documentation')->group(function () {
		Route::get('/', [ReferencesController::class, 'index2']);
		Route::get('getting-started/references', [ReferencesController::class, 'index']);
		Route::get('getting-started/changelog', [PagesController::class, 'index']);
		Route::resource('layout-builder', LayoutBuilderController::class)->only(['store']);
	});

	Route::middleware('auth')->group(function () {
		// Account pages
		Route::prefix('account')->group(function () {
			Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
			Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
			Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
			Route::put('settings/password',
				[SettingsController::class, 'changePassword'])->name('settings.changePassword');
		});

		// Logs pages
		Route::prefix('log')->name('log.')->group(function () {

			Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
			Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
		});
	});

	// MBBank
	Route::prefix('mbbank')->name('mbbank.')->group(function () {
		Route::resource('/', MbBankController::class);
	});
	// End MBBank

	// MBBank - transactionMbBankHistoryList
	Route::prefix('transactionmbbankhistorylist')->name('transactionmbbankhistorylist.')->group(function () {
		Route::get('/',
			[TransactionMbBankHistoryListController::class, 'index'])->name('transactionmbbankhistorylist.index');
	});
	// MBBank - transactionMbBankHistoryList

	// ACB
	Route::prefix('acb')->name('acb.')->group(function () {
		Route::resource('/', AcbankController::class);
	});
	// End ACB/

	//ACB tranfer
	Route::prefix('acbtranfer')->name('acbtranfer.')->group(function () {
		Route::resource('/', AcbtranferController::class);
	});
	// End ACB tranfer

	//ACB tranfer
	Route::prefix('acbtranfer_nani88')->name('acbtranfer_nani88.')->group(function () {
		Route::get('/', [AcbtranferController::class, 'acbtranfer_nani88'])->name('acbtranfernani88');
	});
	// End ACB tranfer

	//ACB tranfer
	Route::prefix('acbtranfer_nani88_hovanduong')->name('acbtranfer_nani88_hovanduong.')->group(function () {
		Route::get('/', [AcbtranferController::class, 'acbtranfer_nani88_hovanduong'])->name('acbtranfer_nani88_hovanduong');
	});
	// End ACB tranfer

	//acbbankcode
	Route::prefix('acbbankcode')->name('acbbankcode.')->group(function () {
		Route::resource('/', AcbbankcodeController::class);
	});
	// End acbbankcode

	// VietcombankController
	Route::prefix('vietcombank')->name('vietcombank.')->group(function () {
		Route::resource('/', VietcombankController::class);

	});
	// end  VietcombankController

	//transactionsvietcombank
	Route::prefix('transactionsvietcombank')->name('transactionsvietcombank.')->group(function () {
		Route::get('/', [TransactionsVietcombankController::class, 'index'])->name('transactionsvietcombank.index');

	});
	//transactionsvietcombank

	// MomoController
	Route::prefix('momo')->name('momo.')->group(function () {
		Route::resource('/', MomoController::class);
		Route::post('/DoLogin', [MomoController::class, 'DoLogin'])->name('momo.DoLogin');
		Route::post('/update2', [MomoController::class, 'update2'])->name('momo.update2');
		Route::post('/loginOtp', [MomoController::class, 'loginOtp'])->name('momo.loginOtp');

	});
	// End MomoController

	// MomoController
	Route::prefix('momotranfer')->name('momotranfer.')->group(function () {
		Route::resource('/', MomoTranferController::class);
	});
	// End MomoController

	// PartnersCustomerCategory
	Route::prefix('partnerscustomercategory')->name('partnerscustomercategory.')->group(function () {
		Route::resource('/', PartnersCustomerCategoryController::class);
	});
	// end PartnersCustomerCategory

	// PartnersCategory
	Route::prefix('partnerscategory')->name('partnerscategory.')->group(function () {
		Route::resource('/', PartnersCategoryController::class);
	});
	// end PartnersCategory

	// generalmanage
	Route::prefix('generalmanage')->name('generalmanage.')->group(function () {
		Route::resource('/', \App\Http\Controllers\GeneralManageController::class);
	});
	// End generalmanage

	// generalmanage
	Route::prefix('errormanage')->name('errormanage.')->group(function () {
		Route::resource('/', \App\Http\Controllers\ErrorManageController::class);
	});
	// End generalmanage

	// loginmanage
	Route::prefix('loginmanage')->name('loginmanage.')->group(function () {
		Route::resource('/', \App\Http\Controllers\LoginManageController::class);
	});
	// End loginmanage


	Route::get('qr-code', function () {
		return QrCode::size(300)->generate('Welcome to ace1386.comdfsdfsdfsdfsdfsdf!');
	});


	// system
	Route::prefix('system')->name('system.')->group(function () {
		Route::get('/', [SystemController::class, 'index'])->name('index');
		Route::get('/cron_vcb', [SystemController::class, 'cron_vcb'])->name('cron_vcb');
		Route::post('/updateMBBank', [SystemController::class, 'updateMBBank'])->name('updateMBBank');
		Route::post('/updateACBank', [SystemController::class, 'updateACBank'])->name('updateACBank');
		Route::post('/updateVietcombank',
			[SystemController::class, 'updateVietcombank'])->name('updateVietcombank');
	});

	Route::prefix('withdraw')->name('withdraw.')->group(function () {
		Route::resource('/', WithdrawController::class);
		Route::get('/v2', [WithdrawController::class, 'index2'])->name('index2');
		Route::get('/datatables', [WithdrawController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [WithdrawController::class, 'update2'])->name('update2');
		Route::get('/datatables', [WithdrawController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [WithdrawController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [WithdrawController::class, 'edit'])->name('edit');
		Route::post('/update', [WithdrawController::class, 'update'])->name('update');
		Route::post('/getdetail', [WithdrawController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [WithdrawController::class, 'destroy'])->name('destroy');
		Route::post('/create_withdraw_submit',
			[WithdrawController::class, 'create_withdraw_submit'])->name('create_withdraw_submit');
	});

	Route::prefix('pending_withdraw')->name('pending_withdraw.')->group(function () {
		Route::get('/', [WithdrawController::class, 'pending_withdraw'])->name('pending_withdraw');
		Route::get('/datatables_pending_withdraw', [WithdrawController::class, 'datatables_pending_withdraw'])->name('datatables_pending_withdraw');
	});
	Route::prefix('cancel_withdraw')->name('cancel_withdraw.')->group(function () {
		Route::get('/', [WithdrawController::class, 'cancel_withdraw'])->name('cancel_withdraw');
		Route::get('/datatables_cancel_withdraw', [WithdrawController::class, 'datatables_cancel_withdraw'])->name('datatables_cancel_withdraw');
	});

	Route::prefix('success_withdraw')->name('success_withdraw.')->group(function () {
		Route::get('/', [WithdrawController::class, 'success_withdraw'])->name('success_withdraw');
		Route::get('/datatables_success_withdraw', [WithdrawController::class, 'datatables_success_withdraw'])->name('datatables_success_withdraw');
	});


	Route::prefix('withdraw_submit')->name('withdraw_submit.')->group(function () {
		Route::get('/', [WithdrawController::class, 'index_withdraw_submit'])->name('index_withdraw_submit');
//			Route::get('/datatables_withdraw_submit', [WithdrawController::class, 'datatables_withdraw_submit'])->name('datatables_withdraw_submit');
//			Route::get('/show_withdraw_submit/{id}', [WithdrawController::class, 'show_withdraw_submit'])->name('show_withdraw_submit');
//			Route::get('/edit_withdraw_submit/{id}', [WithdrawController::class, 'edit_withdraw_submit'])->name('edit_withdraw_submit');
//			Route::post('/update_withdraw_submit', [WithdrawController::class, 'update_withdraw_submit'])->name('update_withdraw_submit');
//			Route::post('/getdetail_withdraw_submit', [WithdrawController::class, 'getdetail_withdraw_submit'])->name('getdetail_withdraw_submit');
//			Route::post('/destroy_withdraw_submit', [WithdrawController::class, 'destroy_withdraw_submit'])->name('destroy_withdraw_submit');
	});

	Route::get('/withdraws', [WithdrawController::class, 'withdraws'])->name('withdraws');


	Route::prefix('recharge')->name('recharge.')->group(function () {
		Route::resource('/', RechargeController::class);
		Route::get('/datatables', [RechargeController::class, 'datatables'])->name('datatables');
		Route::get('/datatables_today', [RechargeController::class, 'datatables_today'])->name('datatables_today');
		Route::get('/datatables_week', [RechargeController::class, 'datatables_week'])->name('datatables_week');
		Route::get('/datatables_month', [RechargeController::class, 'datatables_month'])->name('datatables_month');
		Route::get('/datatables_api', [RechargeController::class, 'datatables_api'])->name('datatables_api');
		Route::post('/update2', [RechargeController::class, 'update2'])->name('update2');
		Route::get('/datatables', [RechargeController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [RechargeController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [RechargeController::class, 'edit'])->name('edit');
		Route::post('/update', [RechargeController::class, 'update'])->name('update');
		Route::post('/getdetail', [RechargeController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [RechargeController::class, 'destroy'])->name('destroy');
		Route::post('/recharge_cancel', [RechargeController::class, 'recharge_cancel'])->name('recharge_cancel');
	});

	Route::prefix('recharge_filter')->name('recharge_filter.')->group(function () {
		Route::get('/', [RechargeController::class, 'recharge_filter'])->name('recharge_filter');
		Route::post('/update', [RechargeController::class, 'update_recharge_filter'])->name('update_recharge_filter');
		Route::get('/getData', [RechargeController::class, 'getData'])->name('getData');
	});

	Route::prefix('recharge_admin_filter')->name('recharge_admin_filter.')->group(function () {
		Route::get('/', [RechargeController::class, 'recharge_admin_filter'])->name('recharge_filter');
		Route::post('/admin_update', [RechargeController::class, 'update_recharge_admin_filter'])->name('update_recharge_admin_filter');
	});

	Route::prefix('cancel_recharge')->name('cancel_recharge.')->group(function () {
		Route::get('/', [RechargeController::class, 'recharge_cancel'])->name('cancel_recharge');
		Route::get('/datatables_cancel_recharge',
			[RechargeController::class, 'datatables_cancel_recharge'])->name('datatables_cancel_recharge');
	});

	Route::prefix('pending_recharge')->name('pending_recharge.')->group(function () {
		Route::get('/', [RechargeController::class, 'pending_recharge'])->name('pending_recharge');
		Route::get('/datatables_pending_recharge',
			[RechargeController::class, 'datatables_pending_recharge'])->name('datatables_pending_recharge');
	});

	Route::prefix('success_recharge')->name('success_recharge.')->group(function () {
		Route::get('/', [RechargeController::class, 'success_recharge'])->name('success_recharge');
		Route::get('/datatables_success_recharge',
			[RechargeController::class, 'datatables_success_recharge'])->name('datatables_success_recharge');
	});

	Route::prefix('recharge_cancel')->name('recharge_cancel.')->group(function () {
		Route::get('/', [RechargeController::class, 'recharge_cancel'])->name('recharge_cancel');
		Route::get('/datatables_recharge_cancel',
			[RechargeController::class, 'datatables_recharge_cancel'])->name('datatables_recharge_cancel');
	});


	Route::prefix('withdraw_success')->name('withdraw_success.')->group(function () {
		Route::get('/', [WithdrawController::class, 'index_withdraw_success'])->name('index_withdraw_success');
		Route::get('/datatables_withdrawsuccess',
			[WithdrawController::class, 'datatables_withdrawsuccess'])->name('datatables_withdrawsuccess');
		Route::post('/getdetail_withdrawsuccess',
			[WithdrawController::class, 'getdetail_withdrawsuccess'])->name('getdetail_withdrawsuccess');
	});


	Route::prefix('recharge_success')->name('recharge_success.')->group(function () {
		Route::get('/', [RechargeController::class, 'index_recharge_success'])->name('index_recharge_success');
		Route::get('/datatables_recharge_success',
			[RechargeController::class, 'datatables_recharge_success'])->name('datatables_recharge_success');
		Route::post('/getdetail_recharge_success',
			[RechargeController::class, 'getdetail_recharge_success'])->name('getdetail_recharge_success');
	});

	Route::prefix('withdraw_callback')->name('withdraw_callback.')->group(function () {
		Route::get('/', [WithdrawController::class, 'index_callback'])->name('index_callback');
		Route::get('/datatables_callback',
			[WithdrawController::class, 'datatables_callback'])->name('datatables_callback');
		Route::get('/show/{id}', [WithdrawController::class, 'show_callback'])->name('show_callback');
		Route::get('/edit/{id}', [WithdrawController::class, 'edit_callback'])->name('edit_callback');
		Route::post('/update_callback', [WithdrawController::class, 'update_callback'])->name('update_callback');
		Route::post('/getdetail', [WithdrawController::class, 'getdetail_callback'])->name('getdetail_callback');
	});

	Route::prefix('recharge_callback')->name('recharge_callback.')->group(function () {
		Route::get('/', [RechargeController::class, 'index_callback'])->name('index_callback');
		Route::get('/datatables_callback',
			[RechargeController::class, 'datatables_callback'])->name('datatables_callback');
		Route::get('/show/{id}', [RechargeController::class, 'show_callback'])->name('show_callback');
		Route::get('/edit/{id}', [RechargeController::class, 'edit_callback'])->name('edit_callback');
		Route::post('/update_callback', [RechargeController::class, 'update_callback'])->name('update_callback');
		Route::post('/callback_again', [RechargeController::class, 'callback_again'])->name('callback_again');
		Route::post('/callback_error', [RechargeController::class, 'callback_error'])->name('callback_error');
		Route::post('/getdetail', [RechargeController::class, 'getdetail_callback'])->name('getdetail_callback');
	});

	Route::prefix('cronjob')->name('cronjob.')->group(function () {
		Route::resource('/', CronJobController::class);
		Route::get('/datatables', [CronJobController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [CronJobController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [CronJobController::class, 'edit'])->name('edit');
		Route::post('/update', [CronJobController::class, 'update'])->name('update');
		Route::post('/getdetail', [CronJobController::class, 'getdetail'])->name('getdetail');
	});

	Route::prefix('proxy')->name('proxy.')->group(function () {
		Route::resource('/', ProxyController::class);
		Route::get('/datatables', [ProxyController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [ProxyController::class, 'update2'])->name('update2');
		Route::get('/datatables', [ProxyController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [ProxyController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [ProxyController::class, 'edit'])->name('edit');
		Route::post('/update', [ProxyController::class, 'update'])->name('update');
		Route::post('/getdetail', [ProxyController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [ProxyController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('banks')->name('banks.')->group(function () {
		Route::resource('/', BanksController::class);
		Route::get('/datatables', [BanksController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [BanksController::class, 'update2'])->name('update2');
		Route::get('/datatables', [BanksController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [BanksController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [BanksController::class, 'edit'])->name('edit');
		Route::post('/update', [BanksController::class, 'update'])->name('update');
		Route::post('/getdetail', [BanksController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [BanksController::class, 'destroy'])->name('destroy');
	});


	Route::prefix('bankscode')->name('bankscode.')->group(function () {
		Route::resource('/', BankscodeController::class);
		Route::post('/storebank', [BankscodeController::class, 'storebank'])->name('storebank');
		Route::get('/datatables', [BankscodeController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [BankscodeController::class, 'update2'])->name('update2');
		Route::get('/datatables', [BankscodeController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [BankscodeController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [BankscodeController::class, 'edit'])->name('edit');
		Route::post('/update', [BankscodeController::class, 'update'])->name('update');
		Route::post('/getdetail', [BankscodeController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [BankscodeController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('cronjobsetting')->name('cronjobsetting.')->group(function () {
		Route::resource('/', CronjobsettingController::class);
		Route::get('/datatables', [CronjobsettingController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [CronjobsettingController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [CronjobsettingController::class, 'edit'])->name('edit');
		Route::post('/update', [CronjobsettingController::class, 'update'])->name('update');
		Route::post('/getdetail', [CronjobsettingController::class, 'getdetail'])->name('getdetail');

	});


	Route::prefix('apimanage')->name('apimanage.')->group(function () {
		Route::resource('/', ApiManageController::class);
		Route::get('/datatables', [ApiManageController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [ApiManageController::class, 'update2'])->name('update2');
		Route::get('/datatables', [ApiManageController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [ApiManageController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [ApiManageController::class, 'edit'])->name('edit');
		Route::post('/update', [ApiManageController::class, 'update'])->name('update');
		Route::post('/getdetail', [ApiManageController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [ApiManageController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('rolespermissionsview')->name('rolespermissionsview.')->group(function () {
		Route::resource('/', RolesPermissionsViewController::class);
		Route::get('/datatables', [RolesPermissionsViewController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [RolesPermissionsViewController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [RolesPermissionsViewController::class, 'edit'])->name('edit');
		Route::post('/update', [RolesPermissionsViewController::class, 'update'])->name('update');
		Route::post('/getdetail', [RolesPermissionsViewController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [RolesPermissionsViewController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('historymomo')->name('historymomo.')->group(function () {
		Route::resource('/', HistoryMomoController::class);
		Route::get('/datatables', [HistoryMomoController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [HistoryMomoController::class, 'update2'])->name('update2');
		Route::get('/datatables', [HistoryMomoController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [HistoryMomoController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [HistoryMomoController::class, 'edit'])->name('edit');
		Route::post('/update', [HistoryMomoController::class, 'update'])->name('update');
		Route::post('/getdetail', [HistoryMomoController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [HistoryMomoController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('historyviettelpay')->name('historyviettelpay.')->group(function () {
		Route::resource('/', HistoryViettelPayController::class);
		Route::get('/datatables', [HistoryViettelPayController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [HistoryViettelPayController::class, 'update2'])->name('update2');
		Route::get('/datatables', [HistoryViettelPayController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [HistoryViettelPayController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [HistoryViettelPayController::class, 'edit'])->name('edit');
		Route::post('/update', [HistoryViettelPayController::class, 'update'])->name('update');
		Route::post('/getdetail', [HistoryViettelPayController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [HistoryViettelPayController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('historyzalopay')->name('historyzalopay.')->group(function () {
		Route::resource('/', HistoryZaloPayController::class);
		Route::get('/datatables', [HistoryZaloPayController::class, 'datatables'])->name('datatables');
		Route::post('/update2', [HistoryZaloPayController::class, 'update2'])->name('update2');
		Route::get('/datatables', [HistoryZaloPayController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [HistoryZaloPayController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [HistoryZaloPayController::class, 'edit'])->name('edit');
		Route::post('/update', [HistoryZaloPayController::class, 'update'])->name('update');
		Route::post('/getdetail', [HistoryZaloPayController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [HistoryZaloPayController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('historybank')->name('historybank.')->group(function () {
		Route::resource('/', HistoryBankController::class);
		Route::get('/datatables', [HistoryBankController::class, 'datatables'])->name('datatables');
		Route::get('/datatables_user', [HistoryBankController::class, 'datatables_user'])->name('datatables_user');
		Route::post('/update2', [HistoryBankController::class, 'update2'])->name('update2');
		Route::get('/datatables', [HistoryBankController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [HistoryBankController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [HistoryBankController::class, 'edit'])->name('edit');
		Route::post('/update', [HistoryBankController::class, 'update'])->name('update');
		Route::post('/getdetail', [HistoryBankController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [HistoryBankController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('vcb_historybank')->name('vcb_historybank.')->group(function () {
		Route::get('/', [HistoryBankController::class, 'vcb_historybank'])->name('vcb_historybank');
		Route::get('/datatables_vcb_historybank', [HistoryBankController::class, 'datatables_vcb_historybank'])->name('datatables_vcb_historybank');
	});

	Route::prefix('acb_historybank')->name('acb_historybank.')->group(function () {
		Route::get('/', [HistoryBankController::class, 'acb_historybank'])->name('acb_historybank');
		Route::get('/datatables_acb_historybank', [HistoryBankController::class, 'datatables_acb_historybank'])->name('datatables_acb_historybank');
	});

	Route::prefix('mbbank_historybank')->name('mbbank_historybank.')->group(function () {
		Route::get('/', [HistoryBankController::class, 'mbbank_historybank'])->name('mbbank_historybank');
		Route::get('/datatables_mbbank_historybank', [HistoryBankController::class, 'datatables_mbbank_historybank'])->name('datatables_mbbank_historybank');
	});

	Route::prefix('tpbank_historybank')->name('tpbank_historybank.')->group(function () {
		Route::get('/', [HistoryBankController::class, 'tpbank_historybank'])->name('tpbank_historybank');
		Route::get('/datatables_tpbank_historybank', [HistoryBankController::class, 'datatables_tpbank_historybank'])->name('datatables_tpbank_historybank');
	});

	Route::prefix('partnerscustomer')->name('partnerscustomer.')->group(function () {
		Route::resource('/', PartnersCustomerController::class);
		Route::post('/update2', [PartnersCustomerController::class, 'update2'])->name('update2');
		Route::get('/datatables', [PartnersCustomerController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [PartnersCustomerController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [PartnersCustomerController::class, 'edit'])->name('edit');
		Route::post('/update', [PartnersCustomerController::class, 'update'])->name('update');
		Route::post('/getdetail', [PartnersCustomerController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [PartnersCustomerController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('partners_profile')->name('partners_profile.')->group(function () {
		Route::get('/', [PartnersController::class, 'profile'])->name('partners_profile');
		Route::get('/cron_vcb', [PartnersController::class, 'cron_vcb'])->name('cron_vcb');
		Route::get('/vcb', [PartnersController::class , 'vcb'])->name('vcb');
		Route::post('/cron_vcb_update', [PartnersController::class, 'cron_vcb_update'])->name('cron_vcb_update');
		Route::post('/update', [PartnersController::class, 'updateProfile'])->name('update');
	});

	Route::prefix('partners_logs')->name('partners_logs.')->group(function () {
		Route::get('/', [PartnersController::class, 'partners_logs'])->name('partners_logs');
	});

	Route::prefix('partners')->name('partners.')->group(function () {
		Route::resource('/', PartnersController::class);

//		Route::post('/updatebanklist', [PartnersController::class, 'updatebanklist'])->name('updatebanklist');
		Route::get('/datatables', [PartnersController::class, 'datatables'])->name('datatables');
//		Route::get('/datatables2', [PartnersController::class, 'datatables2'])->name('datatables2');
		Route::get('/show/{id}', [PartnersController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [PartnersController::class, 'edit'])->name('edit');
		Route::get('/document', [PartnersController::class, 'document'])->name('document');
		Route::post('/update', [PartnersController::class, 'update'])->name('update');
		Route::post('/getdetail', [PartnersController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [PartnersController::class, 'destroy'])->name('destroy');
//		Route::get('/banklist', [PartnersController::class, 'banklist'])->name('banklist');
	});


	Route::prefix('partnersbanklist')->name('partnersbanklist.')->group(function () {
		Route::get('/', [BanklistdetailController::class, 'index'])->name('index');
		Route::post('/update', [BanklistdetailController::class, 'update'])->name('update');
		Route::post('/update2', [BanklistdetailController::class, 'update2'])->name('update2');
		Route::get('/datatables2', [BanklistdetailController::class, 'datatables2'])->name('datatables2');
		Route::post('/getdetail', [BanklistdetailController::class, 'getdetail'])->name('getdetail');
		Route::post('/updatebanklist', [BanklistdetailController::class, 'updatebanklist'])->name('updatebanklist');
	});


	Route::prefix('tpbank')->name('tpbank.')->group(function () {
		Route::resource('/', TPBankController::class);
		Route::post('/update2', [TPBankController::class, 'update2'])->name('update2');

	});

	Route::prefix('transactionstpbank')->name('transactionstpbank.')->group(function () {
		Route::get('/', [TPBankController::class, 'transactionstpbank'])->name('transactionstpbank');

	});


	Route::prefix('vpbank')->name('vpbank.')->group(function () {
		Route::resource('/', VpBankController::class);
		Route::post('/update2', [VpBankController::class, 'update2'])->name('update2');
	});

	Route::prefix('viettelpay')->name('viettelpay.')->group(function () {
		Route::resource('/', ViettelpayController::class);
		Route::post('/update2', [SystemController::class, 'updateViettelPay'])->name('update2');
		Route::post('/loginOtp', [ViettelpayController::class, 'loginOtp'])->name('loginOtp');
		Route::post('/DoLogin', [ViettelpayController::class, 'DoLogin'])->name('DoLogin');
	});

	Route::prefix('users')->name('users.')->group(function () {
		Route::resource('/', UsersController::class);
		Route::post('/update2', [UsersController::class, 'update2'])->name('update2');
		Route::get('/loadUser', [UsersController::class, 'loadUser'])->name('loadUser');
		Route::get('/datatables', [UsersController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [UsersController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
		Route::post('/update', [UsersController::class, 'update'])->name('update');
		Route::post('/getdetail', [UsersController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [UsersController::class, 'destroy'])->name('destroy');


	});

	Route::prefix('kpaypro')->name('kpaypro.')->group(function () {
		Route::get('/profile', [KpayproController::class, 'profile'])->name('profile');
		Route::get('/settings', [KpayproController::class, 'settings'])->name('settings');
		Route::get('/bankscode', [KpayproController::class, 'bankscode'])->name('bankscode');
		Route::get('/banks', [KpayproController::class, 'banks'])->name('banks');
		Route::get('/index', [KpayproController::class, 'index'])->name('index');


	});


	Route::prefix('dashboard')->name('dashboard.')->group(function () {
		Route::get('/', [KpayproController::class, 'dashboard'])->name('dashboard');
	});

	Route::prefix('tracking')->name('tracking.')->group(function () {
		Route::get('/', [KpayproController::class, 'tracking'])->name('tracking');
		Route::get('/cronjob', [KpayproController::class, 'trackingCronjob'])->name('cronjob');
		Route::get('/banks', [KpayproController::class, 'trackingBanks'])->name('banks');
		Route::get('/users', [KpayproController::class, 'trackingUsers'])->name('users');
		Route::get('/logs', [KpayproController::class, 'trackingLogs'])->name('logs');
		Route::get('/settings', [KpayproController::class, 'trackingSettings'])->name('settings');
	});

	Route::prefix('bankusers')->name('bankusers.')->group(function () {
		Route::get('/', [BankUsersController::class, 'index'])->name('index');
		Route::get('/settings', [BankUsersController::class, 'settings'])->name('settings');
		Route::get('/datatables', [BankUsersController::class, 'datatables'])->name('datatables');
		Route::post('/update', [BankUsersController::class, 'update'])->name('update');
		Route::post('/update2', [BankUsersController::class, 'update2'])->name('update2');
		Route::post('/store', [BankUsersController::class, 'store'])->name('store');
		Route::get('/datatables', [BankUsersController::class, 'datatables'])->name('datatables');
		Route::get('/show/{id}', [BankUsersController::class, 'show'])->name('show');
		Route::get('/edit/{id}', [BankUsersController::class, 'edit'])->name('edit');

		Route::post('/getdetail', [BankUsersController::class, 'getdetail'])->name('getdetail');
		Route::post('/destroy', [BankUsersController::class, 'destroy'])->name('destroy');
	});

	Route::prefix('logsusers')->name('logsusers.')->group(function () {
		Route::get('/', [LogsUsersController::class, 'index'])->name('index');
	});

	Route::get('/test', [KpayproController::class, 'test'])->name('kpaypro.test');

	Route::get('/index2/{locale}', [UsersController::class, 'lang']);
	Route::get('/index2', [UsersController::class, 'index2'])->name('index2');


});


/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
