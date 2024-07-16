<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class Partners extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'id',
			'ten',
			'UUID',
			'email',
			'cong_ty',
			'dien_thoai',
			'website',
			'quoc_gia',
			'tai_khoan',
			'telegram',
			'trang_thai',
			'ck_momo',
			'ck_vtpay',
			'ck_bank',
			'ck_zalo',
			'so_du',
			'ngay_nhan',
			'created_at',
			'updated_at	'
		];

	}
