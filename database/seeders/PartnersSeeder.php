<?php
	
	namespace Database\Seeders;
	
	use App\Models\Partners;
	use App\Models\PartnersCustomer;
	use Faker\Generator;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;
	
	class PartnersSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Generator $faker)
		{
			Partners::factory(20)->create()->each(function (Partners $demoPartners) use ($faker)
			{
				Partners::create([
					'UUID' =>  " Partners_".Str::random(30),
					'ten' => $faker->firstName,
					'tai_khoan' => $faker->creditCardNumber,
					'telegram' => $faker->firstName,
					'trang_thai' => 'pending',
					'ck_momo' => 3,
					'ck_vtpay' => 3,
					'ck_bank' => 3,
					'ck_zalo' => 3,
					'so_du' => 0,
					'cong_ty' => $faker->company,
					'dien_thoai' => $faker->phoneNumber,
					'website' => $faker->url,
					'quoc_gia' => $faker->countryCode,
					'email' => $faker->email,
					'ngay_nhan' => now(),
				]);
			});
			
		}
	}
