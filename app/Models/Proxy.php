<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;
	
	class Proxy extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		
		protected $table = 'proxies';
		
		protected $fillable = [
			'id',
			'local',
			'ip',
			'port',
			'username',
			'password',
			'status',
			'type',
			'created_at',
			'updated_at	'
		];
	}
