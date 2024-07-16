<?php

	namespace App\Console\Commands;

	use App\Http\Controllers\AcbankController;
	use App\Http\Controllers\HistoryBankController;
	use App\Http\Controllers\MbBankController;
	use App\Http\Controllers\TPBankController;
	use App\Http\Controllers\VietcombankController;
	use App\Models\Banks;
	use App\Models\Cronjobsetting;
	use App\Models\HistoryBank;
	use App\Models\Recharge;
	use Illuminate\Console\Command;
	use Telegram\Bot\Laravel\Facades\Telegram;

	class CheckAPICron extends Command
	{
		/**
		 * The name and signature of the console command.
		 *
		 * @var string
		 */
		protected $signature = 'checkapi:cron';

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
			// load data
			$recharge = Recharge::all();
			$checkCronJob = Recharge::where('trang_thai', 'pending')->get()->toArray();
			$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$now = $date->format('d-m-Y H:i:s');

			$cronsetting = Cronjobsetting::where('id', 8899)->first();

			$text_content = '';

			if(count($checkCronJob) > 0) //if (count($checkCronJob) > 0)
			{
				$text_content .= $now . " ---- CheckAPICron Run Pending ----- \n";

				if ($cronsetting->vietcombank == 1) {
					$vcb = new VietcombankController();
					$vcb->loading();
					$text_content .= "Customer vietcombank:  Run \n";
				} else {
					$text_content .= "Customer vietcombank:  Dont Run  \n";
				}

				if ($cronsetting->acbnodejs == 1)
				{
					$acbnode = new AcbankController();
					$acbnode->loading2();
					$text_content .= "Customer - ACB Nodejs:  Run \n";
				} else {
					$text_content .= "Customer - ACB Nodejs:  Dont Run  \n";
				}

				$text_content .= $now . " ---- CheckAPICron Run Pending ----- \n";

			} else {
				$text_content .= $now . " ---- CheckAPICron Run ----- \n";
				$text_content .= " ---- Bank Customer ----- \n";
				foreach (Banks::all() as $bank) {
					if ($bank->trang_thai == 'active' && $bank->run == 1) {
						$text_content .= " ----------------------- \n";
						$text_content .= 'Bank: ' . $bank->name . " \n";
						$text_content .= 'Name: ' . $bank->full_name . " \n";
						$text_content .= 'Account: ' . $bank->number1 . " \n";
						$text_content .= 'Partner: ' . $bank->id_partners . " \n";
						$text_content .= " ----------------------- \n";
					}
				}
				$text_content .= " ---- Bank Customer ----- \n";
				$text_content .= $now . " ---- CheckAPICron Run ----- \n";
			}

			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => $text_content
			]);

			return Command::SUCCESS;
		}
	}
