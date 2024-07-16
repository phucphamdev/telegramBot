<?php
	
	namespace App\Console\Commands;
	
	use App\Models\CronJob;
	use Carbon\Carbon;
	use Illuminate\Console\Command;
	
	class DemoCron extends Command
	{
		/**
		 * The name and signature of the console command.
		 *
		 * @var string
		 */
		protected $signature = 'demo:cron';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = 'Command description';
		
		/**
		 * Execute the console command.
		 *
		 * @return int
		 */
		public function handle()
		{
			$mb = CronJob::where('name', 'demo')->get();
			$date = Carbon::now();
			$date->setTimezone('+7');
			$created_at = $date->format('d-m-Y H:i:s');
			if (count($mb) > 0)
			{
				$arr = array();
				$arr['name'] = 'demo';
				$arr['status'] = 'Failure';
				$arr['data'] = 'Failure';
				$arr['updated_at'] = $created_at;
				
				
				// update
				$object = CronJob::where('name', 'demo')->first();
				$arr['time'] = (int)$object->time + 1;
				
				$object->update($arr);
				$object->save();
				
				
			} else {
				
				
				$arr = array();
				$arr['name'] = 'demo';
				$arr['status'] = 'Failure';
				$arr['data'] = 'Failure';
				$arr['updated_at'] = $created_at;
				$arr['time'] = 0;
				// create
				CronJob::create($arr);
			}
			
			$this->info('Phuc done successfully');
			return Command::SUCCESS;
		}
	}
