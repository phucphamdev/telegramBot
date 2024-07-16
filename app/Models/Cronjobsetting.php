<?php

	namespace App\Models;

	use Haruncpi\LaravelUserActivity\Traits\Loggable;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;


	class Cronjobsetting extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles;
		use Loggable;

		protected $table = 'cronjobsetting';

		protected $fillable = [
			'id',
			'cancelrecharge',
			'updateHistoryPartners',
			'deleterecharge',
			'historybank',
			'vietcombank',
			'acbnodejs',
			'viettelpay',
			'tpbank',
			'mbbank',
			'momo',
			'created_at',
			'updated_at	'
		];
	}
