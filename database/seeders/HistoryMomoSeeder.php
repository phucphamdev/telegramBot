<?php
	
	namespace Database\Seeders;
	
	use App\Models\HistoryMomo;
	use Faker\Generator;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;
	
	class HistoryMomoSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Generator $faker)
		{
			HistoryMomo::factory(10)->create()->each(function (HistoryMomo $demo) use ($faker)
			{
				HistoryMomo::create([
					'ma_gd' =>  " MA_GD_".Str::random(30),
					'tai_khoan_nhan' => $faker->creditCardNumber,
					'tai_khoan_khach_hang' => $faker->creditCardNumber,
					'ten_khach_hang' => $faker->firstName,
					'noi_dung' => "Nhan tien tu ACE1368",
					'so_tien' => 400000,
					'so_tien_thuc_nhan' => 360000,
					'doi_tac' => 'Web ACB',
					'trang_thai' => "Hoàn Thành",
				]);
			});
		}
	}
