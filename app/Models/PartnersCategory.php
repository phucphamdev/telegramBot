<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;
	
	class PartnersCategory extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		
		protected $fillable = [
			'id',
			'created_at',
			'updated_at	'
		];
	}
