<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

class MomoTranfer extends Model
{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'id',
			'transId',
			'io',
			'partnerId',
			'partnerName',
			'amount',
			'comment',
			'postBalance',
			'status',
			'created_at',
			'updated_at	'
		];
}
