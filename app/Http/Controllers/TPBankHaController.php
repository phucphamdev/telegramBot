<?php

namespace App\Http\Controllers;

use App\Events\SuccessCallBack;
use App\Helper\Bank\TPBankHa;
use App\Models\Recharge;
use App\Models\System;
use App\Models\TPBank as modelTPBank;
use App\Models\transactionMbBankHistoryList;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\TPBankDataTable;
use App\Helper\Bank\TPBank;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Telegram\Bot\Laravel\Facades\Telegram;

class TPBankHaController extends Controller
{

	public function index()
	{
		$history = $this->getHistories(); //lấy lịch sử trong 7 ngày

		if (!empty($history)) {
			if (isset($history['transactionInfos'])) {
				foreach ($history['transactionInfos'] as $key => $value) {
					$tp = modelTPBank::where('reference', $value['reference'])->get();
					if (count($tp) > 0) {
						continue;
					} else {
						$date = \Carbon\Carbon::now();
						$created_at = $date->format('d-m-Y H:i:s');
						$data = array();
						$data['arrangementId'] = $value['arrangementId'];
						$data['account'] = '00002148150';
						$data['reference'] = $value['reference'];
						$data['description'] = $value['description'];
						$data['bookingDate'] = $value['bookingDate'];
						$data['valueDate'] = $value['valueDate'];
						$data['amount'] = $value['amount'];
						$data['currency'] = $value['currency'];
						$data['creditDebitIndicator'] = $value['creditDebitIndicator'];
						$data['runningBalance'] = $value['runningBalance'];
						$data['created_at'] = $created_at;
						$data['updated_at'] = $created_at;

						modelTPBank::create($data);
					}
				}
			}

			$this->updateRechargeTpbnk();

			if (isset($history['transactionInfos'])) {
				return view('pages.tpbank.index', compact('history'));
			} else {
				$history = array();
				return view('pages.tpbank.index', compact('history'));
			}
		} else {
			$this->doLogin();
			$history = $this->getHistories();

			if (isset($history['transactionInfos'])) {
				foreach ($history['transactionInfos'] as $key => $value) {
					$tp = modelTPBank::where('reference', $value['reference'])->get();
					if (count($tp) > 0) {
						continue;
					} else {
						$date = \Carbon\Carbon::now();
						$created_at = $date->format('d-m-Y H:i:s');
						$data = array();
						$data['arrangementId'] = $value['arrangementId'];
						$data['account'] = '00002148150';
						$data['reference'] = $value['reference'];
						$data['description'] = $value['description'];
						$data['bookingDate'] = $value['bookingDate'];
						$data['valueDate'] = $value['valueDate'];
						$data['amount'] = $value['amount'];
						$data['currency'] = $value['currency'];
						$data['creditDebitIndicator'] = $value['creditDebitIndicator'];
						$data['runningBalance'] = $value['runningBalance'];
						$data['created_at'] = $created_at;
						$data['updated_at'] = $created_at;

						modelTPBank::create($data);
					}
				}
			}

			$this->updateRechargeTpbnk();

			if (isset($history['transactionInfos'])) {
				return view('pages.tpbank.index', compact('history'));
			} else {
				$history = array();
				return view('pages.tpbank.index', compact('history'));
			}
		}
	}

