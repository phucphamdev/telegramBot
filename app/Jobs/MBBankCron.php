<?php
	
	namespace App\Jobs;
	
	use Illuminate\Bus\Queueable;
	use Illuminate\Contracts\Queue\ShouldBeUnique;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Foundation\Bus\Dispatchable;
	use Illuminate\Queue\InteractsWithQueue;
	use Illuminate\Queue\SerializesModels;
	
	class MBBankCron implements ShouldQueue
	{
		use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
		
		/**
		 * Create a new job instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			//
		}
		
		/**
		 * Execute the job.
		 *
		 * @return void
		 */
		public function handle()
		{
			$this->app->bindMethod([MBBankCron::class, 'handle'], function ($job, $app) {
				return $job->handle($app->make(MBBankCron::class));
			});
		}
	}
