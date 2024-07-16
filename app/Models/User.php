<?php

	namespace App\Models;

	use App\Core\Traits\SpatieLogsActivity;
	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;
	use Spatie\Permission\Traits\HasRoles;

//	use Tymon\JWTAuth\Contracts\JWTSubject;
	use Haruncpi\LaravelUserActivity\Traits\Loggable;


	class User extends Authenticatable implements MustVerifyEmail
	{
		//	class User extends Authenticatable implements MustVerifyEmail
		use HasFactory, Notifiable, HasApiTokens;
		use SpatieLogsActivity;
		use HasRoles;
		use Loggable;

		protected $table = 'users';

		protected $fillable = [
			'id',
			'token_type',
			'expires_in',
			'first_name',
			'last_name',
			'UUID',
			'email',
			'email_verified_at',
			'api_token',
			'type',
			'callback_link',
			'access_token',
			'ip',
			'key',
			'tai_khoan',
			'telegram',
			'trang_thai',
			'dien_thoai',
			'website',
			'cong_ty',
			'quoc_gia',
			'ck_momo',
			'ck_vtpay',
			'ck_bank',
			'ck_zalo',
			'so_du',
			'role',
			'banklist',
			'expires_at',
			'last_used_at',
			'password',
		];

		protected $hidden = [
			'password',
			'remember_token',
		];

		protected $casts = [
			'email_verified_at' => 'datetime',
		];

		public function getRememberToken()
		{
			return $this->remember_token;
		}

		public function setRememberToken($value)
		{
			$this->remember_token = $value;
		}

		public function getNameAttribute()
		{
			return "{$this->first_name} {$this->last_name}";
		}

		public function getAvatarUrlAttribute()
		{
			if ($this->info) {
				return asset($this->info->avatar_url);
			}

			return asset(theme()->getMediaUrlPath() . 'avatars/blank.png');
		}

		public function info()
		{
			return $this->hasOne(UserInfo::class);
		}

		public function role()
		{
			return $this->role;
		}

		public function access_token()
		{
			return $this->access_token;
		}

		public function first_name()
		{
			return $this->first_name;
		}

        public function last_name()
        {
            return $this->last_name;
        }

        public function id()
        {
            return $this->id;
        }


	}
