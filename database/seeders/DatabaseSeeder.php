<?php
	
	namespace Database\Seeders;
	
	use App\Http\Requests\HistoryViettelPay;
	use Illuminate\Database\Seeder;
	
	class DatabaseSeeder extends Seeder
	{
		/**
		 * Seed the application's database.
		 *
		 * @return void
		 */
		public function run()
		{
			$this->call([
				UsersSeeder::class,
				BankSeeder::class,
				PermissionsSeeder::class,
				RolesSeeder::class,
				SystemSeeder::class,
				WithdrawSeeder::class,
				RechargeSeeder::class,
				AcbankSeeder::class,
				MomoSeeder::class,
				VietcombankSeeder::class,
				ViettelpaySeeder::class,
				VpBankSeeder::class,
				TPBankSeeder::class,
				transactionsVietcombankSeeder::class,
				AcbtranferSeeder::class,
				AcbbankcodeSeeder::class,
				PartnersCategorySeeder::class,
				PartnersCustomerCategorySeeder::class,
				PartnersCustomerSeeder::class,
				PartnersSeeder::class,
				ApiManageSeeder::class,
				ErrorManageSeeder::class,
				GeneralManageSeeder::class,
				HistoryMomoSeeder::class,
				HistoryViettelPaySeeder::class,
				HistoryZaloPaySeeder::class,
				LoginManageSeeder::class,
				HistoryBankSeeder::class,
				
			]);
		}
	}
