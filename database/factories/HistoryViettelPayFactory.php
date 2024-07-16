<?php
	
	namespace Database\Factories;
	
	use Illuminate\Database\Eloquent\Factories\Factory;
	use Illuminate\Support\Str;
	
	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistoryViettelpay>
	 */
	class HistoryViettelPayFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition()
		{
			return [
				'ma_gd' => " MA_GD_" . Str::random(30),
				'tai_khoan_nhan' => $this->faker->creditCardNumber,
				'tai_khoan_khach_hang' => $this->faker->creditCardNumber,
				'ten_khach_hang' => $this->faker->firstName,
				'noi_dung' => "Nhan tien tu ACE1368",
				'so_tien' => 400000,
				'so_tien_thuc_nhan' => 360000,
				'doi_tac' => 'Web ACB',
				'trang_thai' => "Hoàn Thành",
			];
		}
	}
