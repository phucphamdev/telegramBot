<?php

namespace App\Http\Controllers;

use App\DataTables\AcbtranferDataTable;
use App\Events\SuccessCallBack;
use App\Helper\Bank\ACBCronJob;
use App\Models\Acbank;
use App\Models\Acbbankcode;
use App\Models\Acbtranfer;
use App\Models\Acbtranfersnani;
use App\Models\Acbtranfersnani88;
use App\Models\Banks;
use App\Models\BankUsers;
use App\Models\Recharge;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class AcbankController extends Controller
{

	public function index(AcbtranferDataTable $dataTable)
	{
		$this->updateRecharge();

		$this->updateRechargenani();

		$this->updateRechargenani88();



		return $dataTable->render('pages.acbank.index');
	}

	public function runacb()
	{
		return view('pages.acbank.check');
	}

	public function updatetransactions(Request $request)
	{
		$data = $request->get('data');

		if (isset($data['transactions']))
		{
			foreach ($data['transactions'] as $item) {

				$object = Acbtranfer::where('transactionNumber',$item['transactionNumber'])->get()->toArray();

				if(count($object) == 0)
				{
					$get['amount'] = $item['amount'] ?? "";
					$get['accountName'] = $item['accountName'] ?? "";
					$get['receiverName'] = $item['receiverName'] ?? "";
					$get['transactionNumber'] = $item['transactionNumber'] ?? "";
					$get['description'] = $item['description'] ?? "";
					$get['bankName'] = $item['bankName'] ?? "";
					$get['isOnline'] = $item['isOnline'] ?? "";
					$get['postingDate'] = $item['postingDate'] ?? "";
					$get['accountOwner'] = $item['accountOwner'] ?? "";
					$get['type'] = $item['type'] ?? "";
					$get['receiverAccountNumber'] = $item['receiverAccountNumber'] ?? "No Data";
					$get['currency'] = $item['currency'] ?? "";
					$get['account'] = $item['account'] ?? "";
					$get['activeDatetime'] = $item['activeDatetime'] ?? "";
					$get['effectiveDate'] = $item['effectiveDate'] ?? "";
					Acbtranfer::create($get);

					Telegram::sendMessage([
						'chat_id' => "1281282845",
						'parse_mode' => 'HTML',
						'text' => 'ACB co GD moi: '.  json_encode($get)
					]);
				}

				$get = array();
			}

			$this->updateRecharge();

			echo "Transactions - ACB - Success";

		} else {
			$this->updateRecharge();

			echo "No Data - Transactions - ACB ";
		}
	}

	public function updatetransactionsnani(Request $request)
	{
		$data = $request->get('data');

		if (isset($data['transactions']))
		{
			foreach ($data['transactions'] as $item) {

				$object = Acbtranfersnani::where('transactionNumber',$item['transactionNumber'])->get()->toArray();

				if(count($object) == 0)
				{
					$get['amount'] = $item['amount'] ?? "";
					$get['accountName'] = $item['accountName'] ?? "";
					$get['receiverName'] = $item['receiverName'] ?? "";
					$get['transactionNumber'] = $item['transactionNumber'] ?? "";
					$get['description'] = $item['description'] ?? "";
					$get['bankName'] = $item['bankName'] ?? "";
					$get['isOnline'] = $item['isOnline'] ?? "";
					$get['postingDate'] = $item['postingDate'] ?? "";
					$get['accountOwner'] = $item['accountOwner'] ?? "";
					$get['type'] = $item['type'] ?? "";
					$get['receiverAccountNumber'] = $item['receiverAccountNumber'] ?? "No Data";
					$get['currency'] = $item['currency'] ?? "";
					$get['account'] = $item['account'] ?? "";
					$get['activeDatetime'] = $item['activeDatetime'] ?? "";
					$get['effectiveDate'] = $item['effectiveDate'] ?? "";

					Acbtranfersnani::create($get);

					Telegram::sendMessage([
						'chat_id' => "1281282845",
						'parse_mode' => 'HTML',
						'text' => 'ACB co GD moi: '.  json_encode($get)
					]);
				}

				$get = array();
			}

			$this->updateRechargenani();

			echo "Transactions - ACB - Success";

		} else {
			$this->updateRechargenani();

			echo "No Data - Transactions - ACB ";
		}
	}

	public function updatetransactionsnani88(Request $request)
	{
		$data = $request->get('data');

		if (isset($data['transactions']))
		{
			foreach ($data['transactions'] as $item) {

				$object = Acbtranfersnani88::where('transactionNumber',$item['transactionNumber'])->get()->toArray();

				if(count($object) == 0)
				{
					$get['amount'] = $item['amount'] ?? "";
					$get['accountName'] = $item['accountName'] ?? "";
					$get['receiverName'] = $item['receiverName'] ?? "";
					$get['transactionNumber'] = $item['transactionNumber'] ?? "";
					$get['description'] = $item['description'] ?? "";
					$get['bankName'] = $item['bankName'] ?? "";
					$get['isOnline'] = $item['isOnline'] ?? "";
					$get['postingDate'] = $item['postingDate'] ?? "";
					$get['accountOwner'] = $item['accountOwner'] ?? "";
					$get['type'] = $item['type'] ?? "";
					$get['receiverAccountNumber'] = $item['receiverAccountNumber'] ?? "No Data";
					$get['currency'] = $item['currency'] ?? "";
					$get['account'] = $item['account'] ?? "";
					$get['activeDatetime'] = $item['activeDatetime'] ?? "";
					$get['effectiveDate'] = $item['effectiveDate'] ?? "";

					Acbtranfersnani88::create($get);

					Telegram::sendMessage([
						'chat_id' => "1281282845",
						'parse_mode' => 'HTML',
						'text' => 'ACB co GD moi: '.  json_encode($get)
					]);
				}

				$get = array();
			}

			$this->updateRechargenani88();

			echo "Transactions - ACB - Success";

		} else {
			$this->updateRechargenani88();

			echo "No Data - Transactions - ACB ";
		}
	}

	public function loading()
	{
		$date = Carbon::now();
		$toDate = $date->format('d/m/Y H:m:s');
		$fromDate = $date->subDays(5)->format('d/m/Y H:m:s');
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://acb.kpaypro.vip/api/acb/transactions',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
                     	"accountNumber": "31527897",
						"username": "linhht20",
						"password": "Linh123@",
                        "begin": "10/8/2023 00:00:00",
						"end": "31/8/2023 00:00:00"
                    }',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'ACB nani88 : 31527897'
		]);

		$curl2 = curl_init();
		curl_setopt_array($curl2, array(
			CURLOPT_URL => 'https://acb.kpaypro.vip/api/acb/transactions',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
                       "accountNumber": "27508737",
						"username": "0908498107",
						"password": "Quan9999999#",
                        "begin": "10/8/2023 00:00:00",
						"end": "31/8/2023 00:00:00"
                    }',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'ACb Kpay: : 27508737 '
		]);

		$response2 = curl_exec($curl2);
		$err2 = curl_error($curl2);

		$curl3 = curl_init();
		curl_setopt_array($curl3, array(
			CURLOPT_URL => 'https://acb.kpaypro.vip/api/acb/transactions',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
                       "accountNumber": "10808611",
						"username": "10808611",
						"password": "Baomat03@@",
                       "begin": "10/8/2023 00:00:00",
						"end": "31/8/2023 00:00:00"
                    }',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'ACb Nani - Ho Van Duong : 10808611 '
		]);

		$response3 = curl_exec($curl3);
		$err3 = curl_error($curl3);

		if ($err || $err2 || $err3 )
		{
			Telegram::sendMessage([
				'chat_id' => "1281282845",
				'parse_mode' => 'HTML',
				'text' => 'ACB Nodejs  nani88: cURL Error = ' . $err . 'ACB Nodejs  Kpay: cURL Error = ' . $err2
			]);
		}
		else
		{
			$data = json_decode($response);

			if ($data->message == 'Success' && isset($data->transactions))
			{
				Telegram::sendMessage([
					'chat_id' => "1281282845",
					'parse_mode' => 'HTML',
					'text' => 'count acb nani88 '. count($data->transactions)
				]);

				foreach ($data->transactions as $item)
				{
					$object = Acbtranfersnani::where('transactionNumber', $item->transactionNumber)->get()->toArray();

					if (count($object) == 0 )
					{
						$get['amount'] = $item->amount;
						$get['accountName'] = $item->accountName;
						$get['receiverName'] = $item->receiverName;
						$get['transactionNumber'] = $item->transactionNumber;
						$get['description'] = $item->description;
						$get['bankName'] = $item->bankName ?? "";
						$get['isOnline'] = $item->isOnline ?? "";
						$get['postingDate'] = $item->postingDate ?? "";
						$get['accountOwner'] = $item->accountOwner ?? "";
						$get['type'] = $item->type ?? "";
						$get['receiverAccountNumber'] = $item->receiverAccountNumber ?? "No Data";
						$get['currency'] = $item->currency ?? "";
						$get['account'] = $item->account ?? "";
						$get['activeDatetime'] = $item->activeDatetime ?? "";
						$get['effectiveDate'] = $item->effectiveDate ?? "";

						Acbtranfersnani::create($get);

						Telegram::sendMessage([
							'chat_id' => "1281282845",
							'parse_mode' => 'HTML',
							'text' => 'ACB co giao dich nani88 '
						]);

					}

					$get = array();
				}

				Telegram::sendMessage([
					'chat_id' => "1281282845",
					'parse_mode' => 'HTML',
					'text' => 'duyet qua tat ca item nani88 , da updateRecharge ACB '
				]);
			}

			$data2 = json_decode($response2);

			if ($data2->message == 'Success' && isset($data2->transactions))
			{
				Telegram::sendMessage([
					'chat_id' => "1281282845",
					'parse_mode' => 'HTML',
					'text' => 'count acb kpay '. count($data2->transactions)
				]);

				foreach ($data2->transactions as $item2)
				{
					$object = Acbtranfer::where('transactionNumber', $item2->transactionNumber)->get()->toArray();

					if (count($object) == 0 )
					{
						$get['amount'] = $item2->amount;
						$get['accountName'] = $item2->accountName;
						$get['receiverName'] = $item2->receiverName;
						$get['transactionNumber'] = $item2->transactionNumber;
						$get['description'] = $item2->description;
						$get['bankName'] = $item2->bankName ?? "";
						$get['isOnline'] = $item2->isOnline ?? "";
						$get['postingDate'] = $item2->postingDate ?? "";
						$get['accountOwner'] = $item2->accountOwner ?? "";
						$get['type'] = $item2->type ?? "";
						$get['receiverAccountNumber'] = $item2->receiverAccountNumber ?? "No Data";
						$get['currency'] = $item2->currency ?? "";
						$get['account'] = $item2->account ?? "";
						$get['activeDatetime'] = $item2->activeDatetime ?? "";
						$get['effectiveDate'] = $item2->effectiveDate ?? "";

						Acbtranfer::create($get);

						Telegram::sendMessage([
							'chat_id' => "1281282845",
							'parse_mode' => 'HTML',
							'text' => 'ACB co giao dich kpay  , da updateRecharge ACB '
						]);
					}

					$get = array();
				}

				Telegram::sendMessage([
					'chat_id' => "1281282845",
					'parse_mode' => 'HTML',
					'text' => 'duyet qua tat ca item kpay , da updateRecharge ACB '
				]);


			}

			$data3 = json_decode($response3);

			if ($data3->message == 'Success' && isset($data3->transactions))
			{
				Telegram::sendMessage([
					'chat_id' => "1281282845",
					'parse_mode' => 'HTML',
					'text' => 'count acb nani88 - ho van duong '. count($data3->transactions)
				]);

				foreach ($data3->transactions as $item3)
				{
					$object = Acbtranfersnani88::where('transactionNumber', $item3->transactionNumber)->get()->toArray();

					if (count($object) == 0 )
					{
						$get['amount'] = $item3->amount;
						$get['accountName'] = $item3->accountName;
						$get['receiverName'] = $item3->receiverName;
						$get['transactionNumber'] = $item3->transactionNumber;
						$get['description'] = $item3->description;
						$get['bankName'] = $item3->bankName ?? "";
						$get['isOnline'] = $item3->isOnline ?? "";
						$get['postingDate'] = $item3->postingDate ?? "";
						$get['accountOwner'] = $item3->accountOwner ?? "";
						$get['type'] = $item3->type ?? "";
						$get['receiverAccountNumber'] = $item3->receiverAccountNumber ?? "No Data";
						$get['currency'] = $item3->currency ?? "";
						$get['account'] = $item3->account ?? "";
						$get['activeDatetime'] = $item3->activeDatetime ?? "";
						$get['effectiveDate'] = $item3->effectiveDate ?? "";

						Acbtranfersnani88::create($get);

						Telegram::sendMessage([
							'chat_id' => "1281282845",
							'parse_mode' => 'HTML',
							'text' => 'ACB co giao dich kpay  , da updateRecharge ACB '
						]);
					}

					$get = array();
				}

				Telegram::sendMessage([
					'chat_id' => "1281282845",
					'parse_mode' => 'HTML',
					'text' => 'duyet qua tat ca item nani88 - ho van duong , da updateRecharge ACB '
				]);
			}
		}

		curl_close($curl);
		curl_close($curl2);
		curl_close($curl3);

		$this->updateRecharge();

		$this->updateRechargenani();

		$this->updateRechargenani88();

	}

	public function updateRecharge()
	{
		$listReApi = Recharge::orderBy('id', 'desc')->take(100)->get()->toArray();
		// update api
		$api_data = Acbtranfer::where('api', '=', '')->orWhereNull('api')->get()->toArray();
		if(count($api_data) > 0)
		{
			foreach ($listReApi as $res)
			{
				if($res['trang_thai'] == 'success')
				{
					foreach ($api_data as $api)
					{
						if(empty($api['api']))
						{
							if (str_contains($api['description'], $res['comment']))
							{
								$arr['api'] = $res['comment'];
								$obj = Acbtranfer::where('id', $api['id'])->first();
								$obj->update($arr);
								$obj->save();

								//nap tien
								$obj2 = Recharge::where('comment', $res['comment'])->first();
								if(empty($obj2->comment_api))
								{
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();
									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$amount_acb = (int)str_replace(',', '', $api['amount']);
									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung  Sau Khi Admin Chấp Nhận Thành Công :</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác vì Admin đã xử lý rồi : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Binh Luan : </b>\n"
										. $api['description'] . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
						}

					}
				}
				elseif ($res['trang_thai'] == 'pending' || $res['trang_thai'] == 'cancel' )
				{
					foreach ($api_data as $api)
					{
						if (str_contains($api['description'], $res['comment']))
						{
							$arr['api'] = $res['comment'];
							$obj = Acbtranfer::where('id', $api['id'])->first();
							$obj->update($arr);
							$obj->save();

							//nap tien
							$obj2 = Recharge::where('comment', $res['comment'])->first();

							// neu pending va chua co noi dung api
							if($obj2->trang_thai == 'pending' && empty($obj2->comment_api))
							{
								$amount_acb = (int)str_replace(',', '', $api['amount']);

								if ($amount_acb == $obj2->amount && $obj2->trang_thai == 'pending')
								{
									// update Recharge
									$arr['trang_thai'] = 'success';
									$arr['comment_api'] = $api['description'];
									$arr['id'] = $res['id'];

									$obj2->update($arr);
									$obj2->save();

									event(new SuccessCallBack($arr));

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');

									$partners = User::where('id', $obj2->id_partners)->first();



									$data_arr = [
										'so_du' => (int)$partners->so_du + (int)$amount_acb
									];

									$partners->update($data_arr);
									$partners->save();

									$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										. "<b>Đã Cộng Số Tiền: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Tổng Cộng : </b>\n"
										. number_format($data_arr['so_du'], 0, '', ',') . "\n"
										. "<b> Cho Đối Tác  : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);

								}
								else // đúng noi dung , sai so tiền
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];

									Telegram::sendMessage([
										'chat_id' => "1281282845",
										'parse_mode' => 'HTML',
										'text' => $txt
									]);

									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung Giao Dịch Yêu Cầu Nạp Tiền:</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
							// neu cancel va chua co noi dung api
							if($obj2->trang_thai == 'cancel' && empty($obj2->comment_api))
							{
								$amount_acb = (int)str_replace(',', '', $api['amount']);

								if ($amount_acb == $obj2->amount && $obj2->trang_thai == 'cancel')
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];

									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();

									$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										. "<b>Đã Cộng Số Tiền: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Tổng Cộng : </b>\n"
										. number_format($data_arr['so_du'], 0, '', ',') . "\n"
										. "<b> Cho Đối Tác  : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);

								}
								else // đúng noi dung , sai so tiền
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];

									Telegram::sendMessage([
										'chat_id' => "1281282845",
										'parse_mode' => 'HTML',
										'text' => $txt
									]);

									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung Yêu Cầu Nạp Tiền:</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Binh Luan : </b>\n"
										. $api['description'] . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
						}
					}
				}
			}
		}
		// end api
	}

	public function updateRechargenani()
	{
		$listReApi = Recharge::orderBy('id', 'desc')->take(100)->get()->toArray();
		// update api
		$api_data = Acbtranfersnani::where('api', '=', '')->orWhereNull('api')->get()->toArray();
		if(count($api_data) > 0)
		{
			foreach ($listReApi as $res)
			{
				if($res['trang_thai'] == 'success')
				{
					foreach ($api_data as $api)
					{
						if(empty($api['api']))
						{
							if (str_contains($api['description'], $res['comment']))
							{
								$arr['api'] = $res['comment'];
								$obj = Acbtranfersnani::where('id', $api['id'])->first();
								$obj->update($arr);
								$obj->save();

								//nap tien
								$obj2 = Recharge::where('comment', $res['comment'])->first();
								if(empty($obj2->comment_api))
								{
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();
									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$amount_acb = (int)str_replace(',', '', $api['amount']);
									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung  Sau Khi Admin Chấp Nhận Thành Công :</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác vì Admin đã xử lý rồi : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Binh Luan : </b>\n"
										. $api['description'] . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
						}

					}
				}
				elseif ($res['trang_thai'] == 'pending' || $res['trang_thai'] == 'cancel' )
				{
					foreach ($api_data as $api)
					{
						if (str_contains($api['description'], $res['comment']))
						{
							$arr['api'] = $res['comment'];
							$obj = Acbtranfersnani::where('id', $api['id'])->first();
							$obj->update($arr);
							$obj->save();

							//nap tien
							$obj2 = Recharge::where('comment', $res['comment'])->first();

							// neu pending va chua co noi dung api
							if($obj2->trang_thai == 'pending' && empty($obj2->comment_api))
							{
								$amount_acb = (int)str_replace(',', '', $api['amount']);

								if ($amount_acb == $obj2->amount && $obj2->trang_thai == 'pending')
								{
									// update Recharge
									$arr['trang_thai'] = 'success';
									$arr['comment_api'] = $api['description'];
									$arr['id'] = $res['id'];

									$obj2->update($arr);
									$obj2->save();

									event(new SuccessCallBack($arr));

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');

									$partners = User::where('id', $obj2->id_partners)->first();
									$data_arr = [
										'so_du' => (int)$partners->so_du + $amount_acb,
									];
									$partners->update($data_arr);
									$partners->save();

									$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										. "<b>Đã Cộng Số Tiền: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Tổng Cộng : </b>\n"
										. number_format($data_arr['so_du'], 0, '', ',') . "\n"
										. "<b> Cho Đối Tác  : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);

								}
								else // đúng noi dung , sai so tiền
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];

									Telegram::sendMessage([
										'chat_id' => "1281282845",
										'parse_mode' => 'HTML',
										'text' => $txt
									]);

									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung Giao Dịch Yêu Cầu Nạp Tiền:</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
							// neu cancel va chua co noi dung api
							if($obj2->trang_thai == 'cancel' && empty($obj2->comment_api))
							{
								$amount_acb = (int)str_replace(',', '', $api['amount']);

								if ($amount_acb == $obj2->amount && $obj2->trang_thai == 'cancel')
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];

									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();

									$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										. "<b>Đã Cộng Số Tiền: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Tổng Cộng : </b>\n"
										. number_format($data_arr['so_du'], 0, '', ',') . "\n"
										. "<b> Cho Đối Tác  : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);

								}
								else // đúng noi dung , sai so tiền
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];

									Telegram::sendMessage([
										'chat_id' => "1281282845",
										'parse_mode' => 'HTML',
										'text' => $txt
									]);

									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung Yêu Cầu Nạp Tiền:</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Binh Luan : </b>\n"
										. $api['description'] . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
						}
					}
				}
			}
		}
		// end api
	}

	public function updateRechargenani88()
	{
		$listReApi = Recharge::orderBy('id', 'desc')->take(100)->get()->toArray();
		// update api
		$api_data = Acbtranfersnani88::where('api', '=', '')->orWhereNull('api')->get()->toArray();
		if(count($api_data) > 0)
		{
			foreach ($listReApi as $res)
			{
				if($res['trang_thai'] == 'success')
				{
					foreach ($api_data as $api)
					{
						if(empty($api['api']))
						{
							if (str_contains($api['description'], $res['comment']))
							{
								$arr['api'] = $res['comment'];
								$obj = Acbtranfersnani88::where('id', $api['id'])->first();
								$obj->update($arr);
								$obj->save();

								//nap tien
								$obj2 = Recharge::where('comment', $res['comment'])->first();
								if(empty($obj2->comment_api))
								{
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();
									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$amount_acb = (int)str_replace(',', '', $api['amount']);
									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung  Sau Khi Admin Chấp Nhận Thành Công :</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác vì Admin đã xử lý rồi : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Binh Luan : </b>\n"
										. $api['description'] . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
						}

					}
				}
				elseif ($res['trang_thai'] == 'pending' || $res['trang_thai'] == 'cancel' )
				{
					foreach ($api_data as $api)
					{
						if (str_contains($api['description'], $res['comment']))
						{
							$arr['api'] = $res['comment'];
							$obj = Acbtranfersnani88::where('id', $api['id'])->first();
							$obj->update($arr);
							$obj->save();

							//nap tien
							$obj2 = Recharge::where('comment', $res['comment'])->first();

							// neu pending va chua co noi dung api
							if($obj2->trang_thai == 'pending' && empty($obj2->comment_api))
							{
								$amount_acb = (int)str_replace(',', '', $api['amount']);

								if ($amount_acb == $obj2->amount && $obj2->trang_thai == 'pending')
								{
									// update Recharge
									$arr['trang_thai'] = 'success';
									$arr['comment_api'] = $api['description'];
									$arr['id'] = $res['id'];

									$obj2->update($arr);
									$obj2->save();

									event(new SuccessCallBack($arr));

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');

									$partners = User::where('id', $obj2->id_partners)->first();
									$data_arr = [
										'so_du' => (int)$partners->so_du + $amount_acb,
									];
									$partners->update($data_arr);
									$partners->save();

									$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										. "<b>Đã Cộng Số Tiền: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Tổng Cộng : </b>\n"
										. number_format($data_arr['so_du'], 0, '', ',') . "\n"
										. "<b> Cho Đối Tác  : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);

								}
								else // đúng noi dung , sai so tiền
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];

									Telegram::sendMessage([
										'chat_id' => "1281282845",
										'parse_mode' => 'HTML',
										'text' => $txt
									]);

									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung Giao Dịch Yêu Cầu Nạp Tiền:</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
							// neu cancel va chua co noi dung api
							if($obj2->trang_thai == 'cancel' && empty($obj2->comment_api))
							{
								$amount_acb = (int)str_replace(',', '', $api['amount']);

								if ($amount_acb == $obj2->amount && $obj2->trang_thai == 'cancel')
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];

									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();

									$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
										. "<b>Đã Cộng Số Tiền: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Tổng Cộng : </b>\n"
										. number_format($data_arr['so_du'], 0, '', ',') . "\n"
										. "<b> Cho Đối Tác  : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);

								}
								else // đúng noi dung , sai so tiền
								{
									// update Recharge
									$arr['trang_thai'] = 'cancel';
									$arr['comment_api'] = $api['description'];
									$obj2->update($arr);
									$obj2->save();

									$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$partners = User::where('id', $obj2->id_partners)->first();
									$txt = 'có text:' . $res['text'] . ' bên trong API ACB:  ' . $api['description'];

									Telegram::sendMessage([
										'chat_id' => "1281282845",
										'parse_mode' => 'HTML',
										'text' => $txt
									]);

									$text_content = "<b>Cron Job ACB Cập Nhật Nội Dung Yêu Cầu Nạp Tiền:</b>\n"
										. "<b>Số Tiền Yêu Cầu: </b>\n"
										. number_format($obj2->amount, 0, '', ',') . "\n"
										. "<b>Số Tiền Chuyển Khoản: </b>\n"
										. number_format($amount_acb, 0, '', ',') . "\n"
										. "<b> Không cộng tiền cho đối tác : </b>\n"
										. $partners->first_name . "\n"
										. "<b> Binh Luan : </b>\n"
										. $api['description'] . "\n"
										. "<b> Người Duyệt   : </b>\n"
										. "Cron Job: ACB\n"
										. "<b> Cập Nhật Lúc : </b>\n"
										. $created_at;

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text_content
									]);
								}
							}
						}
					}
				}
			}
		}
		// end api
	}

	public function updateacbbankcode(Request $request)
	{
		$data = $request->get('data');

		foreach ($data['data'] as $item) {
			$get['bank'] = $item['bank'];
			$get['bankName'] = $item['bankName'];
			$get['napasBankCode'] = $item['napasBankCode'];
			$get['thumbnail'] = $item['thumbnail'];
			$get['fastTransferSupported'] = $item['fastTransferSupported'] == true ? 1 : 0;
			$object = Acbbankcode::where('bank', $get['bank'])->first();

			if ($object) {
//					$object->update($get);
//					$object->save();
//					echo "Update ACBankcode";
			} else {
				Acbbankcode::create($get);
				echo "Create ACBankcode";
			}
		}

		echo "ACBankcode Update ";
	}


	function doLogin()
	{
		$acb = new ACBCronJob();

//			$user['username'] = '0921476765';
//			$user['password'] = 'Quan999999#';
//			$user['accountNumber'] = '110123456';
//			$user['currentUser'] = 'HOANG VAN SON';

		$user['username'] = '0908498107';
		$user['password'] = 'Quan999999#';
		$user['accountNumber'] = '27508737';
		$user['currentUser'] = 'NGUYEN ANH PHUONG';

//			$acb->login($user);

//			$getUserDetails = $acb->getUserDetails($user);

//			return json_decode($getUserDetails);
//
	}

	public function getUserDetails()
	{
		$acb = new ACBCronJob();

//			$user['username'] = '0921476765';
//			$user['password'] = 'Quan999999#';
//			$user['accountNumber'] = '110123456';
//			$user['currentUser'] = 'HOANG VAN SON';

		$user['username'] = '0908498107';
		$user['password'] = 'Quan999999#';
		$user['accountNumber'] = '27508737';
		$user['currentUser'] = 'NGUYEN ANH PHUONG';

		$getUserDetails = $acb->getUserDetails($user);
	}

	public function transactions()
	{
		$acb = new ACBCronJob();

		$acb->prepare();

		$transactions = $acb->laysaoke();
	}

	public function cronacb_transactions()
	{
		$acb = new ACBCronJob();

		$acb->prepare();

		$transactions = $acb->laysaoke();

		echo "<pre>";
		print_r($transactions);
		echo "</pre>";
		die('$transactions');

	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show(Acbank $acbank)
	{
		//
	}

	public function edit(Acbank $acbank)
	{
		//
	}

	public function update(Request $request, Acbank $acbank)
	{
		//
	}

	public function destroy(Acbank $acbank)
	{
		///
	}
}
