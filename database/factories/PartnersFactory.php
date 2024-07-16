<?php
	
	namespace Database\Factories;
	
	use Illuminate\Database\Eloquent\Factories\Factory;
	use Illuminate\Support\Str;
	
	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partners>
	 */
	class PartnersFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition()
		{
			return [
				'UUID' =>  " Partners_".Str::random(30),
				'ten' => $this->faker->firstName,
				'tai_khoan' => $this->faker->creditCardNumber,
				'telegram' => $this->faker->firstName,
				'trang_thai' => 'pending',
				'ck_momo' => 3,
				'ck_vtpay' => 3,
				'ck_bank' => 3,
				'ck_zalo' => 3,
				'so_du' => 0,
				'cong_ty' => $this->faker->company,
				'dien_thoai' => $this->faker->phoneNumber,
				'website' => $this->faker->url,
				'quoc_gia' => $this->faker->countryCode,
				'email' => $this->faker->email,
				'ngay_nhan' => now(),
			];
		}
	}
