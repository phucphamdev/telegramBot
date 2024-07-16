<?php
	
	namespace Database\Seeders;
	
	use App\Models\System;
	use Illuminate\Database\Seeder;
	
	class SystemSeeder extends Seeder
	{
		public function run()
		{
			System::create([
				'id' => 999,
				'port' => 3306,
				'url' => 'https://toidicodedao.click',
				'captchaKey' => '0063422cec412fac797d7d61d0ca9b1d',
				'imei' => 'e0hWzPAF-BNTV-Qs3E-DRxp-26RwvTOuR26Q',
				'sessionId' => 'b732ac7b-71f5-452a-8458-c964a4f4076b',
				'username' => '0921137408',
				'password' => 'Quan999999#',
				'account_no' => '055018898888',
				'cust_id' => '2a97cec1-dea8-45ed-b02b-d589835679d9',
				'customfields1' => 'No data',
				'customfields2' => 'No data',
				'customfields3' => 'No data',
				'customfields4' => 'No data',
				'customfields5' => 'No data',
				'vcb_sessionId' => '',
				'vcb_mobileId' => '',
				'vcb_clientId' => '',
				'vcb_cif' => '',
				'vcb_username' => '0342741490',
				'vcb_password' => 'Quan999999#',
				'vcb_account_number' => '1017107871',
				'vcb_captchaKey' => '0063422cec412fac797d7d61d0ca9b1d',
				'acb_port' => 7002,
				'acb_db_host' => 'localhost',
				'acb_db_port' => 3306,
				'acb_db_user' => 'root',
				'acb_db_password' => '',
				'acb_db_database' => 'acb',
				'acb_captcha_service' => 'twocaptcha',
				'acb_captcha_key' => '0063422cec412fac797d7d61d0ca9b1d',
				'acb_username' => '0921476765',
				'acb_password' => 'Quan999999#',
				'acb_accountNumber' => '110123456',
				'acb_currentUser' => 'HOANG VAN SON',
			]);
		}
	}
