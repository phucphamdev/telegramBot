<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class Acbtranfer extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'acbtranfers';

		protected $fillable = [
			'id',
			'api',
			'counttransactionNumber',
			'amount',
			'description',
			'account',
			'accountName',
			'receiverName',
			'transactionNumber',
			'bankName',
			'isOnline',
			'postingDate',
			'accountOwner',
			'type',
			'receiverAccountNumber',
			'currency',
			'activeDatetime',
			'effectiveDate',
			'created_at',
			'updated_at	'
		];
	}
