<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class Banks extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'id',
			'name',
			'full_name',
			'id_partners',
			'desc',
			'branch',
			'number1',
			'number2',
			'port',
			'url',
			'username',
			'password',
			'desc_api',
			'trang_thai',
			'run',
			'bankcode',
			'link_qrcode',
			'created_at',
			'updated_at	'
		];
	}
