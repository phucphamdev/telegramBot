<?php

	namespace App\Console;

	use App\Models\CronJob;
	use Illuminate\Console\Scheduling\Schedule;
	use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
	use Illuminate\Support\Carbon;

	class Kernel extends ConsoleKernel
	{
		/**
		 * The Artisan commands provided by your application.
		 *
		 * @var array
		 */
		protected $commands = [
			Commands\DemoCron::class,
			Commands\MBBankCron::class,
			Commands\SuccessCallBackCron::class,
//			Commands\DeleteRechargeCron::class,
			Commands\CancelRechargeCron::class,
			Commands\TPBankCron::class,
//			Commands\VietcombankCron::class,
			Commands\updateHistoryPartnersCron::class,
//			Commands\CheckAPICron::class
		];

		/**
		 * Define the application's command schedule.
		 *
		 * @param \Illuminate\Console\Scheduling\Schedule $schedule
		 * @return void
		 */
		protected function schedule(Schedule $schedule)
		{
			$schedule->command('deleterecharge:cron')
				->everyMinute();

			$schedule->command('cancelrecharge:cron')
				->everyMinute();

			$schedule->command('TPBank:cron')
				->everyFiveMinutes();

			$schedule->call(function ()
			{
				$name = 'demo';

				$mb = CronJob::where('name', $name)->get();
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('d-m-Y H-i-s');

				if (count($mb) > 0)
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;


					// update
					$object = CronJob::where('name', $name)->first();
					$arr['time'] = (int)$object->time + 1;

					$object->update($arr);
					$object->save();


				}
				else
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;
					$arr['time'] = 0;
					// create
					CronJob::create($arr);
				}

			})->everyMinute();

			$schedule->call(function ()
			{
				$name = 'mbbank';

				$mb = CronJob::where('name', $name)->get();
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('d-m-Y H-i-s');

				if (count($mb) > 0)
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;


					// update
					$object = CronJob::where('name', $name)->first();
					$arr['time'] = (int)$object->time + 1;

					$object->update($arr);
					$object->save();


				}
				else
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;
					$arr['time'] = 0;
					// create
					CronJob::create($arr);
				}

			})->everyMinute();

			$schedule->call(function ()
			{
				$name = 'CallBack';

				$mb = CronJob::where('name', $name)->get();
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('d-m-Y H-i-s');

				if (count($mb) > 0)
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;


					// update
					$object = CronJob::where('name', $name)->first();
					$arr['time'] = (int)$object->time + 1;

					$object->update($arr);
					$object->save();


				}
				else
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;
					$arr['time'] = 0;
					// create
					CronJob::create($arr);
				}

			})->everyMinute();

			$schedule->call(function ()
			{
				$name = 'ACB';

				$mb = CronJob::where('name', $name)->get();
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('d-m-Y H-i-s');

				if (count($mb) > 0)
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;


					// update
					$object = CronJob::where('name', $name)->first();
					$arr['time'] = (int)$object->time + 1;

					$object->update($arr);
					$object->save();


				}
				else
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;
					$arr['time'] = 0;
					// create
					CronJob::create($arr);
				}

			})->everyMinute();

			$schedule->call(function ()
			{
				$name = 'Vietcombank';

				$mb = CronJob::where('name', $name)->get();
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('d-m-Y H-i-s');

				if (count($mb) > 0)
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;


					// update
					$object = CronJob::where('name', $name)->first();
					$arr['time'] = (int)$object->time + 1;

					$object->update($arr);
					$object->save();


				}
				else
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;
					$arr['time'] = 0;
					// create
					CronJob::create($arr);
				}

			})->everyMinute();

			$schedule->call(function ()
			{
				$name = 'MoMo';

				$mb = CronJob::where('name', $name)->get();
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('d-m-Y H-i-s');

				if (count($mb) > 0)
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;


					// update
					$object = CronJob::where('name', $name)->first();
					$arr['time'] = (int)$object->time + 1;

					$object->update($arr);
					$object->save();


				}
				else
				{
					$arr = array();
					$arr['name'] = $name;
					$arr['status'] = 'Run Success';
					$arr['data'] = 'No Data';
					$arr['error'] = 'No Data';
					$arr['updated_at'] = $created_at;
					$arr['time'] = 0;
					// create
					CronJob::create($arr);
				}

			})->everyMinute();

		}

		/**
		 * Register the commands for the application.
		 *
		 * @return void
		 */
		protected function commands()
		{
			$this->load(__DIR__ . '/Commands');

			require base_path('routes/console.php');
		}
	}
