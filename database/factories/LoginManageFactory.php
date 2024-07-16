<?php
	
	namespace Database\Factories;
	
	use Illuminate\Database\Eloquent\Factories\Factory;
	use Illuminate\Support\Str;
	
	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoginManage>
	 */
	class LoginManageFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition()
		{
			return [
				'UUID' =>   "User_".Str::random(30),
				'tai_khoan' => $this->faker->firstName,
				'id_dang_nhap' => "LoginID_".Str::random(6),
				'otp_dang_nhap' => Str::random(6),
				'thoi_gian_dang_nhap' =>  now(),
			];
		}
	}
