<?php
	
	namespace App\Console\Commands;
	
	use App\Models\Cronjobsetting;
	use App\Models\HistoryBank;
	use App\Models\Recharge;
	use App\Models\transactionMbBankHistoryList;
	use Illuminate\Console\Command;
	use Telegram\Bot\Laravel\Facades\Telegram;
	
	class updateHistoryPartnersCron extends Command
	{
		/**
		 * The name and signature of the console command.
		 *
		 * @var string
		 */
		protected $signature = 'updateHistoryPartners:cron';
		
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
			// lay ngay hom nay
			$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$now =  $date->format('d-m-Y H:i:s');
			
			$object = Cronjobsetting::where('id', 8899)->first();
			$text_content  ='';
			
			if($object->updateHistoryPartners == 1)
			{
				
				foreach ($recharge as $i => $item)
				{
					if ( $item->text && isset($item->comment_api) )
					{
						$histotybank_all = HistoryBank::all();
						
						foreach ($histotybank_all as $k => $his)
						{
							$pattern = "/";
							$pattern .= $item->text;
							$pattern .= "/i";
							$subject = $his->description;
							$check = preg_match($pattern, $subject);
							
							if ($check && isset($item->id_partners) && empty($his->doi_tac))
							{
								$data['doi_tac'] = $item->id_partners;
								$object = HistoryBank::where('id', $his->id)->first();
								$object->update($data);
								$object->save();
							}
						}
					}
				}
				
				$text_content .=  $now .  "updateHistoryPartners Run \n";
			}
			else
			{
				$text_content .=  $now . "updateHistoryPartners Dont Run  \n";
			}
			
			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => $text_content
			]);
			
			return Command::SUCCESS;
		}
	}