	public function loading()
	{
		$history = $this->getHistories(); //lấy lịch sử trong 7 ngày

		if (isset($history['transactionInfos'])) {

			foreach ($history['transactionInfos'] as $key => $value) {
				$tp = modelTPBank::where('reference', $value['reference'])->get();
				if (count($tp) > 0) {
					continue;
				} else {
					$date = \Carbon\Carbon::now();
					$created_at = $date->format('d-m-Y H:i:s');
					$data = array();
					$data['arrangementId'] = $value['arrangementId'];
					$data['account'] = '00002148150';
					$data['reference'] = $value['reference'];
					$data['description'] = $value['description'];
					$data['bookingDate'] = $value['bookingDate'];
					$data['valueDate'] = $value['valueDate'];
					$data['amount'] = $value['amount'];
					$data['currency'] = $value['currency'];
					$data['creditDebitIndicator'] = $value['creditDebitIndicator'];
					$data['runningBalance'] = $value['runningBalance'];
					$data['created_at'] = $created_at;
					$data['updated_at'] = $created_at;

					modelTPBank::create($data);
				}
			}
		} else {
			$this->doLogin();
			$history = $this->getHistories();

			if (isset($history['transactionInfos'])) {
				foreach ($history['transactionInfos'] as $key => $value) {
					$tp = modelTPBank::where('reference', $value['reference'])->get();
					if (count($tp) > 0) {
						continue;
					} else {
						$date = \Carbon\Carbon::now();
						$created_at = $date->format('d-m-Y H:i:s');
						$data = array();
						$data['arrangementId'] = $value['arrangementId'];
						$data['account'] = '00002148150';
						$data['reference'] = $value['reference'];
						$data['description'] = $value['description'];
						$data['bookingDate'] = $value['bookingDate'];
						$data['valueDate'] = $value['valueDate'];
						$data['amount'] = $value['amount'];
						$data['currency'] = $value['currency'];
						$data['creditDebitIndicator'] = $value['creditDebitIndicator'];
						$data['runningBalance'] = $value['runningBalance'];
						$data['created_at'] = $created_at;
						$data['updated_at'] = $created_at;

						modelTPBank::create($data);
					}
				}
			}

		}

		$thongbao = isset($history['transactionInfos']) ? count($history['transactionInfos']) : " No Data";

		Telegram::sendMessage([
			'chat_id' => "1281282845",
			'parse_mode' => 'HTML',
			'text' => 'TPBank Ha88 - transactionHistoryList  : ' . $thongbao
		]);

		$this->updateRechargeTpbnk();
	}

	public function transactionstpbank(TPBankDataTable $dataTable)
	{
		return $dataTable->render('pages.tpbank.transactionstpbank.index');
	}

