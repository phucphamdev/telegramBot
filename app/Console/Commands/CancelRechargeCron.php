<?php

namespace App\Console\Commands;

use App\Http\Controllers\AcbankController;
use App\Http\Controllers\AcbtranferController;
use App\Http\Controllers\HistoryBankController;
use App\Http\Controllers\MbBankController;
use App\Http\Controllers\MbBankAController;
use App\Http\Controllers\TPBankController;
use App\Http\Controllers\TPBankHaController;
use App\Http\Controllers\VietcombankController;
use App\Http\Controllers\ViettelpayController;
use App\Models\ACB;
use App\Models\Acbank;
use App\Models\Acbtranfer;
use App\Models\Cronjobsetting;
use App\Models\HistoryBank;
use App\Models\Recharge;
use http\Client\Request;
use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use GuzzleHttp\Client;
use function PHPUnit\Framework\countOf;

class CancelRechargeCron extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'cancelrecharge:cron';

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
		$recharge = Recharge::orderBy('id', 'desc')->take(200)->get();

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'recharge cron-mpay-core: ' . count($recharge)
		]);

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'ID recharge on cron-mpay-core : ' . $recharge[0]['id'] . ' ID recharge : ' .  $recharge[199]['id']
		]);

		$checkCronJob = Recharge::where('trang_thai', 'pending')->get()->toArray();
		$countPendingRecharge = Recharge::where('trang_thai', 'pending')->count();
		// lay ngay hom nay
		$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$now = $date->format('d-m-Y H:i:s');
		$cronsetting = Cronjobsetting::where('id', 8899)->first();

		$text_content = '';
		$text_content .= $now . " --------- \n";

		if ($cronsetting->cancelrecharge == 1) {
			// kiem tra , neu đơn  (pending ) và cũ hơn 10 phút
			foreach ($recharge as $i => $item) {
				$time = $item->created_at->format('d-m-Y H:i:s');
				$diff = abs(strtotime($now) - strtotime($time));
				$years = floor($diff / (365 * 60 * 60 * 24));
				$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
				$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
				$hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
				$minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
				$seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));

				if ($minutes >= 45 && $item->trang_thai == 'pending') {
					$arr = array();
					$arr['trang_thai'] = "cancel";
					$arr['cronjob'] = "Cancel vi qua 45 phut !! ";
					$arr['id'] = $item->id;

					$object_data = Recharge::where('id', $arr['id'])->first();
					$object_data->update($arr);
					$object_data->save();

				}
			}
			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => 'cron duyet qua : ' . count($recharge) . ' item '
			]);

			$text_content .= "cancelrecharge:  Run \n";
		} else {
			$text_content .= "cancelrecharge:  Dont Run  \n";
		}

		if ($cronsetting->historybank == 1) {
			$lichsu = new HistoryBankController();
			$lichsu->loading();

			$text_content .= "historybank:  Run  \n";

		} else {
			$text_content .= "historybank:  Dont Run  \n";
		}

		if ($cronsetting->updateHistoryPartners == 1) {

			foreach ($recharge as $i => $item) {
				if ($item->text && isset($item->comment_api)) {
					$histotybank_all = HistoryBank::all();

					foreach ($histotybank_all as $k => $his) {
						$pattern = "/";
						$pattern .= $item->text;
						$pattern .= "/i";
						$subject = $his->description;
						$check = preg_match($pattern, $subject);

						if ($check && isset($item->id_partners) && empty($his->doi_tac)) {
							$data['doi_tac'] = $item->id_partners;
							$objectbbb = HistoryBank::where('id', $his->id)->first();
							$objectbbb->update($data);
							$objectbbb->save();
						}
					}
				}
			}

			$text_content .= "HistoryPartners:  Run \n";

		} else {
			$text_content .= "HistoryPartners:  Dont Run  \n";
		}

//		if(count($checkCronJob) > 0 )
//		if(2 > 0 )
//		if ($countPendingRecharge > 0)
		if(2 > 0 )
		{
//			    'vietcombank' => VietcombankController::class,
//				'tpbank' => TPBankController::class,
//				'mbbank' => MbBankController::class,
//				'momo' => HistoryBankController::class,
//				'acbnodejs' => AcbankController::class,

			$controllers = [
//				'vietcombank' => VietcombankController::class,
				'acbnodejs' => AcbankController::class,
				'mbbank' => MbBankController::class,
				'mbbanka' => MbBankAController::class
//				'tpbank' => TPBankController::class,
//				'tpbankha' => TPBankHaController::class
			];

			foreach ($controllers as $setting => $controllerClass) {
				if ($cronsetting->$setting == 1) {
					$controller = new $controllerClass();
					$controller->loading();
					$text_content .= $setting . ': Run' . "\n";
				} else {
					$text_content .= $setting . ': Dont Run' . "\n";
				}
			}
		}

		$text_content .= $now . " --------- \n";

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => $text_content
		]);

		return Command::SUCCESS;
	}
}
