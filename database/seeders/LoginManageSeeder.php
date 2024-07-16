<?php
	
	namespace Database\Seeders;
	
	use App\Models\LoginManage;
	use Faker\Generator;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;
	
	class LoginManageSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Generator $faker)
		{
			LoginManage::factory(10)->create()->each(function (LoginManage $demo) use ($faker) {
				LoginManage::create([
					'UUID' =>   "User_".Str::random(30),
					'tai_khoan' => $faker->firstName,
					'id_dang_nhap' => "LoginID_".Str::random(6),
					'otp_dang_nhap' => Str::random(6),
					'thoi_gian_dang_nhap' =>  now(),
				]);
			});
			
		}
	}
