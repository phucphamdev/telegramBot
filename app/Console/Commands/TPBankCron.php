<?php

namespace App\Console\Commands;

use App\Http\Controllers\AcbankController;
use App\Http\Controllers\AcbtranferController;
use App\Http\Controllers\HistoryBankController;
use App\Http\Controllers\MbBankController;
use App\Http\Controllers\MbBankAController;
use App\Http\Controllers\TPBankController;
use App\Http\Controllers\TPBankHaController;
use App\Http\Controllers\TPBankNDHController;
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

class TPBankCron extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'TPBank:cron';

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

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'Cron TPbank start: '
		]);

		$cronsetting = Cronjobsetting::where('id', 8899)->first();

		$countPendingRecharge = Recharge::where('trang_thai', 'pending')->count();

		if ($countPendingRecharge > 0)
		{
			$text_content = '';

			$controllers = [
				'tpbank' => TPBankController::class,
				'tpbankndh' => TPBankNDHController::class
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

			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => $text_content
			]);
		}

		return Command::SUCCESS;
	}
}
