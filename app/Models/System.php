<?php

	namespace App\Models;

	use App\Core\Traits\SpatieLogsActivity;
	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class System extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use SpatieLogsActivity;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'port',
			'url',
			'username',
			'password',
			'captchaKey',
			'imei',
			'sessionId',
			'account_no',
			'sessionId',
			'cust_id',
			'mbbank_password',
			'mbbank_username',
			'mbbank_account_no',
			'mbbank_cust_id',
			'mbbank_sessionId',
			'mbbank_imei',
			'mbbank_captchaKey',
			'vcb_sessionId',
			'vcb_mobileId',
			'vcb_clientId',
			'vcb_cif',
			'vcb_username',
			'vcb_password',
			'vcb_account_number',
			'vcb_captchaKey',
			'acb_accessToken',
			'acb_identity',
			'acb_refreshToken',
			'acb_username',
			'acb_password',
			'acb_accountNumber',
			'vpbank_tokenKey',
			'vpbank_x_crsf',
			'vpbank_accountID',
			'vpbank_username',
			'vpbank_password',
			'vpbnak_account_number',
			'tpbank_username',
			'tpbank_password',
			'tpbank_debtorAccountNumber',
			'tpbank_imei',
			'tpbank_token',
			'tpbank_DEVICE_NAME',
			'viettelpay_phone',
			'viettelpay_password',
			'viettelpay_imei',
			'viettelpay_otp',
			'viettelpay_token_notification',
			'viettelpay_client_private_key',
			'viettelpay_viettel_public_key',
			'created_at',
			'updated_at	'
		];
	}
