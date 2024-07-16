<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;

	class HelperServiceProvider extends ServiceProvider
	{
		/**
		 * Register services.
		 *
		 * @return void
		 */
		public function register()
		{
			$this->servicerProviderBank();
		}

		/**
		 * Bootstrap services.
		 *
		 * @return void
		 */
		public function boot()
		{
			require_once app_path() . '/Helper/helper.php';
		}

		public function servicerProviderBank(): void
		{
			require_once app_path() . '/Helper/library/RSA/Crypt/RSA.php';
			require_once app_path() . '/Helper/ClassHelper.php';
			require_once app_path() . '/Helper/CronVCBHelper.php';
			require_once app_path() . '/Helper/KpayHelper.php';

			foreach (glob(app_path() . '/Helper/Bank/*.php') as $item) {
				require_once $item;
			}
		}
	}
