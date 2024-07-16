<?php
	
	namespace App\Console\Commands;
	
	use App\Http\Controllers\MbBankController;
	use App\Models\CronJob;
	use App\Models\System;
	use App\Models\transactionMbBankHistoryList;
	use Carbon\Carbon;
	use Illuminate\Console\Command;
	
	class MBBankCron extends Command
	{
		/**
		 * The name and signature of the console command.
		 *
		 * @var string
		 */
		protected $signature = 'mbbank:cron';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = 'update apis MBBank 25s description';
		
		/**
		 * Execute the console command.
		 *
		 * @return int
		 */
		public function handle()
		{
			$object = System::where('id', 999)->first();
			$mbbank = new MbBankController();
			
			$history = $mbbank->getHistory($object->mbbank_username, $object->mbbank_account_no, $object->mbbank_sessionId, $object->mbbank_imei, 10);
			
			if ($history['result']['ok'] !== true)
			{
				$mbbank->doLogin();
				
				$history = $mbbank->getHistory($object->mbbank_username, $object->mbbank_account_no, $object->mbbank_sessionId, $object->mbbank_imei, 10);
			}
			
			if ($history['result']['ok'] !== true) {
				$this->doLogin();
				
				$this->index();
			}
			
			if ($history['transactionHistoryList']) {
				foreach ($history['transactionHistoryList'] as $item) {
					$data = transactionMbBankHistoryList::where('id_refNo', $item['refNo'])->first()->count();
					
					if ($data > 0) {
						continue;
						
					} else {
						$date = Carbon::now();
						$created_at = $date->format('d-m-Y H:i:s');
						
						transactionMbBankHistoryList::create([
							'id' => Null,
							'id_refNo' => $item['refNo'],
							'postingDate' => $item['postingDate'],
							'transactionDate' => $item['transactionDate'],
							'accountNo' => $item['accountNo'],
							'creditAmount' => $item['creditAmount'],
							'debitAmount' => $item['debitAmount'],
							'currency' => $item['currency'],
							'description' => $item['description'],
							'availableBalance' => $item['availableBalance'],
							'beneficiaryAccount' => $item['beneficiaryAccount'],
							'refNo' => $item['refNo'],
							'benAccountName' => $item['benAccountName'],
							'bankName' => $item['bankName'],
							'dueDate' => $item['dueDate'],
							'docId' => $item['docId'],
							'transactionType' => $item['transactionType'],
							'created_at' => $created_at,
							'updated_at' => $created_at,
						]);
					}
					
				}
				
			}
			
			$mb = CronJob::where('name', 'mbbank')->get();
			$date = Carbon::now();
			$date->setTimezone('+7');
			$created_at = $date->format('d-m-Y H:i:s');
			if (count($mb) > 0) {
				$arr = array();
				$arr['name'] = 'mbbank';
				$arr['status'] = 'Failure';
				$arr['data'] = 'Failure';
				$arr['updated_at'] = $created_at;
				
				// update
				$object = CronJob::where('name', 'mbbank')->first();
				$object->update($arr);
				$object->save();
				
				
			} else {
				
				
				$arr = array();
				$arr['name'] = 'mbbank';
				$arr['status'] = 'Failure';
				$arr['data'] = 'Failure';
				$arr['updated_at'] = $created_at;
				// create
				CronJob::create($arr);
			}
			
			$this->info('Phuc mbbank successfully');
			
			return Command::SUCCESS;
		}
	}
