<?php
	
	namespace Database\Seeders;
	
	use App\Models\Partners;
	use App\Models\PartnersCustomer;
	use Database\Factories\PartnersFactory;
	use Faker\Generator;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;
	
	class PartnersCustomerSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Generator $faker)
		{
			PartnersCustomer::factory(20)->create()->each(function (PartnersCustomer $demoPartners) use ($faker)
			{
				PartnersCustomer::create([
					'UUID' =>  " Cus_".Str::random(30),
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
					'id_partner' => rand(1,20),
					'ngay_nhan' => now(),
				]);
			});
		}
	}
