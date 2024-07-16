<?php
	
	namespace App\Console\Commands;
	
	use App\Http\Controllers\HistoryBankController;
	use App\Http\Controllers\MbBankController;
	use App\Http\Controllers\TPBankController;
	use App\Http\Controllers\VietcombankController;
	use App\Models\Cronjobsetting;
	use App\Models\Recharge;
	use Illuminate\Console\Command;
	use Illuminate\Support\Carbon;
	use Telegram\Bot\Laravel\Facades\Telegram;
	
	class DeleteRechargeCron extends Command
	{
		/**
		 * The name and signature of the console command.
		 *
		 * @var string
		 */
		protected $signature = 'deleterecharge:cron';
		
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
//			\Log::info("deleterecharge:cron is working fine!");
////
////			// load data
////			$recharge = Recharge::all();
////
////			// lay ngay hom nay
////			$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
////			$now =  $date->format('d-m-Y H:i:s');
////
////			$object = Cronjobsetting::where('id', 8899)->first();
////			$text_content = '';
////
////			if($object->deleterecharge == 1)
////			{
////
////				// kiem tra , neu đơn  (thành công ) và cũ hơn 30 ngày thì xoá mềm
////				foreach ($recharge as $i => $item)
////				{
////					$time = $item->created_at->format('d-m-Y H:i:s');
////					$diff = abs(strtotime($now) - strtotime($time));
////					$years = floor($diff / (365*60*60*24));
////					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
////					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
////					$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
////					$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
////					$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
////
////
////					if ($months  >=1  && $item->trang_thai == 'success')
////					{
////						$item->delete();
////					}
////				}
////
////				// kiem tra , neu đơn  (từ chối) và cũ hơn 12 tiếng ngày thì xoá mềm
////				foreach ($recharge as $e => $item2)
////				{
////
////					$time = $item2->created_at->format('d-m-Y H:i:s');
////					$diff = abs(strtotime($now) - strtotime($time));
////					$years = floor($diff / (365*60*60*24));
////					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
////					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
////					$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
////					$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
////					$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
////
////					if ( $hours >= 12  || $days > 1 )
////					{
////						if ( $item2->trang_thai == 'cancel')
////						{
////							$item2->delete();
////						}
////					}
////
////				}
////
////				$text_content .=  $now .  "deleterecharge Run  \n";
////			}
////			else
////			{
////				$text_content .=  $now . "deleterecharge Dont Run  \n";
////			}
////
////
////			Telegram::sendMessage([
////				'chat_id' => "1281282845",
////				'parse_mode' => 'HTML',
////				'text' => $text_content
////			]);
////
			
			return Command::SUCCESS;
		}
	}
