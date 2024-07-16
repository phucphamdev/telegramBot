<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class Momo extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'id',
			'username',
			'password',
			'name',
			'verification',
			'refreshToken',
			'authorization',
			'status',
			'time_login',
			'callback',
			'accounts',
			'agentId',
			'auth_token',
			'setupKeyDecrypt',
			'sessionkey',
			'RSA_PUBLIC_KEY',
			'balance',
			'ohash',
			'otp',
			'setupkey',
			'requestkey',
			'authToken',
			'limit',
			'imei',
			'rkey',
			'onesignal',
			'AAID',
			'TOKEN',
			'SECUREID',
			'proxy',
			'device',
			'hardware',
			'facture',
			'MODELID',
			'appVer',
			'appCode',
			'created_at',
			'updated_at	'
		];
	}
