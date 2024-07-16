<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use mysql_xdevapi\Table;
	use Spatie\Permission\Traits\HasRoles;
	
	class RolesPermissionsView extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		
		protected $table = 'rolespermissionsview';
		
		protected $fillable = [
			'id',
			'created_at',
			'updated_at	'
		];
	}
