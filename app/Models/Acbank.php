<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;
	use Haruncpi\LaravelUserActivity\Traits\Loggable;

	class Acbank extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'acb_banks';


		protected $fillable = [
			'id',
			'accountNumber',
			'shortName',
			'cardHolderName',
			'username',
			'password',
			'cookies',
			'lastLoginInfomation',
			'loginStatus',
			'created_at',
			'updated_at	'
		];
	}
