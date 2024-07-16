<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

class TPBank extends Model
{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'tpbank';

		protected $fillable = [
			'id',
			'account',
			'arrangementId',
			'reference',
			'description',
			'bookingDate',
			'valueDate',
			'amount',
			'currency',
			'creditDebitIndicator',
			'runningBalance',
			'created_at',
			'updated_at'
		];
}
