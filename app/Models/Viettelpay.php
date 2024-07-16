<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class Viettelpay extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'viettelpaylist';

		protected $fillable = [
			'id',
			'customer_name',
			'transaction_amount',
			'transaction_title',
			'transaction_content',
			'transaction_status',
			'transaction_time',
			'transaction_fee',
			'money_source_bank_code',
			'request_id',
			'process_code',
			'icon_url',
			'viettel_bank_code',
			'ben_msisdn',
			'ben_bank_code',
			'ben_account_number',
			'display_type',
			'is_spend_money_transaction',
			'shop_name',
			'feature_name',
			'acc_name',
			'account_number',
			'created_at',
			'updated_at'
		];
	}
