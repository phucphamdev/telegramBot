<?php

namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

class Acbtranfersnani extends Model
{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'acbtranfers2';

		protected $fillable = [
			'id',
			'api',
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
