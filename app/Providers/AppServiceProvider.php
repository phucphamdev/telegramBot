<?php
	
	namespace App\Providers;
	
	use App\Core\Adapters\Theme;
	use Illuminate\Support\Facades\View;
	use Illuminate\Support\ServiceProvider;
	
	class AppServiceProvider extends ServiceProvider
	{
		/**
		 * Register any application services.
		 *
		 * @return void
		 */
		public function register()
		{
			if ($this->app->isLocal()) {
				$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
			}
			
//			$this->app['request']->server->set('HTTPS', true);
			$this->app['request']->server->set('HTTP', true);
		}
		
		/**
		 * Bootstrap any application services.
		 *
		 * @return void
		 */
		public function boot()
		{
			$theme = theme();
			
			// Share theme adapter class
			View::share('theme', $theme);
			
			// Set demo globally
//			$theme->setDemo(request()->input('demo', 'demo1'));
			
			$theme->setDemo('demo1');
			
			$theme->initConfig();
			
			bootstrap()->run();
			
			if (isRTL()) {
				// RTL html attributes
				Theme::addHtmlAttribute('html', 'dir', 'rtl');
				Theme::addHtmlAttribute('html', 'direction', 'rtl');
				Theme::addHtmlAttribute('html', 'style', 'direction:rtl;');
				Theme::addHtmlAttribute('body', 'direction', 'rtl');
			}
		}
	}
