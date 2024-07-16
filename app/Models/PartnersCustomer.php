<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;
	use \App\Models\Partners;
	
	class PartnersCustomer extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		
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
			'id_partner',
			'created_at',
			'updated_at	'
		];
		
		public function partnerscustomerlist() {
			return $this->hasOne(Partners::class);
		}
	}
