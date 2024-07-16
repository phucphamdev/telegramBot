<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use mysql_xdevapi\Table;
	use Spatie\Permission\Traits\HasRoles;
	use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
	use Haruncpi\LaravelUserActivity\Traits\Loggable;

	class Recharge extends Model
	{
		use HasFactory, Notifiable, HasApiTokens;
		use HasRoles , SoftDeletes;
		use Loggable;

		protected $table = 'recharges';

		protected $fillable = [
			'id',
			'tranID',
			'text',
			'number_TranID',
			'tranIDHistory',
			'id_partners',
			'amount',
			'comment',
			'comment_api',
			'type',
			'number1',
			'number2',
			'branch',
			'bankcode',
			'name',
			'full_name',
			'callback',
			'callback_time',
			'callback_result',
			'cronjob',
			'add_money',
			'trang_thai',
			'deleted_at',
			'created_at',
			'updated_at	'
		];
	}
