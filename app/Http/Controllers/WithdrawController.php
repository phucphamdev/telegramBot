<?php

	namespace App\Http\Controllers;

	use App\DataTables\RechargeDataTable;
	use App\Models\Banks;
	use App\Models\Recharge;
	use App\Models\System;
	use App\Models\User;
	use Illuminate\Support\Str;
	use Illuminate\Support\Facades\Hash;
	use App\DataTables\WithdrawDataTable;
	use App\Models\Withdraw;
	use Illuminate\Http\Request;
	use SimpleSoftwareIO\QrCode\Facades\QrCode;
	use Telegram\Bot\Laravel\Facades\Telegram;
	use Yajra\DataTables\DataTables;
	use Carbon\Carbon;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;

	class WithdrawController extends Controller
	{

		public function index(WithdrawDataTable $dataTable)
		{
			$mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  index';
			Log::info($mess);

			return $dataTable->render('pages.withdraw.index');
		}

		public function withdraws()
		{
            $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  withdraws';
            Log::info($mess);

			return view('version2.withdraws');
		}

		public function pending_withdraw(WithdrawDataTable $dataTable)
		{
            $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  pending_withdraw';
            Log::info($mess);

			return $dataTable->render('pages.withdraw.pending_withdraw.index');
		}

		public function cancel_withdraw(WithdrawDataTable $dataTable)
		{
            $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  cancel_withdraw';
            Log::info($mess);

			return $dataTable->render('pages.withdraw.cancel_withdraw.index');
		}

		public function success_withdraw(WithdrawDataTable $dataTable)
		{
            $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  success_withdraw';
            Log::info($mess);

			return $dataTable->render('pages.withdraw.success_withdraw.index');
		}

		public function datatables_pending_withdraw()
		{

			$user_role = Auth::user()->role();
			if ($user_role == 'admin') {
				$datas = Withdraw::where('status', 'pending')->get();
			}

			if ($user_role == 'partner') {
				$datas = Withdraw::where('status', 'pending')->where('accessToken', Auth::user()->access_token())->orderBy('id', 'DESC')->get();
			}

			return Datatables::of($datas)
				->addColumn('action', function (Withdraw $datas) {
					return '<td class="text-end"><a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.getdetail') . '"
									onclick="getDetailWithdraw(event, this); return false;"
									class="btn btn-primary  detail" with="90px"
									data-bs-toggle="modal"
									data-bs-target="#kt_modalwithdraw">
									Cập Nhật
								</a></td>';
				})
				->editColumn('status', function (Withdraw $datas) {
					if ($datas->status == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning" >' . $datas->status . ' </span>';
					}

					if ($datas->status == 'success') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->status . ' </span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger">Close</span>';
					}
				})
				->editColumn('isBank', function (Withdraw $datas) {
					if ($datas->isBank == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning">GD qua Ví</span>';
					}

					if ($datas->isBank == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary">GD qua Ngân Hàng</span>';
					}

				})
				->editColumn('countdown', function (Withdraw $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('thoi_gian_tao_lenh', function (Withdraw $datas) {
					$countdown_system = "countdown_system_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown_system . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . ' </div>';

				})
				->editColumn('thoi_gian_thanh_cong', function (Withdraw $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_thanh_cong)) . ' </div>';
				})
				->editColumn('created_at', function (Withdraw $datas) {
					return date('d/m/Y H:m:s', strtotime($datas->created_at));
				})
				->editColumn('nameBank', function (Withdraw $datas) {
					foreach (DB::table('bankcodes')->get() as $bank) {
						if ($bank->code == $datas->bankCode) {
							return $bank->name;
						}
					}

					return $datas->bankCode;
				})
				->editColumn('amount', function (Withdraw $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->addColumn('partner_obj', function (Withdraw $datas) {
					$partner_obj = User::where('access_token', $datas->accessToken)->first();
					return $partner_obj->first_name;
				})
				->rawColumns([
					'action', 'created_at', 'thoi_gian_tao_lenh', 'trang_thai', 'countdown', 'status', 'isBank',
					'amount', 'partner_obj', 'nameBank'
				])
				->toJson();
		}

		public function datatables_cancel_withdraw()
		{

			$user_role = Auth::user()->role();
			if ($user_role == 'admin') {
				$datas = Withdraw::where('status', 'cancel')->get();
			}

			if ($user_role == 'partner') {
				$datas = Withdraw::where('status', 'cancel')->where('accessToken', Auth::user()->access_token())->orderBy('id', 'DESC')->get();
			}

			return Datatables::of($datas)
				->addColumn('action', function (Withdraw $datas) {
					return '<td class="text-end"><a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.getdetail') . '"
									onclick="getDetailWithdraw(event, this); return false;"
									class="btn btn-primary  detail" with="90px"
									data-bs-toggle="modal"
									data-bs-target="#kt_modalwithdraw">
									Cập Nhật
								</a></td>';
				})
				->editColumn('status', function (Withdraw $datas) {
					if ($datas->status == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning" >' . $datas->status . ' </span>';
					}

					if ($datas->status == 'success') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->status . ' </span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger">Close</span>';
					}
				})
				->editColumn('isBank', function (Withdraw $datas) {
					if ($datas->isBank == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning">GD qua Ví</span>';
					}

					if ($datas->isBank == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary">GD qua Ngân Hàng</span>';
					}

				})
				->editColumn('countdown', function (Withdraw $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('thoi_gian_tao_lenh', function (Withdraw $datas) {
					$countdown_system = "countdown_system_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown_system . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . ' </div>';

				})
				->editColumn('thoi_gian_thanh_cong', function (Withdraw $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_thanh_cong)) . ' </div>';
				})
				->editColumn('created_at', function (Withdraw $datas) {
					return date('d/m/Y H:m:s', strtotime($datas->created_at));
				})
				->editColumn('time', function (Withdraw $datas) {
					$countdown = "time_" . $datas->id;

					return '<input type="hidden"  name="' . $countdown . '" value="' . date('M d Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . '" ></input>';

				})
				->editColumn('nameBank', function (Withdraw $datas) {
					foreach (DB::table('bankcodes')->get() as $bank) {
						if ($bank->code == $datas->bankCode) {
							return $bank->name;
						}
					}

					return $datas->bankCode;
				})
				->editColumn('amount', function (Withdraw $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->addColumn('partner_obj', function (Withdraw $datas) {
					$partner_obj = User::where('access_token', $datas->accessToken)->first();
					return $partner_obj->first_name;
				})
				->rawColumns([
					'action', 'created_at', 'thoi_gian_tao_lenh', 'trang_thai', 'countdown', 'time', 'status', 'isBank',
					'amount', 'partner_obj', 'nameBank'
				])
				->toJson();
		}

		public function datatables_success_withdraw()
		{

			$user_role = Auth::user()->role();
			if ($user_role == 'admin') {
				$datas = Withdraw::where('status', 'success')->get();
			}

			if ($user_role == 'partner') {
				$datas = Withdraw::where('status', 'success')->where('accessToken', Auth::user()->access_token())->orderBy('id', 'DESC')->get();
			}

			return Datatables::of($datas)
				->addColumn('action', function (Withdraw $datas) {
					return '<td class="text-end"><a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.getdetail') . '"
									onclick="getDetailWithdraw(event, this); return false;"
									class="btn btn-primary  detail" with="90px"
									data-bs-toggle="modal"
									data-bs-target="#kt_modalwithdraw">
									Cập Nhật
								</a></td>';
				})
				->editColumn('status', function (Withdraw $datas) {
					if ($datas->status == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning" >' . $datas->status . ' </span>';
					}

					if ($datas->status == 'success') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->status . ' </span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger">Close</span>';
					}
				})
				->editColumn('isBank', function (Withdraw $datas) {
					if ($datas->isBank == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning">GD qua Ví</span>';
					}

					if ($datas->isBank == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary">GD qua Ngân Hàng</span>';
					}

				})
				->editColumn('countdown', function (Withdraw $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('thoi_gian_tao_lenh', function (Withdraw $datas) {
					$countdown_system = "countdown_system_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown_system . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . ' </div>';

				})
				->editColumn('thoi_gian_thanh_cong', function (Withdraw $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_thanh_cong)) . ' </div>';
				})
				->editColumn('created_at', function (Withdraw $datas) {
					return date('d/m/Y H:m:s', strtotime($datas->created_at));
				})
				->editColumn('time', function (Withdraw $datas) {
					$countdown = "time_" . $datas->id;

					return '<input type="hidden"  name="' . $countdown . '" value="' . date('M d Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . '" ></input>';

				})
				->editColumn('nameBank', function (Withdraw $datas) {
					foreach (DB::table('bankcodes')->get() as $bank) {
						if ($bank->code == $datas->bankCode) {
							return $bank->name;
						}
					}

					return $datas->bankCode;
				})
				->editColumn('amount', function (Withdraw $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->addColumn('partner_obj', function (Withdraw $datas) {
					$partner_obj = User::where('access_token', $datas->accessToken)->first();
					return $partner_obj->first_name;
				})
				->rawColumns([
					'action', 'created_at', 'thoi_gian_tao_lenh', 'trang_thai', 'countdown', 'time', 'status', 'isBank',
					'amount', 'partner_obj', 'nameBank'
				])
				->toJson();
		}

		public function index_withdraw_success(WithdrawDataTable $dataTable)
		{

			try {

				$user_role = Auth::user()->role();

				return $dataTable->render('pages.withdrawsuccess.index');

                $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  index_withdraw_success';
                Log::info($mess);


			} catch (\Exception $e) {
				// ghi log
				\Log::info("index_withdraw_success:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}

		public function apiIndex()
		{
			try {
				return response()->json([
					'data' => Withdraw::all(),
				]);

                $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  apiIndex';
                Log::info($mess);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("apiIndex:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}

		public function apiGetRechargeDetail($id)
		{

			try {

				return response()->json([
					'data' => Withdraw::where('id', $id)->first(),
				]);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("apiGetRechargeDetail:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}


		}

		public function create_withdraw(Request $request)
		{
			try {

				$data = $request->all();

				$list = [
					'bankCode',
					'cardName',
					'cardCode',
					'amount',
					'comment',
					'tranIDCallback',
					'urlCallback',
					'accessToken'
				];

				$arr = [];
				foreach ($data as $key => $val) {
					if (in_array($key, $list)) {
						$arr[$key] = $val;
					}
				}

				$arr['tranID'] = $arr['tranIDCallback'];

                if(!isset($arr['tranIDCallback']) ||  empty($arr['tranIDCallback']))
                {
                    $templatejson['tranID'] = $arr['tranID'];
                    $templatejson['accountNumber'] = $arr['cardCode'];
                    $templatejson['accountName'] = $arr['cardName'];
                    $templatejson['amount'] = $arr['amount'];
                    $templatejson['comment'] = $arr['comment'];
                    $templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
                    $templatejson['isBank'] = $arr['bankCode'] ? true : false;
                    $templatejson['bankCode'] = $arr['bankCode'];
                    $templatejson['status'] = 'cancel';

                    $result['errorCode'] = 404;
                    $result['errorDescription'] = "Error: tranIDCallback Null";
                    $result['errorData'] = $templatejson;

                    return response()->json($result);
                }

				$check = Withdraw::where('tranIDCallback', $arr['tranIDCallback'])->first();

				if ($arr['amount'] <= 0) {
					$templatejson['tranID'] = $arr['tranID'];
					$templatejson['accountNumber'] = $arr['cardCode'];
					$templatejson['accountName'] = $arr['cardName'];
					$templatejson['amount'] = $arr['amount'];
					$templatejson['comment'] = $arr['comment'];
					$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
					$templatejson['isBank'] = $arr['bankCode'] ? true : false;
					$templatejson['bankCode'] = $arr['bankCode'];
					$templatejson['status'] = 'cancel';

					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error amount > = 0";
					$result['errorData'] = $templatejson;

					return response()->json($result);
				}

				if (isset($check->tranIDCallback))
                {
					$templatejson['tranID'] = $arr['tranID'];
					$templatejson['accountNumber'] = $arr['cardCode'];
					$templatejson['accountName'] = $arr['cardName'];
					$templatejson['amount'] = $arr['amount'];
					$templatejson['comment'] = $arr['comment'];
					$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
					$templatejson['isBank'] = $arr['bankCode'] ? true : false;
					$templatejson['bankCode'] = $arr['bankCode'];
					$templatejson['status'] = 'cancel';

					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error tranIDCallback";
					$result['errorData'] = $templatejson;

					return response()->json($result);
				}

				if (isset($arr['accessToken']) && count($arr) > 0) {
					$check_user = User::where('access_token', $arr['accessToken'])->first();

					if (!isset($check_user)) {
						$templatejson['tranID'] = $arr['tranID'];
						$templatejson['accountNumber'] = $arr['cardCode'];
						$templatejson['accountName'] = $arr['cardName'];
						$templatejson['amount'] = $arr['amount'];
						$templatejson['comment'] = $arr['comment'];
						$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
						$templatejson['isBank'] = $arr['bankCode'] ? true : false;
						$templatejson['bankCode'] = $arr['bankCode'];
						$templatejson['status'] = 'cancel';

						$result['errorCode'] = 404;
						$result['errorDescription'] = "tài khoản không tồn tại";
						$result['errorData'] = $templatejson;

						return response()->json($result);

					} else {
						$phi = (int)($check_user->ck_bank) / 100 * (int)$arr['amount'];
						$total = (int)$phi + (int)$arr['amount'];

						if ($check_user->so_du > $total) {
							$data_arr = [
								'so_du' => (int)$check_user->so_du - $total,
							];

                            $arr['tranID'] = "tranID_" . Str::random(5) . time();

							$data_withdraw = [
								'bankCode' => $arr['bankCode'] ?? "No Data",
								'cardName' => $arr['cardName'] ?? "No Data",
								'cardCode' => $arr['cardCode'] ?? "No Data",
								'amount' => $arr['amount'] ?? "No Data",
								'comment' => $arr['comment'] ?? "No Data",
								'tranIDCallback' => $arr['tranIDCallback'] ?? "No Data",
								'urlCallback' => $arr['urlCallback'] ?? "No Data",
								'accessToken' => $arr['accessToken'] ?? "No Data",
								'errorCode' => 200,
								'errorDescription' => "No Data",
								'errorData' => "No Data",
								'tranID' => $arr['tranID'],
								'isBank' => isset($arr['bankCode']) ? 1 : 0,
								'status' => 'pending'
							];

							Withdraw::create($data_withdraw);

							$check_user = User::where('access_token', $arr['accessToken'])->first();
							$check_user->update($data_arr);
							$check_user->save();



							// logs_withdraw
							DB::table('logs_withdraw')->insert(
								[
									'type' => 'minus',
									'infor' => 'tru tien: ' . $total . ' vao tai doi tac.tong tien :' . $data_arr['so_du'],
									'player_id' => Auth::user()->id ?? 102,
									'tranIDCallback' => $arr['tranIDCallback'],
									'updated_at' => now(),
									'created_at' => now()
								]
							);

							$text = "<b>YÊU CẦU RÚT TIỀN - CẬP NHẬT SỐ DƯ ĐỐI TÁC:</b>\n"
								. "<b>Trừ Tiền: </b>\n"
								. number_format($total, 0, '', ',') . "\n"
								. "<b> Tiền Còn Lại : </b>\n"
								. number_format($data_arr['so_du'], 0, '', ',') . "\n"
								. "<b> Đối Tác  : </b>\n"
								. $check_user->first_name . "\n"
								. "<b> Người Gởi Yêu Cầu    : </b>\n"
								. $check_user->first_name . "\n"
								. "<b> Cập Nhật : </b>\n"
								. now() . "\n";

							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => $text
							]);
							//end logs_withdraw

							$templatejson['tranID'] = $arr['tranID'];
							$templatejson['accountNumber'] = $arr['cardCode'];
							$templatejson['accountName'] = $arr['cardName'];
							$templatejson['amount'] = $arr['amount'];
							$templatejson['comment'] = $arr['comment'];
							$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
							$templatejson['isBank'] = $arr['bankCode'] ? true : false;
							$templatejson['bankCode'] = $arr['bankCode'];
							$templatejson['status'] = 'pending';

							$result['errorCode'] = 200;
							$result['errorDescription'] = "Success";
							$result['errorData'] = $templatejson;

							return response()->json($result);
						} else {
							$templatejson['tranID'] = $arr['tranID'];
							$templatejson['accountNumber'] = $arr['cardCode'];
							$templatejson['accountName'] = $arr['cardName'];
							$templatejson['amount'] = $arr['amount'];
							$templatejson['comment'] = $arr['comment'];
							$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
							$templatejson['isBank'] = $arr['bankCode'] ? true : false;
							$templatejson['bankCode'] = $arr['bankCode'];
							$templatejson['status'] = 'cancel';

							$result['errorCode'] = 404;
							$result['errorDescription'] = "số dư không đủ dể rút tiền";
							$result['errorData'] = $templatejson;

							return response()->json($result);
						}
					}
				} else {
					$templatejson['tranID'] = $arr['tranID'];
					$templatejson['accountNumber'] = $arr['cardCode'];
					$templatejson['accountName'] = $arr['cardName'];
					$templatejson['amount'] = $arr['amount'];
					$templatejson['comment'] = $arr['comment'];
					$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
					$templatejson['isBank'] = $arr['bankCode'] ? true : false;
					$templatejson['bankCode'] = $arr['bankCode'];
					$templatejson['status'] = 'cancel';

					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error accessToken";
					$result['errorData'] = $templatejson;

					return response()->json($result);
				}


			} catch (\Exception $e) {
				// ghi log
				\Log::info("create_withdraw:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}

		}

		public function check_withdraw(Request $request)
		{
			try {

				$data = $request->all();

				$list = [
					'tranID',
					'accessToken'
				];

				$arr = [];
				foreach ($data as $key => $val) {
					if (in_array($key, $list)) {
						$arr[$key] = $val;
					}
				}

				if (isset($arr['accessToken']) && count($arr) > 0) {
					$check_user = User::where('access_token', $arr['accessToken'])->first();

					if (!isset($check_user)) {
						$result['errorCode'] = 404;
						$result['errorDescription'] = "Error accessToken";
						$result['errorData'] = [];

						return response()->json($result);
					} else {
						$check_withdraw = Withdraw::where('tranIDCallback', $arr['tranID'])->first();

						if (isset($check_withdraw)) {
							$templatejson['tranID'] = $check_withdraw['tranID'];
							$templatejson['accountNumber'] = $check_withdraw['cardCode'];
							$templatejson['accountName'] = $check_withdraw['cardName'];
							$templatejson['amount'] = $check_withdraw['amount'];
							$templatejson['comment'] = $check_withdraw['comment'];
							$templatejson['tranIDCallback'] = $check_withdraw['tranIDCallback'];
							$templatejson['isBank'] = $check_withdraw['isBank'];
							$templatejson['bankCode'] = $check_withdraw['bankCode'];
							$templatejson['status'] = $check_withdraw['status'];

							$result['errorCode'] = 200;
							$result['errorDescription'] = "Success";
							$result['errorData'] = $templatejson;


							return response()->json($result);
						}

						$result['errorCode'] = 404;
						$result['errorDescription'] = "Error tranID";
						$result['errorData'] = [];

						return response()->json($result);
					}
				} else {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error accessToken";
					$result['errorData'] = [];

					return response()->json($result);
				}

			} catch (\Exception $e) {
				// ghi log
				\Log::info("check_withdraw:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}

		public function create_withdraw_result()
		{
			try {


			} catch (\Exception $e) {
				// ghi log
				\Log::info("create_withdraw_result:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}

		public function datatables()
		{
			$user_role = Auth::user()->role();
			if ($user_role == 'admin') {
				$datas = Withdraw::orderBy('id', 'DESC');
			}

			if ($user_role == 'partner') {
				$datas = Withdraw::where('accessToken', Auth::user()->access_token())->orderBy('id', 'DESC')->get();
			}

			return Datatables::of($datas)
				->addColumn('action', function (Withdraw $datas) {
					return '<td class="text-end"><a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.getdetail') . '"
									onclick="getDetailWithdraw(event, this); return false;"
									class="btn btn-primary  detail" with="90px"
									data-bs-toggle="modal"
									data-bs-target="#kt_modalwithdraw">
									Cập Nhật
								</a></td>';
				})
				->editColumn('status', function (Withdraw $datas) {
					if ($datas->status == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning" >' . $datas->status . ' </span>';
					}

					if ($datas->status == 'success') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->status . ' </span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger">Close</span>';
					}
				})
				->editColumn('isBank', function (Withdraw $datas) {
					if ($datas->isBank == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning">GD qua Ví</span>';
					}

					if ($datas->isBank == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary">GD qua Ngân Hàng</span>';
					}

				})
				->editColumn('countdown', function (Withdraw $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('thoi_gian_tao_lenh', function (Withdraw $datas) {
					$countdown_system = "countdown_system_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown_system . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . ' </div>';

				})
				->editColumn('thoi_gian_thanh_cong', function (Withdraw $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_thanh_cong)) . ' </div>';
				})
				->editColumn('created_at', function (Withdraw $datas) {
					return date('d/m/Y H:m:s', strtotime($datas->created_at));
				})
				->editColumn('time', function (Withdraw $datas) {
					$countdown = "time_" . $datas->id;

					return '<input type="hidden"  name="' . $countdown . '" value="' . date('M d Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . '" ></input>';

				})
				->addColumn('nameBank', function (Withdraw $datas) {
					foreach (DB::table('bankcodes')->get() as $bank) {
						if ($bank->code == $datas->bankCode) {
							return $bank->name;
						}
					}

					return $datas->bankCode;
				})
				->editColumn('amount', function (Withdraw $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->addColumn('partner_obj', function (Withdraw $datas) {
					$partner_obj = User::where('access_token', $datas->accessToken)->first();
					return $partner_obj->first_name;
				})
				->rawColumns([
					'action', 'created_at', 'thoi_gian_tao_lenh', 'trang_thai', 'countdown', 'time', 'status', 'isBank',
					'amount', 'partner_obj', 'nameBank'
				])
				->toJson();
		}

		public function datatables_withdrawsuccess()
		{
			$datas = Withdraw::orderBy('id', 'DESC');
			$user_role = Auth::user()->role();

			if ($user_role == 'admin') {
				$datas = Withdraw::where('status', 'success')->orderBy('id', 'DESC');

			}

			if ($user_role == 'partner') {
				$datas = Withdraw::where('accessToken', Auth::user()->access_token)->where('status', 'success')->get();
			}

			return Datatables::of($datas)
				->addColumn('action', function (Withdraw $datas) {
					return '<td class="text-end"><a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.getdetail') . '"
									onclick="getDetailWithdraw(event, this); return false;"
									class="btn btn-primary  detail" with="90px"
									data-bs-toggle="modal"
									data-bs-target="#kt_modalwithdraw">
									Cập Nhật
								</a></td>';
				})
				->editColumn('status', function (Withdraw $datas) {
					if ($datas->status == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning" >' . $datas->status . ' </span>';
					}

					if ($datas->status == 'success') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->status . ' </span>';
					}

					if ($datas->status == 'cancel' && $datas->check_withdraws == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger">Close</span>';
					}
				})
				->editColumn('isBank', function (Withdraw $datas) {
					if ($datas->isBank == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning">GD qua Ví</span>';
					}

					if ($datas->isBank == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary">GD qua Ngân Hàng</span>';
					}

				})
				->editColumn('countdown', function (Withdraw $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('thoi_gian_tao_lenh', function (Withdraw $datas) {
					$countdown_system = "countdown_system_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown_system . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . ' </div>';

				})
				->editColumn('thoi_gian_thanh_cong', function (Withdraw $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_thanh_cong)) . ' </div>';
				})
				->editColumn('created_at', function (Withdraw $datas) {
					return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . date('d/m/Y H:m:s',
							strtotime($datas->created_at)) . '</span>';
				})
				->editColumn('time', function (Withdraw $datas) {
					$countdown = "time_" . $datas->id;

					return '<input type="hidden"  name="' . $countdown . '" value="' . date('M d Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . '" ></input>';

				})
				->editColumn('nameBank', function (Withdraw $datas) {
					foreach (DB::table('bankcodes')->get() as $bank) {
						if ($bank->code == $datas->bankCode) {
							return $bank->name;
						}
					}

					return $datas->bankCode;
				})
				->editColumn('amount', function (Withdraw $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->addColumn('partner_obj', function (Withdraw $datas) {
					$partner_obj = User::where('access_token', $datas->accessToken)->first();
					return $partner_obj->first_name;
				})
				->rawColumns([
					'action', 'created_at', 'thoi_gian_tao_lenh', 'trang_thai', 'countdown', 'time', 'status', 'isBank',
					'amount', 'partner_obj', 'nameBank'
				])
				->toJson();
		}

		public function getdetail(Request $request)
		{


			try {

				$data = $request->all();

				$data = Withdraw::where('id', $data['id'])->first();

				return response()->json($data);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("getdetail:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}

		public function create()
		{
			try {


			} catch (\Exception $e) {
				// ghi log
				\Log::info("create:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);
			}
		}

		public function store(Request $request)
		{
			try {
				Withdraw::create([
					'UUID' => "Withdraw_" . Str::random(30),
				]);

				return response()->json(true);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("store:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);
			}
		}

		public function show($id)
		{

			return Withdraw::where('id', $id)->first();
		}

		public function edit($id)
		{

			return Withdraw::where('id', $id)->first();
		}

		public function update(Request $request)
		{
			try {

				$data = $request->all();

				$list = [
					'id',
					'bankCode',
					'cardName',
					'cardCode',
					'amount',
					'comment',
					'tranIDCallback',
					'urlCallback',
					'accessToken',
					'errorCode',
					'errorDescription',
					'errorData',
					'tranID',
					'isBank',
					'status',
				];

				$arr = [];
				foreach ($data as $key => $val) {
					if (in_array($key, $list)) {
						$arr[$key] = $val;
					}
				}

				$object = Withdraw::where('id', $request->id)->first();

				$old_data = $object;

				if ($object->check_withdraws == 0) {
					if ($arr['status'] == 'cancel') {
						$check_user = User::where('access_token', $object->accessToken)->first();
						$user_role = Auth::user();
						$phi = (int)($check_user->ck_bank) / 100 * (int)$arr['amount'];
						$total = (int)$phi + (int)$arr['amount'];

						$data_arr = [
							'so_du' => (int)$check_user->so_du + $total
						];

						$check_user->update($data_arr);
						$check_user->save();

						$data_arr2 = [
							'check_withdraws' => 1
						];

						$object->update($data_arr2);
						$object->save();

						// logs_withdraw
						$user_role = Auth::user();


						DB::table('logs_withdraw')->insert(
							[
								'type' => 'add',
								'infor' => 'cong tien: ' . $total . ' vao tai doi tac vi khong chap nhan yeu cau rut tien nay. tong tien :' . $data_arr['so_du'],
								'player_id' => $user_role->id,
								'tranIDCallback' => $arr['tranIDCallback'],
								'updated_at' => now(),
								'created_at' => now()
							]
						);

						$text_content = "<b>Yêu Cầu Rút Tiền Đã Bị Từ Chối, Trả Tiền Lại Đối Tác , Yêu Cầu Hoàn Thành - Đóng Lại :</b>\n"
							. "<b>Cộng Số Tiền: </b>\n"
							. number_format($total, 0, '', ',') . "\n"
							. "<b> Tổng Cộng Tiền : </b>\n"
							. number_format($data_arr['so_du'], 0, '', ',') . "\n"
							. "<b> Đối Tác  : </b>\n"
							. "$check_user->first_name\n"
							. "<b> Người Duyệt   : </b>\n"
							. "$user_role->first_name\n"
							. "<b> Cập Nhật Lúc : </b>\n"
							. now();

						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							'parse_mode' => 'HTML',
							'text' => $text_content
						]);

						//end logs_withdraw

						$arr['check_withdraws'] = 1;

						$object = Withdraw::where('id', $request->id)->first();
						$object->update($arr);
						$object->save();
					}
				} else {
					if ($arr['status'] == 'cancel') {
						$check_user = User::where('access_token', $object->accessToken)->first();
						$user_role = Auth::user();
						$phi = (int)($check_user->ck_bank) / 100 * (int)$arr['amount'];
						$total = (int)$phi + (int)$arr['amount'];

						$data_arr = [
							'so_du' => (int)$check_user->so_du
						];

						$data_arr2 = [
							'check_withdraws' => 1
						];

						$object->update($data_arr2);
						$object->save();

						// logs_withdraw
						$user_role = Auth::user();

						DB::table('logs_withdraw')->insert(
							[
								'type' => 'cancel - 2',
								'infor' => 'cong tien: ' . $total . ' vao tai doi tac vi khong chap nhan yeu cau rut tien nay. tong tien :' . $data_arr['so_du'],
								'player_id' => $user_role->id,
								'tranIDCallback' => $arr['tranIDCallback'],
								'updated_at' => now(),
								'created_at' => now()
							]
						);

						$text_content = "<b>RÚT TIỀN ĐÃ BỊ TỪ CHỐI -  KHÔNG CỘNG TIỀN ĐỐI TÁC VÌ YÊU CẦU NÀY ĐÃ HOÀN THÀNH:</b>\n"
							. "<b> SỐ DƯ  : </b>\n"
							. number_format($data_arr['so_du'], 0, '', ',') . "\n"
							. "<b> ĐỐI TÁC   : </b>\n"
							. "$check_user->first_name\n"
							. "<b> NGƯỜI DUYỆT   : </b>\n"
							. "$user_role->first_name\n"
							. "<b> CẬP NHẬT : </b>\n"
							. now();

						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
							'parse_mode' => 'HTML',
							'text' => $text_content
						]);

						//end logs_withdraw

						$arr['check_withdraws'] = 1;

						$object = Withdraw::where('id', $request->id)->first();
						$object->update($arr);
						$object->save();
					}
				}

				if ($arr['status'] == 'pending') {
					$check_user = User::where('access_token', $object->accessToken)->first();
					$user_role = Auth::user();
					$phi = (int)($check_user->ck_bank) / 100 * (int)$arr['amount'];
					$total = (int)$phi + (int)$arr['amount'];

					$text_content = "<b>Yêu Cầu Rút Tiền Đã Cập Nhật Pending :</b>\n"
						. "<b> tranID  : </b>\n"
						. $arr['tranID'] . "\n"
						. "<b> comment  : </b>\n"
						. $arr['comment'] . "\n"
						. "<b> amount  : </b>\n"
						. $arr['amount'] . "\n"
						. "<b> cardCode  : </b>\n"
						. $arr['cardCode'] . "\n"
						. "<b> cardName  : </b>\n"
						. $arr['cardName'] . "\n"
						. "<b> Người Duyệt   : </b>\n"
						. "$user_role->first_name\n"
						. "<b> Cập Nhật Lúc : </b>\n"
						. now();

					Telegram::sendMessage([
						'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
						'parse_mode' => 'HTML',
						'text' => $text_content
					]);

					$arr['check_withdraws'] = 1;

					$object = Withdraw::where('id', $request->id)->first();
					$object->update($arr);
					$object->save();
				}

				if ($arr['status'] == 'success') {
					$check_user = User::where('access_token', $object->accessToken)->first();
					$user_role = Auth::user();
					$phi = (int)($check_user->ck_bank) / 100 * (int)$arr['amount'];
					$total = (int)$phi + (int)$arr['amount'];

					$text_content = "<b>RÚT TIỀN THÀNH CÔNG:</b>\n"
						. "<b>TRỪ TIỀN ĐỐI TÁC   : </b>\n"
						. number_format($arr['amount'], 0, '', ',') . "\n"
						. "<b> PHÍ ( GD)  : </b>\n"
						. number_format($phi, 0, '', ',') . "\n"
						. "<b> TỔNG CỘNG  : </b>\n"
						. number_format($total, 0, '', ',') . "\n"
						. "<b> ĐỐI TÁC : </b>\n"
						. $check_user->first_name . "\n"
						. "<b> CÒN LẠI  : </b>\n"
						. number_format($check_user->so_du, 0, '', ',') . "\n"
						. "<b> NGƯỜI DUYỆT   : </b>\n"
						. "$user_role->first_name\n"
						. "<b> CẬP NHẬT  : </b>\n"
						. now();

					Telegram::sendMessage([
						'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
						'parse_mode' => 'HTML',
						'text' => $text_content
					]);

					$arr['check_withdraws'] = 1;

					$object = Withdraw::where('id', $request->id)->first();
					$object->update($arr);
					$object->save();
				}

				$object = Withdraw::where('id', $request->id)->first();
				$object->update($arr);
				$object->save();


				$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
				//user
				$data_logs['id_user'] = Auth::user()->id();
				$data_logs['created_at'] = $created_at;
				$data_logs['updated_at'] = $created_at;
				//user
				$data_logs['type'] = 'Update Withdraw';
				// data old
				$data_logs['old'] = json_encode($old_data);
				// data new
				$data_logs['new'] = json_encode($arr);
				// add logs
				DB::table('logs_profile')->insert($data_logs);

				return response()->json(true);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("update:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);
			}
		}

		public function destroy(Request $request)
		{
			try {

				$arr = $request->all();
				$data = Withdraw::where('id', $arr['id'])->first();
				if (isset($data)) {

					$data->delete();
				} else {
					return response()->json(false);
				}

				return response()->json(true);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("destroy:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}

		// withdraw_callback
		public function index_callback(WithdrawDataTable $dataTable)
		{
			return $dataTable->render('pages.withdraw_callback.index');
		}

		public function datatables_callback()
		{
			$datas = Withdraw::where('withdraws_callback', true)->orderBy('id', 'DESC');

			return Datatables::of($datas)
				->addColumn('action', function (Withdraw $datas) {
					return '<td class="text-end">
								<a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.getdetail') . '"
									onclick="getDetailWithdraw(event, this); return false;"
									class="btn btn-primary  detail" with="90px"
									data-bs-toggle="modal"
									data-bs-target="#kt_modalwithdraw">
									View
								</a>
								<a
									data-id="' . $datas->id . '"
									data-url="' . route('withdraw.destroy', $datas->id) . '"
									onclick="getDeleteWithdraw(event, this); return false;"
									class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
						</td>';
				})
				->editColumn('status', function (Withdraw $datas) {
					if ($datas->status == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning" >' . $datas->status . ' </span>';
					}

					if ($datas->status == 'success') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}

					if ($datas->status == 'cancel') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->status . ' </span>';
					}
				})
				->editColumn('isBank', function (Withdraw $datas) {
					if ($datas->isBank == 0) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning">GD qua Ví</span>';
					}

					if ($datas->isBank == 1) {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary">GD qua Ngân Hàng</span>';
					}

				})
				->editColumn('countdown', function (Withdraw $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('thoi_gian_tao_lenh', function (Withdraw $datas) {
					$countdown_system = "countdown_system_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown_system . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . ' </div>';

				})
				->editColumn('thoi_gian_thanh_cong', function (Withdraw $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d/m/Y H:m:s',
							strtotime($datas->thoi_gian_thanh_cong)) . ' </div>';
				})
				->editColumn('created_at', function (Withdraw $datas) {
					return date('d/m/Y H:m:s', strtotime($datas->created_at));
				})
				->editColumn('time', function (Withdraw $datas) {
					$countdown = "time_" . $datas->id;

					return '<input type="hidden"  name="' . $countdown . '" value="' . date('M d Y H:m:s',
							strtotime($datas->thoi_gian_tao_lenh)) . '" ></input>';

				})
				->rawColumns([
					'action', 'created_at', 'thoi_gian_tao_lenh', 'trang_thai', 'countdown', 'time', 'status', 'isBank'
				])
				->toJson();
		}

		public function show_callback($id)
		{
			return Withdraw::where('id', $id)->first();
		}

		public function edit_callback($id)
		{
			return Withdraw::where('id', $id)->first();
		}

		public function update_callback()
		{
			//
		}

		public function getdetail_callback(Request $request)
		{
			try {

				$data = $request->all();

				$data = Withdraw::where('id', $data['id'])->first();

				return response()->json($data);

			} catch (\Exception $e) {
				// ghi log
				\Log::info("getdetail_callback:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}
		}
		// end withdraw_callback


		// start withdraw_submit

		public function index_withdraw_submit()
		{
			$bankcodes = DB::table('bankcodes')->get();
			$user = Auth::user();

			return view('pages.withdraw_submit.index', compact('user', 'bankcodes'));
		}

		public function create_withdraw_submit(Request $request)
		{
			try {


				$data = $request->all();

				$list = [
					'bankCode',
					'cardName',
					'cardCode',
					'amount',
					'comment',
					'tranIDCallback',
					'urlCallback',
					'accessToken'
				];

				$arr = [];
				foreach ($data as $key => $val) {
					if (in_array($key, $list)) {
						$arr[$key] = $val;
					}
				}

                $arr['tranID'] = $arr['tranIDCallback'];

				$check = Withdraw::where('tranIDCallback', $arr['tranIDCallback'])->first();

				if (isset($check) && $check->tranIDCallback) {
					$templatejson['tranID'] = $arr['tranID'];
					$templatejson['accountNumber'] = $arr['cardCode'];
					$templatejson['accountName'] = $arr['cardName'];
					$templatejson['amount'] = $arr['amount'];
					$templatejson['comment'] = $arr['comment'];
					$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
					$templatejson['isBank'] = $arr['bankCode'] ? true : false;
					$templatejson['bankCode'] = $arr['bankCode'];
					$templatejson['status'] = 'cancel';

					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error tranIDCallback";
					$result['errorData'] = $templatejson;

					return response()->json($result);
				}

				if (isset($arr['accessToken']) && count($arr) > 0) {
					$check_user = User::where('access_token', $arr['accessToken'])->first();

					if (!isset($check_user)) {
						$templatejson['tranID'] = $arr['tranID'];
						$templatejson['accountNumber'] = $arr['cardCode'];
						$templatejson['accountName'] = $arr['cardName'];
						$templatejson['amount'] = $arr['amount'];
						$templatejson['comment'] = $arr['comment'];
						$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
						$templatejson['isBank'] = $arr['bankCode'] ? true : false;
						$templatejson['bankCode'] = $arr['bankCode'];
						$templatejson['status'] = 'cancel';

						$result['errorCode'] = 404;
						$result['errorDescription'] = "tài khoản không tồn tại";
						$result['errorData'] = $templatejson;

						return response()->json($result);

					} else {
						$phi = (int)($check_user->ck_bank) / 100 * (int)$arr['amount'];
						$total = (int)$phi + (int)$arr['amount'];

						if ($check_user->so_du > $total) {
							$data_arr = [
								'so_du' => (int)$check_user->so_du - $total,
							];

                            $arr['tranID'] = "tranID_" . Str::random(5) . time();

							$data_withdraw = [
								'bankCode' => $arr['bankCode'] ?? "No Data",
								'cardName' => $arr['cardName'] ?? "No Data",
								'cardCode' => $arr['cardCode'] ?? "No Data",
								'amount' => $arr['amount'] ?? "No Data",
								'comment' => $arr['comment'] ?? "No Data",
								'tranIDCallback' => $arr['tranIDCallback'] ?? "No Data",
								'urlCallback' => $arr['urlCallback'] ?? "No Data",
								'accessToken' => $arr['accessToken'] ?? "No Data",
								'errorCode' => 200,
								'errorDescription' => "No Data",
								'errorData' => "No Data",
								'tranID' => $arr['tranID'],
								'isBank' => isset($arr['bankCode']) ? 1 : 0,
								'status' => 'pending'
							];

							Withdraw::create($data_withdraw);

							$check_user = User::where('access_token', $arr['accessToken'])->first();
							$check_user->update($data_arr);
							$check_user->save();

                            $mess = "User :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/(Withdraw) - method:  create_withdraw_submit';
                            Log::info($mess);

							// logs_withdraw
							DB::table('logs_withdraw')->insert(
								[
									'type' => 'minus',
									'infor' => 'tru tien: ' . $total . ' vao tai doi tac.tong tien :' . $data_arr['so_du'],
									'player_id' => Auth::user()->id ?? 102,
									'tranIDCallback' => $arr['tranIDCallback'],
									'updated_at' => now(),
									'created_at' => now()
								]
							);

							$text = "<b>YÊU CẦU RÚT TIỀN - CẬP NHẬT SỐ DƯ ĐỐI TÁC:</b>\n"
								. "<b>Trừ Tiền: </b>\n"
								. $total . "\n"
								. "<b> Tiền Còn Lại : </b>\n"
								. $data_arr['so_du'] . "\n"
								. "<b> Đối Tác  : </b>\n"
								. $check_user->first_name . "\n"
								. "<b> Người Gởi Yêu Cầu    : </b>\n"
								. $check_user->first_name . "\n"
								. "<b> Cập Nhật : </b>\n"
								. now() . "\n";

							Telegram::sendMessage([
								'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
								'parse_mode' => 'HTML',
								'text' => $text
							]);
							//end logs_withdraw

							$templatejson['tranID'] = $arr['tranID'];
							$templatejson['accountNumber'] = $arr['cardCode'];
							$templatejson['accountName'] = $arr['cardName'];
							$templatejson['amount'] = $arr['amount'];
							$templatejson['comment'] = $arr['comment'];
							$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
							$templatejson['isBank'] = $arr['bankCode'] ? true : false;
							$templatejson['bankCode'] = $arr['bankCode'];
							$templatejson['status'] = 'pending';

							$result['errorCode'] = 200;
							$result['errorDescription'] = "Success";
							$result['errorData'] = $templatejson;

							return response()->json($result);
						} else {
							$templatejson['tranID'] = $arr['tranID'];
							$templatejson['accountNumber'] = $arr['cardCode'];
							$templatejson['accountName'] = $arr['cardName'];
							$templatejson['amount'] = $arr['amount'];
							$templatejson['comment'] = $arr['comment'];
							$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
							$templatejson['isBank'] = $arr['bankCode'] ? true : false;
							$templatejson['bankCode'] = $arr['bankCode'];
							$templatejson['status'] = 'cancel';

							$result['errorCode'] = 404;
							$result['errorDescription'] = "số dư không đủ dể rút tiền";
							$result['errorData'] = $templatejson;

							return response()->json($result);
						}
					}
				} else {
					$templatejson['tranID'] = $arr['tranID'];
					$templatejson['accountNumber'] = $arr['cardCode'];
					$templatejson['accountName'] = $arr['cardName'];
					$templatejson['amount'] = $arr['amount'];
					$templatejson['comment'] = $arr['comment'];
					$templatejson['tranIDCallback'] = $arr['tranIDCallback'];;
					$templatejson['isBank'] = $arr['bankCode'] ? true : false;
					$templatejson['bankCode'] = $arr['bankCode'];
					$templatejson['status'] = 'cancel';

					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error accessToken";
					$result['errorData'] = $templatejson;

					return response()->json($result);
				}

			} catch (\Exception $e) {
				// ghi log
				\Log::info("create_withdraw_submit:" . json_encode($e));

				// tra json bao loi
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);

			}

		}

		public function datatables_withdraw_submit()
		{
			//
		}

		public function show_withdraw_submit()
		{
			//
		}

		public function edit_withdraw_submit()
		{
			//
		}


		public function update_withdraw_submit()
		{
			//
		}

		public function getdetail_withdraw_submit()
		{
			//
		}

		public function destroy_withdraw_submit()
		{
			//
		}


		// end withdraw_submit
	}
