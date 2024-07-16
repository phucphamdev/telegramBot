<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

	class HistoryBank extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'history_banks';

		protected $fillable = [
			'id',
			'id_bank',
			'groupbank',
			'id_refNo',
			'refNo',
			'description',
			'accountNo',
			'debitAmount',
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