	public function updateRechargeTpbnk2()
	{
		$listRe = Recharge::where('trang_thai', '!=', 'success')->get();

		foreach ($listRe as $re) {
			if (isset($re->text)) {
				foreach (\App\Models\TPBank::all() as $k => $vlue) {
					$pattern = "/";
					$pattern .= $re->text;
					$pattern .= "/i";
					$subject = $vlue->description;

					$check = preg_match($pattern, $subject);
					$amount_tpbank = (int)$vlue->amount;

					if ($check) {
						if ($re->amount == $amount_tpbank) {
							// update Recharge
							$arr['trang_thai'] = 'success';
							$arr['comment_api'] = $subject;
							$object = Recharge::where('id', $re->id)->first();
							$object->update($arr);
							$object->save();

							$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
							$created_at = $date->format('d-m-Y H:i:s');

							$partners = User::where('id', $object->id_partners)->first();
							$data_arr = [
								'so_du' => (int)$partners->so_du + (int)$vlue->amount,
							];
							$partners->update($data_arr);
							$partners->save();

							$txt = 'có text:' . $pattern . ' bên trong API TPBank:  ' . $subject;

							Telegram::sendMessage([
								'chat_id' => "1281282845",
								'parse_mode' => 'HTML',
								'text' => $txt
							]);

							$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
								. "<b>Đã Cộng Số Tiền: </b>\n"
								. number_format($vlue->amount, 0, '', ',') . "\n"
								. "<b> Tổng Cộng : </b>\n"
								. number_format($data_arr['so_du'], 0, '', ',') . "\n"
								. "<b> Cho Đối Tác  : </b>\n"
								. $partners->first_name . "\n"
								. "<b> Người Duyệt   : </b>\n"
								. "Cron Job: TPBank Ha88\n"
								. "<b> Cập Nhật Lúc : </b>\n"
								. $created_at;

							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => $text_content
							]);

						} else {
							// update Recharge
							$arr['trang_thai'] = 'cancel';
							$arr['comment_api'] = $subject;
							$object = Recharge::where('id', $re->id)->first();
							$object->update($arr);
							$object->save();

							$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
							$created_at = $date->format('d-m-Y H:i:s');
							$partners = User::where('id', $object->id_partners)->first();

							$txt = 'có text:' . $pattern . ' bên trong API TPBank:  ' . $subject;

							Telegram::sendMessage([
								'chat_id' => "1281282845",
								'parse_mode' => 'HTML',
								'text' => $txt
							]);

							$text_content = "<b>Cron Job TPBank Cập Nhật Nạp Tiền:</b>\n"
								. "<b>Số Tiền Yêu Cầu: </b>\n"
								. number_format($vlue->amount, 0, '', ',') . "\n"
								. "<b>Số Tiền Chuyển Khoản: </b>\n"
								. number_format($amount_tpbank, 0, '', ',') . "\n"
								. "<b> Không cộng tiền cho đối tác : </b>\n"
								. $partners->first_name . "\n"
								. "<b> Người Duyệt   : </b>\n"
								. "Cron Job: TPBank Ha88\n"
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

	public function updateRechargeTpbnk()
	{
		$listReApi = Recharge::orderBy('id', 'desc')->take(100)->get()->toArray();
		$api_data = \App\Models\TPBank::orderBy('id', 'desc')->take(100)->get()->toArray();

		if (count($api_data) > 0) {
			foreach ($listReApi as $res) {
				switch ($res['trang_thai']) {
					case 'success':
						$this->updateRechargeTpbnkSuccess($res, $api_data);
						break;
					case 'pending':
					case 'cancel':
					case 'confirm':
						$this->updateRechargeTpbnkNotSuccess($res, $api_data);
						break;
					default:
						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							'parse_mode' => 'HTML',
							'text' => 'updateRechargeTpbnk error'
						]);
						break;
				}
			}
		}
	}

	public function updateRechargeTpbnkSuccess($res, $api_data)
	{
		foreach ($api_data as $api) {
			$cleanString = preg_replace('/\s+/', '', $api['description']);

			if (empty($api['api']) && str_contains($cleanString, str_replace(' ', '', $res['comment']))) {
				$arr['api'] = $res['comment'];
				$obj = \App\Models\TPBank::find($api['id']);
				$obj->update($arr);
				$obj->save();
				$amount_tpbank = (int)$api['amount'];

				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$created_at = $date->format('d-m-Y H:i:s');

				//nap tien
				$obj2 = Recharge::where('comment', $res['comment'])->first();

				if (empty($obj2->comment_api)) {
					$arr['comment_api'] = $api['description'];
					$obj2->update($arr);

					$partners = User::find($obj2->id_partners);

					if ($partners && $api['description']) {
						$text_content = "<b>CRON TPBANK CẬP NHẬT API SAU KHI ADMIN CHẤP NHẬN THÀNH CÔNG:</b>\n"
							. "<b>Yêu Cầu: </b>\n"
							. number_format($obj2->amount, 0, '', ',') . "\n"
							. "<b>Chuyển Khoản: </b>\n"
							. number_format($amount_tpbank, 0, '', ',') . "\n"
							. "<b> KHÔNG CỘNG TIỀN CHO ĐỐI TÁC VÌ ADMIN ĐÃ XỬ LÝ RỒI : </b>\n"
							. $partners->first_name . "\n"
							. "<b> Binh Luan : </b>\n"
							. $api['description'] . "\n"
							. "<b> Người Duyệt   : </b>\n"
							. "Cron Job: TPBank Ha88\n"
							. "<b> Cập Nhật Lúc : </b>\n"
							. $created_at;

						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							'parse_mode' => 'HTML',
							'text' => $text_content
						]);
					} else {

						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							'parse_mode' => 'HTML',
							'text' => 'updateRechargeTpbnkSuccess error - partners or api : description'
						]);
					}
				}
			}
		}
	}

	public function updateRechargeTpbnkNotSuccess($res, $api_data)
	{
		foreach ($api_data as $api) {
			$cleanString = preg_replace('/\s+/', '', $api['description']);

			if (str_contains($cleanString, str_replace(' ', '', $res['comment']))) {
				$arr['api'] = $res['comment'];
				$obj = \App\Models\TPBank::find($api['id']);
				$obj->update($arr);

				//nap tien
				$obj2 = Recharge::where('comment', $res['comment'])->first();
				$amount_tpbank = (int)$api['amount'];
				$date = \Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$created_at = $date->format('d-m-Y H:i:s');

				// neu pending va chua co noi dung api
				if ($obj2->trang_thai == 'pending' && empty($obj2->comment_api)) {
					if ($amount_tpbank != $obj2->amount) {
						// update Recharge
						$arr['trang_thai'] = 'cancel';
						$arr['comment_api'] = $api['description'];
						$obj2->update($arr);

						$partners = User::find($obj2->id_partners);

						if ($partners && $api['description']) {
							$txt = 'có text:' . $res['text'] . ' bên trong API TPBank:  ' . $api['description'];

							Telegram::sendMessage([
								'chat_id' => "1281282845",
								'parse_mode' => 'HTML',
								'text' => $txt
							]);

							$text_content = "<b>CRON JOB TPBANK CẬP NHẬT NẠP TIỀN:</b>\n"
								. "<b>Yêu Cầu: </b>\n"
								. number_format($obj2->amount, 0, '', ',') . "\n"
								. "<b>Chuyển Khoản: </b>\n"
								. number_format($amount_tpbank, 0, '', ',') . "\n"
								. "<b> Không Cộng Tiền Cho Đối Tác : </b>\n"
								. $partners->first_name . "\n"
								. "<b> Người Duyệt   : </b>\n"
								. "Cron Job: TPBank Ha88\n"
								. "<b> Cập Nhật : </b>\n"
								. $created_at;

							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => $text_content
							]);
						} else {
							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => 'updateRechargeTpbnkNotSuccess : erro '
							]);
						}
					} else {
						// update Recharge
						$arr['trang_thai'] = 'success';
						$arr['comment_api'] = $api['description'];
						$arr['id'] = $res['id'];

						$obj2->update($arr);

						event(new SuccessCallBack($arr));

						$partners = User::find($obj2->id_partners);
						$data_arr = [
							'so_du' => (int)$partners->so_du + $amount_tpbank,
						];
						$partners->update($data_arr);
						$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
							. "<b>Đã Cộng Số Tiền: </b>\n"
							. number_format($amount_tpbank, 0, '', ',') . "\n"
							. "<b> Tổng Cộng : </b>\n"
							. number_format($data_arr['so_du'], 0, '', ',') . "\n"
							. "<b> Đối Tác  : </b>\n"
							. $partners->first_name . "\n"
							. "<b> Người Duyệt   : </b>\n"
							. "Cron Job: TPBank Ha88\n"
							. "<b> Cập Nhật : </b>\n"
							. $created_at;

						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							'parse_mode' => 'HTML',
							'text' => $text_content
						]);
					}
				}

				// neu cancel va chua co noi dung api
				if ($obj2->trang_thai == 'cancel' && empty($obj2->comment_api)) {
					if ($amount_tpbank == $obj2->amount) {
						// update Recharge
						$arr['trang_thai'] = 'cancel';
						$arr['comment_api'] = $api['description'];
						$arr['id'] = $res['id'];

						$obj2->update($arr);
						$obj2->save();

						$partners = User::find($obj2->id_partners);
						$data_arr = [
							'so_du' => (int)$partners->so_du + $amount_tpbank,
						];
						$partners->update($data_arr);

						event(new SuccessCallBack($arr));

						if ($partners && $data_arr['so_du']) {
							$text_content = "<b>NẠP TIỀN THÀNH CÔNG:</b>\n"
								. "<b>Đã Cộng Số Tiền: </b>\n"
								. number_format($amount_tpbank, 0, '', ',') . "\n"
								. "<b> Tổng Cộng : </b>\n"
								. number_format($data_arr['so_du'], 0, '', ',') . "\n"
								. "<b> Cho Đối Tác  : </b>\n"
								. $partners->first_name . "\n"
								. "<b> Người Duyệt   : </b>\n"
								. "Cron Job: TPBank Ha88\n"
								. "<b> Cập Nhật Lúc : </b>\n"
								. $created_at;

							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => $text_content
							]);

						} else {
							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => 'updateRechargeTpbnkNotSuccess : trang_thai - cancel '
							]);
						}
					}
					else // đúng noi dung , sai so tiền
					{
						// update Recharge
						$arr['trang_thai'] = 'cancel';
						$arr['comment_api'] = $api['description'];
						$obj2->update($arr);

						$partners = User::find($obj2->id_partners);
						$txt = 'có text:' . $res['text'] . ' bên trong API TPbank:  ' . $api['description'];

						Telegram::sendMessage([
							'chat_id' => "1281282845",
							'parse_mode' => 'HTML',
							'text' => $txt
						]);

						$text_content = "<b>CRON JOB TPBANK CẬP NHẬT YÊU CẦU NẠP TIỀN:</b>\n"
							. "<b>Yêu Cầu: </b>\n"
							. number_format($obj2->amount, 0, '', ',') . "\n"
							. "<b>Chuyển Khoản: </b>\n"
							. number_format($amount_tpbank, 0, '', ',') . "\n"
							. "<b> Không Cộng Tiền Cho Đối Tác : </b>\n"
							. $partners->first_name . "\n"
							. "<b> Binh Luan : </b>\n"
							. $api['description'] . "\n"
							. "<b> Người Duyệt   : </b>\n"
							. "Cron Job: TPBank Ha88\n"
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

	public function update2(Request $request)
	{
		$data = $request->all();

		$list = [
			'tpbank_username',
			'tpbank_password',
			'tpbank_debtorAccountNumber'

		];

		$arr = [];
		foreach ($data as $key => $val) {
			if (in_array($key, $list)) {
				$arr[$key] = $val;
			}
		}

		$object = System::where('id', 1001)->first();

		$object->update($arr);
		$object->save();

		return redirect()->intended('system');
	}

	public function doLogin()
	{
		$object = System::where('id', 1001)->first();
		$data['username'] = $object->tpbank_username;
		$data['password'] = $object->tpbank_password;
		$data['debtorAccountNumber'] = $object->tpbank_debtorAccountNumber;

		$tpbank = new TPBankHa();
		$get_imei = $tpbank->get_imei();
		$tpbank->setData($get_imei, "samsung");

		$login = $tpbank->doLogin();

		if (isset($login['access_token']) && $login['access_token']) {
			$tpbank->setToken($login['access_token'], $data['debtorAccountNumber']);

			return Response()->json('thanhcong');
		}
		return Response()->json('loi');
	}

	public function getInfo()
	{
		$tpbank = new TPBankHa();

		$data = $tpbank->getInfo();

		return $data;
	}

	public function getListBank()
	{
		$tpbank = new TPBankHa();

		$data = $tpbank->getListBank();

		return $data;
	}

	public function getDetails()
	{
		$tpbank = new TPBankHa();

		$data = $tpbank->getDetails();

		return $data;
	}

	public function getHistories()
	{
		$tpbank = new TPBankHa();

		$dt = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
		$to = $dt->format('Ymd');
		$from = $dt->subDays(7)->format('Ymd');

		return $tpbank->getHistories($to, $from);
	}
}
