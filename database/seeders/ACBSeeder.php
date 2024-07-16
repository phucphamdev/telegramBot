<?php
	
	namespace Database\Seeders;
	
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;
	
	class ACBSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			System::create([
				'id' => 999,
				'port' => 7001,
				'db_port' => 3306,
				'db_host' => 'localhost',
				'db_user' => 'root',
				'db_password' => '',
				'db_database' => 'vcb_payment',
				'captcha_service' => 'twocaptcha',
				'captcha_key' => ['cd9353c932bd140a0d3084cb04fa70c4'],
				
			]);
		}
	}
