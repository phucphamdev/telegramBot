<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use mysql_xdevapi\Table;
	use Spatie\Permission\Traits\HasRoles;
	
	class Banklistdetail extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		
		protected $table = 'banklistdetail';
		
		protected $fillable = [
			'id',
			'id_bank',
			'id_partners',
			'trang_thai',
			'created_at',
			'updated_at',
			'created_at',
		];
	}
