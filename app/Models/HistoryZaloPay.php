<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class HistoryZaloPay extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $fillable = [
			'id',
			'ma_gd',
			'tai_khoan_nhan',
			'tai_khoan_khach_hang',
			'ten_khach_hang',
			'noi_dung',
			'so_tien',
			'so_tien_thuc_nhan',
			'doi_tac',
			'trang_thai',
			'created_at',
			'updated_at	'
		];
	}
