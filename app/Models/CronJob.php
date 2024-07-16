<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;


	class CronJob extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'CronJob';

		protected $fillable = [
			'id',
			'data',
			'error',
			'status',
			'name',
			'time',
			'created_at',
			'updated_at	'
		];
	}
