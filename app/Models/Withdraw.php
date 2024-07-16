<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;
	use Haruncpi\LaravelUserActivity\Traits\Loggable;

	class Withdraw extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'withdraws';

		protected $fillable = [
			'id',
			'bankCode',
			'cardName',
			'cardCode',
			'amount',
			'comment',
			'tranIDCallback',
			'urlCallback',
			'accessToken',
			'errorCode',
			'errorDescription',
			'errorData',
			'tranID',
			'isBank',
			'status',
			'withdraws_callback',
			'check_withdraws',
			'created_at',
			'updated_at	'
		];
	}
