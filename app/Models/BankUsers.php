<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class BankUsers extends Model
	{
		use HasFactory;
		use Loggable;

		protected $table = 'bankusers';

		protected $fillable = [
			'id',
			'id_partners',
			'full_name',
			'branch',
			'number1',
			'username',
			'password',
			'trang_thai',
			'run',
			'bankcode',
			'link_qrcode',
			'created_at',
			'updated_at	'
		];



		}
