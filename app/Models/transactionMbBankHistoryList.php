<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class transactionMbBankHistoryList extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'id',
			'api',
			'id_refNo',
			'postingDate',
			'transactionDate',
			'accountNo',
			'creditAmount',
			'debitAmount',
			'currency',
			'description',
			'availableBalance',
			'beneficiaryAccount',
			'refNo',
			'benAccountName',
			'bankName',
			'dueDate',
			'docId',
			'transactionType',
			'created_at',
			'updated_at	'
		];
	}
