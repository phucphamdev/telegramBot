<?php

namespace App\Http\Controllers;

use App\Core\Adapters\Theme;
use App\DataTables\RechargeDataTable;
use App\DataTables\RechargeDataFilterTableDataTable;
use App\Events\SuccessCallBack;
use App\Models\Banks;
use App\Models\Recharge;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpseclib3\File\ASN1\Maps\CountryName;
use Telegram\Bot\Laravel\Facades\Telegram;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;


class RechargeController extends Controller
{
	// recharge
	public function index(RechargeDataTable $dataTable)
	{
		$user = Auth::user();
		\Log::info("User Name: {$user->first_name} / ID: {$user->id} / Action: Recharge All");

		return $dataTable->render('pages.recharge.index');
	}

	public function index_recharge_success(RechargeDataTable $dataTable)
	{
		$user = Auth::user();
		$user_role = $user->role();

		if ($user_role == 'admin') {
			return $dataTable->render('pages.rechargesuccess.index');
		}

		\Log::info("User Name: {$user->first_name} / ID: {$user->id} / Action: index_recharge_success");

		return $dataTable->render('pages.rechargesuccess.index');

	}

	public function datatables()
	{
		if (Auth::user()->role() == 'admin') {
			$datas = Recharge::orderBy('id', 'DESC')->take(150)->get();
		} else {
			$datas = Recharge::where('id_partners', Auth::user()->id())->orderBy('id', 'DESC')->take(150)->get();
		}

		return Datatables::of($datas)
			->addColumn('action', function (Recharge $datas) {
				return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
			})
			->editColumn('trang_thai', function (Recharge $datas) {
				$badgeClass = '';
				switch ($datas->trang_thai) {
					case 'pending':
						$badgeClass = 'badge-light-warning';
						break;
					case 'cancel':
						$badgeClass = 'badge-light-danger';
						break;
					case 'confirm':
						$badgeClass = 'badge-light-warning';
						break;
					default:
						$badgeClass = 'badge-light-primary';
						break;
				}

				return '<span class="badge py-3 px-4 fs-7 ' . $badgeClass . '"> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->editColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->value('first_name');

				return $temp;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->value('email');

				return $temp;
			})
			->editColumn('countdown', function (Recharge $datas) {
				$countdown = "timeresult_" . $datas->id;
				return '<div id="' . $countdown . '" > </div>';
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . $timeadd . ' </div>';
			})
			->editColumn('time', function (Recharge $datas) {
				$countdown = "time_" . $datas->id;

				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<input type="hidden"  name="' . $countdown . '" value="' . $timeadd . '" ></input>';

			})
			->editColumn('bankcode', function (Recharge $datas) {
				$bank = DB::table('bankcodes')->where('code', $datas->bankcode)->first();

				if ($bank) {
					return $bank->name;
				}

				return $datas->bankcode;
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'countdown', 'time',
				'amount', 'bankcode', 'status', 'cronjob'
			])
			->toJson();
	}

	public function datatables_today()
	{
//		$datas = Recharge::whereDate('created_at', Carbon::today())
//			->where('trang_thai','success')
//			->orderBy('id', 'desc')->get();

		$datas = Recharge::whereDate('created_at', Carbon::today())
			->orderBy('id', 'desc')->take(100)->get();

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}


				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->editColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . $timeadd . ' </div>';
			})
			->editColumn('bankcode', function (Recharge $datas) {
				foreach (DB::table('bankcodes')->get() as $bank) {
					if ($bank->code == $datas->bankcode) {
						return $bank->name;
					}
				}

				return $datas->bankcode;
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'bankcode', 'status', 'cronjob'
			])
			->toJson();

	}

	public function datatables_week()
	{
		$datas = Recharge::whereDate('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())
			->where('trang_thai', 'success')
			->orderBy('id', 'desc')->take(100)->get();

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}


				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->editColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . $timeadd . ' </div>';
			})
			->editColumn('bankcode', function (Recharge $datas) {
				foreach (DB::table('bankcodes')->get() as $bank) {
					if ($bank->code == $datas->bankcode) {
						return $bank->name;
					}
				}

				return $datas->bankcode;
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'bankcode', 'status', 'cronjob'
			])
			->toJson();

	}

	public function datatables_month()
	{
		$datas = Recharge::whereDate('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
			->where('trang_thai', 'success')
			->orderBy('id', 'desc')->take(100)->get();

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}


				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->editColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . $timeadd . ' </div>';
			})
			->editColumn('bankcode', function (Recharge $datas) {
				foreach (DB::table('bankcodes')->get() as $bank) {
					if ($bank->code == $datas->bankcode) {
						return $bank->name;
					}
				}

				return $datas->bankcode;
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'bankcode', 'status', 'cronjob'
			])
			->toJson();

	}

	public function datatables_api()
	{
		$datas = Recharge::whereDate('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())
			->whereNotNull('comment_api')
			->orderBy('id', 'desc')->take(100)->get();

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}


				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->editColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . $timeadd . ' </div>';
			})
			->editColumn('bankcode', function (Recharge $datas) {
				foreach (DB::table('bankcodes')->get() as $bank) {
					if ($bank->code == $datas->bankcode) {
						return $bank->name;
					}
				}

				return $datas->bankcode;
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'bankcode', 'status', 'cronjob'
			])
			->toJson();

	}

	public function datatables_recharge_success()
	{

		$user_role = Auth::user()->role();

		if ($user_role == 'admin') {
			$datas = Recharge::where('trang_thai', 'success')->take(100)->get();

			return Datatables::of($datas)
				->addColumn('action', function (Recharge $datas) {
					return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge_success.getdetail_recharge_success') . '"
								onclick="getDetail(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
				})
				->editColumn('trang_thai', function (Recharge $datas) {
					if ($datas->trang_thai == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
					}

					if ($datas->trang_thai == 'cancel') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
					}


					if ($datas->trang_thai == 'confirm') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
					}

					return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
				})
				->editColumn('status', function (Recharge $datas) {
					return $datas->trang_thai;
				})
				->editColumn('cronjob', function (Recharge $datas) {
					return $datas->cronjob;
				})
				->addColumn('partners', function (Recharge $datas) {
					$temp = DB::table('users')->where('id', $datas->id_partners)->first();

					return $temp->first_name;
				})
				->editColumn('partners_email', function (Recharge $datas) {
					$temp = DB::table('users')->where('id', $datas->id_partners)->first();

					return $temp->email;
				})
				->editColumn('created_at', function (Recharge $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
							strtotime($datas->created_at)) . ' </div>';
				})
				->editColumn('amount', function (Recharge $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->rawColumns([
					'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'status', 'cronjob'
				])
				->toJson();
		}

		if ($user_role == 'partner') {
			$datas = Recharge::where('id_partners', Auth::user()->id)
				->where('trang_thai', 'success')
				->orderBy('id', 'DESC')
				->take(100)->get();

			return Datatables::of($datas)
				->addColumn('action', function (Recharge $datas) {
					return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
				})
				->editColumn('trang_thai', function (Recharge $datas) {
					if ($datas->trang_thai == 'pending') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
					}

					if ($datas->trang_thai == 'cancel') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
					}


					if ($datas->trang_thai == 'confirm') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
					}

					return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
				})
				->editColumn('status', function (Recharge $datas) {
					return $datas->trang_thai;
				})
				->editColumn('cronjob', function (Recharge $datas) {
					return $datas->cronjob;
				})
				->addColumn('partners', function (Recharge $datas) {
					$temp = DB::table('users')->where('id', $datas->id_partners)->first();

					return $temp->first_name;
				})
				->editColumn('partners_email', function (Recharge $datas) {
					$temp = DB::table('users')->where('id', $datas->id_partners)->first();

					return $temp->email;
				})
				->editColumn('countdown', function (Recharge $datas) {
					$countdown = "timeresult_" . $datas->id;
					return '<div id="' . $countdown . '" > </div>';
				})
				->editColumn('created_at', function (Recharge $datas) {
					$countdown = "countdown_" . $datas->id;
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
							strtotime($datas->created_at)) . ' </div>';
				})
				->editColumn('time', function (Recharge $datas) {
					$countdown = "time_" . $datas->id;

					return '<input type="hidden"  name="' . $countdown . '" value="' . date('d-m-Y H:i:s',
							strtotime($datas->created_at)) . '" ></input>';

				})
				->editColumn('amount', function (Recharge $datas) {
					return number_format($datas->amount, 0, '', ',');
				})
				->rawColumns([
					'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'countdown', 'time',
					'amount', 'status', 'cronjob'
				])
				->toJson();
		}
	}

	public function recharge_cancel(RechargeDataTable $dataTable)
	{
		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action:  recharge_cancel');

		return $dataTable->render('pages.recharge_cancel.index');
	}

	public function cancel_recharge(RechargeDataTable $dataTable)
	{
		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action:  cancel_recharge');

		return $dataTable->render('pages.recharge.cancel_recharge.index');
	}

	public function success_recharge(RechargeDataTable $dataTable)
	{
		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action:  success_recharge');


		return $dataTable->render('pages.recharge.success_recharge.index');
	}

	public function pending_recharge(RechargeDataTable $dataTable)
	{
		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action:  pending_recharge');

		return $dataTable->render('pages.recharge.pending_recharge.index');
	}

	public function datatables_cancel_recharge()
	{
		if (Auth::user()->role() == 'admin') {
			$datas = Recharge::where('trang_thai', 'cancel')->orderBy('id', 'DESC')->take(150)->get();
		} else {
			$datas = Recharge::where('trang_thai', 'cancel')->where('id_partners', Auth::user()->id())->orderBy('id', 'DESC')->take(150)->get();
		}

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}


				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->addColumn('action', function (Recharge $datas) {
				return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->addColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
						strtotime($datas->created_at)) . ' </div>';
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'status', 'cronjob'
			])
			->toJson();
	}

	public function datatables_pending_recharge()
	{
		//$datas = Recharge::where('trang_thai', 'pending')->take(100)->get();
		if (Auth::user()->role() == 'admin') {
			$datas = Recharge::where('trang_thai', 'pending')->take(100)->get();
		} else {
			$datas = Recharge::where('trang_thai', 'pending')->where('id_partners', Auth::user()->id())->orderBy('id', 'DESC')->take(100)->get();
		}

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}


				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}

				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->addColumn('action', function (Recharge $datas) {
				return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->addColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
						strtotime($datas->created_at)) . ' </div>';
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'status', 'cronjob'
			])
			->toJson();
	}

	public function datatables_success_recharge()
	{
		//$datas = Recharge::where('trang_thai', 'success')->take(100)->get();
		if (Auth::user()->role() == 'admin') {
			$datas = Recharge::where('trang_thai', 'success')->take(100)->get();
		} else {
			$datas = Recharge::where('trang_thai', 'success')->where('id_partners', Auth::user()->id())->orderBy('id', 'DESC')->take(100)->get();
		}

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->addColumn('action', function (Recharge $datas) {
				return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->addColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
						strtotime($datas->created_at)) . ' </div>';
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'status', 'cronjob'
			])
			->toJson();
	}

	public function datatables_recharge_cancel()
	{
		$datas = Recharge::where('trang_thai', 'cancel')->whereNotNull('comment_api')->take(100)->get();

		return Datatables::of($datas)
			->editColumn('trang_thai', function (Recharge $datas) {
				if ($datas->trang_thai == 'pending') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'cancel') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-danger"> ' . $datas->trang_thai . '</span>';
				}
				if ($datas->trang_thai == 'confirm') {
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
				}
				return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->addColumn('action', function (Recharge $datas) {
				return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->addColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->first_name;
			})
			->editColumn('partners_email', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->first();

				return $temp->email;
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
						strtotime($datas->created_at)) . ' </div>';
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'partners_email', 'created_at', 'trang_thai', 'amount', 'status', 'cronjob'
			])
			->toJson();
	}

	public function getdetail(Request $request)
	{
		try {

			$data = $request->all();

			$data = Recharge::where('id', $data['id'])->first();

			\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action:  getdetail');

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

	public function create_recharge(Request $request)
	{
		try {

			$data = $request->all();

			$list = [
				'kind',
				'name',
				'key',
				'tranID',
				'type',
				'bankCode',
				'amount',
				'size',
				'accessToken',
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			if (
				isset($arr['kind']) &&
				isset($arr['name']) &&
				isset($arr['key']) &&
				isset($arr['tranID']) &&
				isset($arr['type']) &&
				isset($arr['bankCode']) &&
				isset($arr['amount']) &&
				isset($arr['size']) &&
				isset($arr['accessToken'])
			) {
				$check_user_key = User::where('key', $arr['key'])->first();
				$check_user_access_token = User::where('access_token', $arr['accessToken'])->first();


				if (!isset($check_user_key) || !isset($check_user_access_token)) {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key error or  access_token error ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}

				if ($arr['amount'] <= 9000) {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "So Tien Nap Phai Lon Hon Khong ( amount > 9.000 vnd )!!";
					$result['errorData'] = [];

					return response()->json($result);
				}

				if ($check_user_key->id == $check_user_access_token->id) {
					$check_user = User::where('key', $arr['key'])->first();

					if (isset($check_user) && $check_user->id) {
						// check tranID
						$list_recha = Recharge::where('id_partners', $check_user->id)
							->where('tranID', $arr['tranID'])
							->get();

						if (count($list_recha) == 0) {
							if ($check_user->access_token == $arr['accessToken'] && isset($check_user->access_token)) {
								// list ngan hang
								$bank_list = DB::table('banks')
									->where('id_partners', $check_user->id)
									->where('trang_thai', 'active')
									->get();
								if (count($bank_list) > 0) {
									foreach ($bank_list as $bank) {
										if (isset($bank) && $bank->bankcode == $arr['bankCode']) {
											// luu vao he thong
											$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
											$created_at = $date->format('d-m-Y H:i:s');
											$tranID = $arr['tranID']; // lây từ đối tác
											$number_TranID = "numID_" . Str::random(3) . time(); // tự tạo ra để định nghĩa hoac nếu có viettellpay, momo thi lây mã giao dich bên đó làm number_tranID
											$tranIDHistory = $arr['tranID'] . Str::random(3) . time(); // tự tạo ra để định nghĩa
											$text = Str::random(5);
//												$comment = $text . ' ' . $arr['tranID'] . ' ' . $arr['amount'] . ' ' . $check_user->first_name;
											$comment = strtoupper(substr($check_user->first_name, 0, 3)) . time();
											$data_recharge['text'] = $comment;
											$data_recharge['comment'] = $comment;
											$data_recharge['amount'] = $arr['amount'];
											$data_recharge['id_partners'] = $check_user->id;
											$data_recharge['tranIDHistory'] = $tranIDHistory;
											$data_recharge['tranID'] = $tranID;
											$data_recharge['number_TranID'] = $number_TranID;
											$data_recharge['type'] = $arr['type'];
											$data_recharge['branch'] = $bank->branch;
											$data_recharge['number1'] = $bank->number1;
											$data_recharge['number2'] = $bank->number1;
											$data_recharge['name'] = $bank->name;
											$data_recharge['full_name'] = $bank->full_name;
											$data_recharge['bankcode'] = $bank->bankcode;
											$data_recharge['status'] = 'pending';
											$data_recharge['created_at'] = $created_at;
											$data_recharge['updated_at'] = $created_at;

											Recharge::create($data_recharge);

											$infomationAccount['cardName'] = $bank->full_name;
											$infomationAccount['cardCode'] = $bank->number1;
											$infomationAccount['qrCode'] = $bank->link_qrcode ?? "#";

											$templatejson['errorCode'] = 200;
											$templatejson['errorDescription'] = "Success";
											$templatejson['infomationAccount'] = base64_encode(json_encode($infomationAccount));
											$templatejson['amount'] = $arr['amount'];
											$templatejson['comment'] = $data_recharge['comment'];
											$templatejson['qrcode'] = $bank->link_qrcode ?? "#";
											$templatejson['type'] = $arr['bankCode'] ? "Bank" : false;
											$templatejson['bankCode'] = $arr['bankCode'];
											$templatejson['bankName'] = $bank->name;

											\Log::info('action: create_recharge');

											$text = "YÊU CẦU NẠP TIỀN MỚI:\n"
												. "<b> Số tiền : </b>\n"
												. number_format($arr['amount'], 0, '', ',') . "\n"
												. "<b> Bình Luận : </b>\n"
												. "$comment\n"
												. "<b> Đối Tác : </b>\n"
												. "$check_user->first_name\n"
												. "<b> cardName : </b>\n"
												. $bank->full_name . "\n"
												. "<b> cardCode : </b>\n"
												. $bank->number1 . "\n";

											Telegram::sendMessage([
												'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
												'parse_mode' => 'HTML',
												'text' => $text
											]);

											return response()->json($templatejson);
										}
									}

									$result['errorCode'] = 404;
									$result['errorDescription'] = "He thong dang bao tri, khong the tao yeu cau";
									$result['errorData'] = [];

									return response()->json($result);

								} else {
									$result['errorCode'] = 404;
									$result['errorDescription'] = "Ban Can co The Ngan Hang va phai đươc Active";
									$result['errorData'] = [];

									return response()->json($result);
								}

								$result['errorCode'] = 404;
								$result['errorDescription'] = "Vui long lien he Admin de duoc phep chuyen khoan vao Ngan Hang nay (Banklist for Partners) ";
								$result['errorData'] = [];

								return response()->json($result);


							}

							$result['errorCode'] = 404;
							$result['errorDescription'] = "Tai khoan khong ton tai ( accessToken ) ";
							$result['errorData'] = [];

							return response()->json($result);
						}

						$result['errorCode'] = 404;
						$result['errorDescription'] = "tranID da ton tai ( tranID ) ";
						$result['errorData'] = [];

						return response()->json($result);


					} else {
						$result['errorCode'] = 404;
						$result['errorDescription'] = "Tai khoan khong ton tai ( key error or  access_token error ) ";
						$result['errorData'] = [];

						return response()->json($result);
					}

				} else {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key / access_token ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}


			} else {
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Tham so truyen vao khong day du hoac khong chinh xac";
				$result['errorData'] = [];

				return response()->json($result);
			}

		} catch (\Exception $e) {
			// ghi log
			\Log::info("create_recharge:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);
		}
	}

	public function create_recharge_moi(Request $request)
	{
		try {
			$data = $request->only([
				'kind',
				'name',
				'key',
				'tranID',
				'type',
				'bankCode',
				'amount',
				'size',
				'accessToken',
			]);

			$requiredFields = ['kind', 'name', 'key', 'tranID', 'type', 'bankCode', 'amount', 'size', 'accessToken'];

			if (count(array_intersect_key(array_flip($requiredFields), $data)) === count($requiredFields)) {
				$check_user_key = User::where('key', $data['key'])->first();
				$check_user_access_token = User::where('access_token', $data['accessToken'])->first();

				if (!isset($check_user_key) || !isset($check_user_access_token)) {
					return response()->json([
						'errorCode' => 404,
						'errorDescription' => "Tai khoan khong ton tai ( key error or access_token error )",
						'errorData' => [],
					]);
				}

				if ($data['amount'] <= 9000) {
					return response()->json([
						'errorCode' => 404,
						'errorDescription' => "So Tien Nap Phai Lon Hon Khong ( amount > 9.000 vnd )!!",
						'errorData' => [],
					]);
				}

				if ($check_user_key->id == $check_user_access_token->id) {
					$check_user = User::where('key', $data['key'])->first();

					if (isset($check_user) && $check_user->id) {
						$list_recha = Recharge::where('id_partners', $check_user->id)
							->where('tranID', $data['tranID'])
							->get();

						if (count($list_recha) == 0) {
							if ($check_user->access_token == $data['accessToken'] && isset($check_user->access_token)) {
								$bank = DB::table('banks')
									->where('id_partners', $check_user->id)
									->where('trang_thai', 'active')
									->where('bankcode', $data['bankCode'])
									->first();

								if (isset($bank)) {
									$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
									$created_at = $date->format('d-m-Y H:i:s');
									$tranID = $data['tranID'];
									$number_TranID = "numID_" . Str::random(3) . time();
									$tranIDHistory = $data['tranID'] . Str::random(3) . time();
									$comment = strtoupper(substr($check_user->first_name, 0, 3)) . time();

									$data_recharge = [
										'text' => $comment,
										'comment' => $comment,
										'amount' => $data['amount'],
										'id_partners' => $check_user->id,
										'tranIDHistory' => $tranIDHistory,
										'tranID' => $tranID,
										'number_TranID' => $number_TranID,
										'type' => $data['type'],
										'branch' => $bank->branch,
										'number1' => $bank->number1,
										'number2' => $bank->number1,
										'name' => $bank->name,
										'full_name' => $bank->full_name,
										'bankcode' => $bank->bankcode,
										'status' => 'pending',
										'created_at' => $created_at,
										'updated_at' => $created_at,
									];

									Recharge::create($data_recharge);

									$infomationAccount = [
										'cardName' => $bank->full_name,
										'cardCode' => $bank->number1,
										'qrCode' => $bank->link_qrcode ?? "#",
									];

									$templatejson = [
										'errorCode' => 200,
										'errorDescription' => "Success",
										'infomationAccount' => base64_encode(json_encode($infomationAccount)),
										'amount' => $data['amount'],
										'comment' => $data_recharge['comment'],
										'qrcode' => $bank->link_qrcode ?? "#",
										'type' => $data['bankCode'] ? "Bank" : false,
										'bankCode' => $data['bankCode'],
										'bankName' => $bank->name,
									];

									\Log::info('action: create_recharge');

									$text = "YÊU CẦU NẠP TIỀN MỚI:\n"
										. "<b> Số tiền : </b>\n"
										. number_format($data['amount'], 0, '', ',') . "\n"
										. "<b> Bình Luận : </b>\n"
										. "$comment\n"
										. "<b> Đối Tác : </b>\n"
										. "$check_user->first_name\n"
										. "<b> cardName : </b>\n"
										. $bank->full_name . "\n"
										. "<b> cardCode : </b>\n"
										. $bank->number1 . "\n";

									Telegram::sendMessage([
										'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
										'parse_mode' => 'HTML',
										'text' => $text,
									]);

									return response()->json($templatejson);
								}

								return response()->json([
									'errorCode' => 404,
									'errorDescription' => "He thong dang bao tri, khong the tao yeu cau",
									'errorData' => [],
								]);
							}

							return response()->json([
								'errorCode' => 404,
								'errorDescription' => "Tai khoan khong ton tai ( accessToken )",
								'errorData' => [],
							]);
						}

						return response()->json([
							'errorCode' => 404,
							'errorDescription' => "tranID da ton tai ( tranID )",
							'errorData' => [],
						]);
					}

					return response()->json([
						'errorCode' => 404,
						'errorDescription' => "Tai khoan khong ton tai ( key error or access_token error )",
						'errorData' => [],
					]);
				}

				return response()->json([
					'errorCode' => 404,
					'errorDescription' => "Tai khoan khong ton tai ( key / access_token )",
					'errorData' => [],
				]);
			}

			return response()->json([
				'errorCode' => 404,
				'errorDescription' => "Tham so truyen vao khong day du hoac khong chinh xac",
				'errorData' => [],
			]);

		} catch (\Exception $e) {
			// ghi log
			\Log::info("create_recharge:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);
		}
	}


	public function check_status(Request $request)
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
					$check = Recharge::where('tranID', $arr['tranID'])->get()->toArray()[0];

					if (count($check) > 0) {

						$partners = User::where('id', $check['id_partners'])->get()->toArray()[0];

						$templatejson['tranID'] = $check['tranID'];
						$templatejson['number_TranID'] = $check['number_TranID'];
						$templatejson['tranIDHistory'] = $check['tranIDHistory'];
						$templatejson['partners'] = $partners['first_name'];
						$templatejson['amount'] = $check['amount'];
						$templatejson['comment'] = $check['comment'];
						$templatejson['number1'] = $check['number1'];
						$templatejson['branch'] = $check['branch'];
						$templatejson['bankcode'] = $check['bankcode'];
						$templatejson['name'] = $check['name'];
						$templatejson['full_name'] = $check['full_name'];
						$templatejson['status'] = $check['trang_thai'];
						$templatejson['created_at'] = $check['created_at'];

						$result2['errorCode'] = 200;
						$result2['errorDescription'] = "Success";
						$result2['errorData'] = $templatejson;

						return response()->json($result2);
					} else {
						$result['errorCode'] = 404;
						$result['errorDescription'] = "loi tranID hoac khong ton tai";
						$result['errorData'] = [];

						return response()->json($result);
					}
				}
			} else {
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Error accessToken";
				$result['errorData'] = [];

				return response()->json($result);
			}

		} catch (\Exception $e) {
			// ghi log
			\Log::info("check_status:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function create()
	{
//            try {
//
//
//            } catch (\Exception $e) {
//                // ghi log
//                \Log::info("create:".json_encode($e));
//
//                // tra json bao loi
//                $result['errorCode'] = 404;
//                $result['errorDescription'] = "Vui lòng liên hệ CSKH";
//
//                return response()->json($result);
//
//            }


	}

	public function store(Request $request)
	{
		Recharge::create([
			'UUID' => "Partner_" . Str::random(30),
		]);

		return response()->json(true);
	}

	public function show($id)
	{
		return Recharge::where('id', $id)->first();
	}

	public function edit($id)
	{
		return Recharge::where('id', $id)->first();
	}

	public function update(Request $request)
	{

		try {

			$data = $request->all();

			$list = [
				'id',
				'trang_thai',
			];

			$arr = array_intersect_key($data, array_flip($list));
			$object = Recharge::where('id', $arr['id'])->first();


			if ($arr['trang_thai'] == "cancel") {
				$user_role = Auth::user();

				$object = Recharge::where('id', $arr['id'])->first();
				$update_data = [
					'trang_thai' => $arr['trang_thai']
				];
				$object->update($update_data);

				$partners = User::where('id', $object->id_partners)->first();

				$text_content = "<b>NẠP TIỀN ĐÃ BỊ TỪ CHỐI:</b>\n"
					. "<b> ĐỐI TÁC  : </b>\n"
					. $partners->first_name . "\n"
					. "<b> NGƯỜI DUYỆT   : </b>\n"
					. "$user_role->first_name\n"
					. "<b> CẬP NHẬT : </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);

				return response()->json(true);

			}

			if ($arr['trang_thai'] == "success" && $object->add_money == 1) {
				$user_role = Auth::user();

				$text_content = "<b>NẠP TIỀN NÀY ĐÃ THÀNH CÔNG VÀ CỘNG TIỀN CHO ĐỐI TÁC</b>\n"
					. "<b> NGƯỜI DUYỆT   : </b>\n"
					. "$user_role->first_name\n"
					. "<b>  CẬP NHẬT : </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);

				return response()->json(true);
			}

			if ($arr['trang_thai'] == "success" && $object->add_money == 0) {
				$user_role = Auth::user();

				if (isset($object)) {
					$partners = User::where('id', $object->id_partners)->first();

					$data_arr = [
						'so_du' => (int)$partners->so_du + (int)$object->amount,
					];
					$partners->update($data_arr);
					$partners->save();

					$arr['add_money'] = 1;

				}

				$object = Recharge::where('id', $arr['id'])->first();
				$update_data = [
					'trang_thai' => $arr['trang_thai']
				];
				$object->update($update_data);

				$text_content = "<b>NẠP TIỀN CẬP NHẬT THÀNH CÔNG:</b>\n"
					. "<b>ĐÃ CỘNG: </b>\n"
					. number_format($object->amount, 0, '', ',') . "\n"
					. "<b> TỔNG CỘNG : </b>\n"
					. number_format($data_arr['so_du'], 0, '', ',') . "\n"
					. "<b> ĐỐI TÁC   : </b>\n"
					. $partners->first_name . "\n"
					. "<b>NGƯỜI DUYỆT    : </b>\n"
					. "$user_role->first_name\n"
					. "<b> CẬP NHẬT : </b>\n"
					. now();

				event(new SuccessCallBack($arr));

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);

				return response()->json(true);
			}

//			$old_data = $object22;
//			$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
//			$date->setTimezone('+7');
//			$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
//			//user
//			$data_logs['id_user'] = Auth::user()->id();
//			$data_logs['created_at'] = $created_at;
//			$data_logs['updated_at'] = $created_at;
//			//user
//			$data_logs['type'] = 'Update Recharge';
//			// data old
//			$data_logs['old'] = json_encode($old_data);
//			// data new
//			$data_logs['new'] = json_encode($arr);
//			// add logs
//			DB::table('logs_profile')->insert($data_logs);
//			$object22->update($arr);
//			$object22->save();

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

	public function callEvent($arr)
	{
		try {
			if ($arr['trang_thai'] == "success") {
				event(new SuccessCallBack($arr));
			}

		} catch (\Exception $e) {
			// ghi log
			\Log::info("callEvent:" . json_encode($e));

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
			$data = Recharge::where('id', $arr['id'])->first();

			if (isset($data)) {
				$data->delete();

				return response()->json(true);
			}

			return response()->json(false);

		} catch (\Exception $e) {
			// ghi log
			\Log::info("destroy:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);
		}


	}
	// End recharge

	// recharge_callback
	public function index_callback(RechargeDataTable $dataTable)
	{
		$user_role = Auth::user()->role();

		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action: index_callback');

		if ($user_role == 'admin') {
			return $dataTable->render('pages.recharge_callback.index');
		}

		if ($user_role == 'partner') {
			return $dataTable->render('pages.recharge_callback.index');
		}
	}

	public function datatables_callback()
	{
		try {

			$user_role = Auth::user()->role();

			if ($user_role == 'admin') {
				$datas = Recharge::where('callback', 'success')->take(100)->get();

				return Datatables::of($datas)
					->addColumn('action', function (Recharge $datas) {
						return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge_callback.callback_again') . '"
								onclick="callback_again(event, this); return false;"
								class="btn btn-primary  detail" with="90px"

								>
								CallBack
							</a>
					</td>';
					})
					->editColumn('trang_thai', function (Recharge $datas) {
						if ($datas->trang_thai == 'pending') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
						}

						if ($datas->trang_thai == 'cancel') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
						}

						if ($datas->trang_thai == 'confirm') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
						}

						return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
					})
					->editColumn('status', function (Recharge $datas) {
						return $datas->trang_thai;
					})
					->editColumn('cronjob', function (Recharge $datas) {
						return $datas->cronjob;
					})
					->editColumn('callback', function (Recharge $datas) {
						return $datas->callback;
					})
					->editColumn('callback_time', function (Recharge $datas) {
						return $datas->callback_time;
					})
					->editColumn('callback_result', function (Recharge $datas) {
						return $datas->callback_result;
					})
					->editColumn('partners', function (Recharge $datas) {
						$temp = DB::table('users')->where('id', $datas->id_partners)->first();

						return $temp->first_name;
					})
					->editColumn('partners_email', function (Recharge $datas) {
						$temp = DB::table('users')->where('id', $datas->id_partners)->first();

						return $temp->email;
					})
					->editColumn('countdown', function (Recharge $datas) {
						$countdown = "timeresult_" . $datas->id;
						return '<div id="' . $countdown . '" > </div>';
					})
					->editColumn('created_at', function (Recharge $datas) {
						$countdown = "countdown_" . $datas->id;
						return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
								strtotime($datas->created_at)) . ' </div>';
					})
					->editColumn('time', function (Recharge $datas) {
						$countdown = "time_" . $datas->id;

						return '<input type="hidden"  name="' . $countdown . '" value="' . date('d-m-Y H:i:s',
								strtotime($datas->created_at)) . '" ></input>';

					})
					->editColumn('amount', function (Recharge $datas) {
						return number_format($datas->amount, 0, '', ',');
					})
					->rawColumns([
						'action', 'partners', 'partners_email', 'callback_time', 'callback_result', 'callback',
						'created_at', 'trang_thai', 'amount', 'countdown', 'time', 'status', 'cronjob'
					])
					->toJson();
			}

			if ($user_role == 'partner') {
				$datas = Recharge::where('callback', 'success')->where('id_partners', Auth::user()->id)->orderBy('id', 'DESC')->take(100)->get();

				return Datatables::of($datas)
					->addColumn('action', function (Recharge $datas) {
						return;
					})
					->editColumn('trang_thai', function (Recharge $datas) {
						if ($datas->trang_thai == 'cancel') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
						}

						if ($datas->trang_thai == 'pending') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
						}

						if ($datas->trang_thai == 'confirm') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
						}


						return '<span class="badge py-3 px-4 fs-7 badge-light-primary "> ' . $datas->trang_thai . '</span>';
					})
					->editColumn('status', function (Recharge $datas) {
						return $datas->trang_thai;
					})
					->editColumn('cronjob', function (Recharge $datas) {
						return $datas->cronjob;
					})
					->editColumn('callback', function (Recharge $datas) {
						return $datas->callback;
					})
					->editColumn('callback_time', function (Recharge $datas) {
						return $datas->callback_time;
					})
					->editColumn('callback_result', function (Recharge $datas) {
						return $datas->callback_result;
					})
					->editColumn('partners', function (Recharge $datas) {
						$temp = DB::table('users')->where('id', $datas->id_partners)->first();

						return $temp->first_name;
					})
					->editColumn('partners_email', function (Recharge $datas) {
						$temp = DB::table('users')->where('id', $datas->id_partners)->first();

						return $temp->email;
					})
					->editColumn('countdown', function (Recharge $datas) {
						$countdown = "timeresult_" . $datas->id;
						return '<div id="' . $countdown . '" > </div>';
					})
					->editColumn('created_at', function (Recharge $datas) {
						$countdown = "countdown_" . $datas->id;
						return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . date('d-m-Y H:i:s',
								strtotime($datas->created_at)) . ' </div>';
					})
					->editColumn('time', function (Recharge $datas) {
						$countdown = "time_" . $datas->id;

						return '<input type="hidden"  name="' . $countdown . '" value="' . date('d-m-Y H:i:s',
								strtotime($datas->created_at)) . '" ></input>';

					})
					->editColumn('amount', function (Recharge $datas) {
						return number_format($datas->amount, 0, '', ',');
					})
					->rawColumns([
						'action', 'partners', 'partners_email', 'callback_time', 'callback_result', 'callback',
						'created_at', 'trang_thai', 'amount', 'countdown', 'time', 'status', 'cronjob'
					])
					->toJson();
			}


		} catch (\Exception $e) {
			// ghi log
			\Log::info("datatables_callback:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function getdetail_callback(Request $request)
	{

		try {

			$data = $request->all();

			$data = Recharge::where('id', $data['id'])->first();


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

	public function show_callback($id)
	{
		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action: show_callback');

		return Recharge::where('id', $id)->first();
	}

	public function edit_callback($id)
	{
		\Log::info("User Name :" . Auth::user()->first_name . '/id : ' . Auth::user()->id . '/action: edit_callback');

		return Recharge::where('id', $id)->first();
	}

	public function update_callback(Request $request)
	{


		try {

			$arr = $request->only(['id', 'trang_thai']);

			if ($arr['trang_thai'] == "success") {
				event(new SuccessCallBack($arr));

//				$object = Recharge::where('id', $arr['id'])->first();
//				if (isset($object))
//				{
//					$partners = User::where('id', $object->id_partners)->first();
//					$data_arr = [
//						'so_du' => (int)$partners->so_du +  (int)$object->amount,
//					];
//					$partners->update($data_arr);
//					$partners->save();
//
//				}
			}

			$object = Recharge::where('id', $arr['id'])->first();
			$object->update($arr);
			$object->save();


			return response()->json(true);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("update_callback:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function callback_error(Request $request)
	{
		try {

			$arr = $request->only(['id', 'error', 'text']);

			$object = Recharge::where('id', $arr['id'])->first();
			$object->update($arr);
			$object->save();


			return response()->json(true);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("callback_error:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function callback_again(Request $request)
	{
		try {

			$arr = $request->only(['id']);

			$kq = event(new SuccessCallBack($arr));
			$object = Recharge::where('id', $arr['id'])->first();
			$partners = User::where('id', $object->id_partners)->first();


			return response()->json($kq);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("callback_again:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	// End recharge_callback

	public function result_success_recharge(Request $request)
	{
		try {

			$arr = $request->only(['tranID', 'accessToken']);

			if (isset($arr['accessToken']) && count($arr) > 0) {
				$check_user = User::where('access_token', $arr['accessToken'])->first();

				if (!isset($check_user)) {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Error accessToken";
					$result['errorData'] = [];

					return response()->json($result);
				} else {
					$check = Recharge::where('tranID', $arr['tranID'])->first();

					if (isset($check->id_partners)) {
						$object = User::where('id', $check->id_partners)->first();

						if (isset($check) && isset($object)) {
							$tranIDHistory = $object->tranIDHistory;
							$tranID = $arr['tranID'];
							$amount = (int)$check->amount;
							$comment = $check->comment;
							$keyID = $check->number_TranID;
							$key = $object->key;
							$auth_token = $object->access_token;
							$access_token = $object->access_token;
							$link_callback = $object->callback_link ?? "#";
							$signature = md5($tranID . '|' . $amount . '|' . $comment . '|' . $key . '|' . $access_token);
							$phoneAccount = $object->number1;
							$phoneCustomer = '';
							$nameCustomer = '';

							// chuan bi data
							$type = 1;
							$status = $check->trang_thai;
							$data_curl = array();
							$data_curl['url'] = $link_callback;
							$data_curl['auth_token'] = $auth_token;
							$data_curl['method'] = "POST";

							$data_curl['http_errors'] = false;
							$data_curl['header'] = [
								'Content-Type: application/json',
								'Accept' => 'application/json',
								'Content-Type' => 'application/json',
								'Authorization' => "Bearer {$auth_token}",
							];

							$data_curl['data_body'] = [
								'tranID' => $tranID,
								'keyID' => $tranID,
								'phoneAccount' => $phoneAccount,
								'phoneCustomer' => $phoneCustomer,
								'nameCustomer' => $nameCustomer,
								'comment' => $comment,
								'amount' => $amount,
								'type' => $type,
								'status' => $status,
								'signature' => $signature,
							];

							$data_curl['result_request'] = $this->request($data_curl);

							$result['errorCode'] = 200;
							$result['errorDescription'] = "Success";
							$result['errorData'] = $data_curl;


							return response()->json($result);
						}

						$result['errorCode'] = 404;
						$result['errorDescription'] = "loi tranID hoac khong ton tai";
						$result['errorData'] = [];

						return response()->json($result);

					} else {
						$result['errorCode'] = 404;
						$result['errorDescription'] = "Error tranID";
						$result['errorData'] = [];

						return response()->json($result);
					}
				}
			} else {
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Error accessToken";
				$result['errorData'] = [];

				return response()->json($result);
			}

		} catch (\Exception $e) {
			// ghi log
			\Log::info("result_success_recharge:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}


	}

	public function request($data_curl)
	{

		$data_curl['method'] = $data_curl['method'] ?? "POST";

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_CUSTOMREQUEST => $data_curl['method'],
			CURLOPT_URL => $data_curl['url'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 5,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_POSTFIELDS => json_encode($data_curl['data_body']),
			CURLOPT_HTTPHEADER => $data_curl['header'],
		));
		$response = curl_exec($curl);
		$error_msg = curl_error($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if (isset($error_msg)) {
			$httpcode = 500;
			//echo "cURL Error #:" . $error_msg;
		}

		return $httpcode;
	}

	public function getRechargeApi()
	{
		try {

			$listReApi = Recharge::orderBy('id', 'desc')->take(10)->get()->toArray();
			$arr['errorCode'] = 200;
			$arr['errorDescription'] = 'success';
			$arr['data'] = $listReApi;

			return response()->json($arr);

		} catch (\Exception $e) {
			// ghi log
			\Log::info("callback_error:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}


	// report
	public function report_daily(Request $request)
	{
		try {

			$list = [
				'key',
				'accessToken',
				'day'
			];

			$arr = $request->only($list);

			// Check if the required fields are present in the $arr array
			if (
				isset($arr['key']) &&
				isset($arr['day']) &&
				isset($arr['accessToken'])
			) {
				// Check if the user with 'key' and 'access_token' exists
				$check_user = User::where('key', $arr['key'])
					->where('access_token', $arr['accessToken'])
					->first();

				if (!$check_user) {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key error or  access_token error ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}

				$days = $arr['day'];

				$startDate = Carbon::now()->subDays($days);

				$list_recha = Recharge::where('id_partners', $check_user->id)
					->where('created_at', '>=', $startDate)
					->get();
				$Amount = $list_recha->sum('amount');

				$list_recha_success = $list_recha->where('trang_thai', 'success');
				$totalAmount = $list_recha_success->sum('amount');
				$list_recha_cancel = $list_recha->where('trang_thai', 'cancel');
				$list_recha_pending = $list_recha->where('trang_thai', 'pending');

				//API
				$api_count = $list_recha->whereNotNull('comment_api');
				$api_count_success = $list_recha->whereNotNull('comment_api');

				$list_withdraw = Withdraw::where('accessToken', $arr['accessToken'])
					->where('created_at', '>=', $startDate)
					->get();
				$AmountWithdraw = $list_withdraw->sum('amount');

				$list_withdraw_success = $list_withdraw->where('status', 'success');
				$totalAmountWithdraw = $list_withdraw_success->sum('amount');
				$list_withdraw_cancel = $list_withdraw->where('status', 'cancel');
				$list_withdraw_pending = $list_withdraw->where('status', 'pending');

				if (count($list_recha) > 0) {

					$report_data = array();
					$report_data['date'] = $startDate->format('d-m-Y');

					// recharge
					$recharge_data['total'] = count($list_recha) ?? 0;
					$recharge_data['success'] = count($list_recha_success) ?? 0;
					$recharge_data['cancel'] = count($list_recha_cancel) ?? 0;
					$recharge_data['pending'] = count($list_recha_pending) ?? 0;
					$recharge_data['money_total'] = $Amount ?? 0;
					$recharge_data['money_total_format'] = format_money($Amount) . ' VND' ?? 0;
					$recharge_data['money_success'] = $totalAmount ?? 0;
					$recharge_data['money_success_format'] = format_money($totalAmount) . ' VND' ?? 0;

					$report_data['recharge'] = $recharge_data;


					//withdraw\
					$withdraw_data['total'] = count($list_withdraw) ?? 0;
					$withdraw_data['success'] = count($list_withdraw_success) ?? 0;
					$withdraw_data['cancel'] = count($list_withdraw_cancel) ?? 0;
					$withdraw_data['pending'] = count($list_withdraw_pending) ?? 0;
					$withdraw_data['money_total'] = $AmountWithdraw ?? 0;
					$withdraw_data['money_total_format'] = format_money($AmountWithdraw) . ' VND' ?? 0;
					$withdraw_data['money_success'] = $totalAmountWithdraw ?? 0;
					$withdraw_data['money_success_format'] = format_money($totalAmountWithdraw) . ' VND' ?? 0;

					$report_data['withdraw'] = $withdraw_data;

					//api
					$api_data['api_total'] = count($api_count) ?? 0;
					$api_data['api_success_total'] = count($api_count_success) ?? 0;

					$report_data['api'] = $api_data;


					$arr_report_data['errorCode'] = 200;
					$arr_report_data['errorDescription'] = 'success';
					$arr_report_data['data'] = $report_data;


					$result['errorCode'] = 200;
					$result['errorDescription'] = "success";
					$result['errorData'] = $arr_report_data;

					return response()->json($result);
				}

				$result['errorCode'] = 404;
				$result['errorDescription'] = " Recharge  == 0  ";
				$result['errorData'] = [];
				return response()->json($result);

			} else {
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Tham so truyen vao khong day du hoac khong chinh xac";
				$result['errorData'] = [];

				return response()->json($result);
			}

		} catch (\Exception $e) {
			// ghi log
			\Log::info("report_daily:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}


	// end report

	// filter
	public function call_recharge_filter($daysAgo, $accessToken, $id_partners)
	{
		switch ($daysAgo) {
			case 0:
				$startDate = Carbon::now()->endOfDay()->setHour(0)->setMinute(0)->setSecond(0);
				$endDate = Carbon::now()->startOfDay()->setHour(23)->setMinute(59)->setSecond(59);
				break;

			case 10:
				$startDate = Carbon::now()->startOfWeek()->setHour(0)->setMinute(0)->setSecond(0);
				$endDate = Carbon::now()->endOfWeek()->setHour(23)->setMinute(59)->setSecond(59);
				break;

			case 14:
				$startDate = Carbon::now()->subWeek()->startOfWeek()->setTime(0, 0, 0);
				$endDate = Carbon::now()->subWeek()->endOfWeek()->setTime(23, 59, 59);
				break;

			case 30:
				$startDate = Carbon::now()->startOfMonth()->setTime(0, 0, 0);
				$endDate = Carbon::now()->endOfMonth()->setTime(23, 59, 59);
				break;

			case 35:
				$startDate = Carbon::now()->subMonth()->startOfMonth()->setTime(0, 0, 0);
				$endDate = Carbon::now()->subMonth()->endOfMonth()->setTime(23, 59, 59);
				break;

			default:
				$startDate = Carbon::now()->subDays($daysAgo)->setHour(0)->setMinute(0)->setSecond(0);
				$endDate = Carbon::now()->subDays($daysAgo)->setHour(23)->setMinute(59)->setSecond(59);
				break;
		}


		$query_recha = Recharge::whereBetween('created_at', [$startDate, $endDate]);

		if (Auth::user()->role() != 'admin') {
			$query_recha->where('id_partners', $id_partners);
		}

		$list_recha = $query_recha->get();
		$Amount = $list_recha->sum('amount');

		$list_recha_success = $list_recha->where('trang_thai', 'success');
		$totalAmount = $list_recha_success->sum('amount');
		$list_recha_pending = $list_recha->where('trang_thai', 'pending');
		$totalPendingAmount = $list_recha_pending->sum('amount');
		$list_recha_cancel = $list_recha->where('trang_thai', 'cancel');
		$totalCancelAmount = $list_recha_cancel->sum('amount');

		//API
		$api_count = $list_recha->whereNotNull('comment_api');
		$api_count_success = $list_recha->whereNotNull('comment_api');

		$query = Withdraw::whereBetween('created_at', [$startDate, $endDate]);

		if (Auth::user()->role() != 'admin') {
			$query->where('accessToken', $accessToken);
		}

		$list_withdraw = $query->get();
		$AmountWithdraw = $list_withdraw->sum('amount');
		$list_withdraw_success = $list_withdraw->where('status', 'success');
		$totalAmountSuccessWithdraw = $list_withdraw_success->sum('amount');
		$list_withdraw_cancel = $list_withdraw->where('status', 'cancel');
		$totalAmountCancelWithdraw = $list_withdraw_cancel->sum('amount');
		$list_withdraw_pending = $list_withdraw->where('status', 'pending');
		$totalAmountPendingWithdraw = $list_withdraw_pending->sum('amount');


		$report_data = array();
		$report_data['date'] = $startDate->format('d-m-Y');

		// recharge
		$recharge_data['total'] = count($list_recha) ?? 0;
		$recharge_data['success'] = count($list_recha_success) ?? 0;
		$recharge_data['cancel'] = count($list_recha_cancel) ?? 0;
		$recharge_data['pending'] = count($list_recha_pending) ?? 0;
		$recharge_data['money_total'] = $Amount ?? 0;
		$recharge_data['money_total_format'] = format_money($Amount) . ' VND' ?? 0;
		$recharge_data['money_success'] = $totalAmount ?? 0;
		$recharge_data['money_success_format'] = format_money($totalAmount) . ' VND' ?? 0;
		$recharge_data['money_pending'] = $totalPendingAmount ?? 0;
		$recharge_data['money_pending_format'] = format_money($totalPendingAmount) . ' VND' ?? 0;
		$recharge_data['money_cancel'] = $totalCancelAmount ?? 0;
		$recharge_data['money_cancel_format'] = format_money($totalCancelAmount) . ' VND' ?? 0;

		$report_data['recharge'] = $recharge_data;

		//withdraw
		$withdraw_data['success'] = count($list_withdraw_success) ?? 0;
		$withdraw_data['money_success'] = $totalAmountSuccessWithdraw ?? 0;
		$withdraw_data['money_success_format'] = format_money($totalAmountSuccessWithdraw) . ' VND' ?? 0;
		$withdraw_data['cancel'] = count($list_withdraw_cancel) ?? 0;
		$withdraw_data['money_cancel'] = $totalAmountCancelWithdraw ?? 0;
		$withdraw_data['money_cancel_format'] = format_money($totalAmountCancelWithdraw) . ' VND' ?? 0;
		$withdraw_data['pending'] = count($list_withdraw_pending) ?? 0;
		$withdraw_data['money_pending'] = $totalAmountPendingWithdraw ?? 0;
		$withdraw_data['money_pending_format'] = format_money($totalAmountPendingWithdraw) . ' VND' ?? 0;
		$withdraw_data['total'] = count($list_withdraw) ?? 0;
		$withdraw_data['money_total'] = $AmountWithdraw ?? 0;
		$withdraw_data['money_total_format'] = format_money($AmountWithdraw) . ' VND' ?? 0;

		$report_data['withdraw'] = $withdraw_data;

		//api
		$api_data['api_total'] = count($api_count) ?? 0;
		$api_data['api_success_total'] = count($api_count_success) ?? 0;

		// date
		$report_data['startDate'] = $startDate;
		$report_data['endDate'] = $endDate;

		$report_data['api'] = $api_data;

		$i = 1;
		for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
			$days_recharge_data = array();
			$days_withdraw_data = array();

			$query_recharge = Recharge::query(); // Initialize the query
			$query_recharge->WhereDate('created_at', $date);
			if (Auth::user()->role() != 'admin') {
				$query_recharge->where('id_partners', $id_partners);
			}
			$list_recha_days = $query_recharge->get();

			if (count($list_recha_days) > 0) {
				$Amount = 0;
				$totalCancelAmount = 0;
				$totalPendingAmount = 0;
				$totalAmount = 0;

				$Amount = $list_recha_days->sum('amount');
				$list_recha_success = $list_recha_days->where('trang_thai', 'success');
				$totalAmount = $list_recha_success->sum('amount');
				$list_recha_pending = $list_recha_days->where('trang_thai', 'pending');
				$totalPendingAmount = $list_recha_pending->sum('amount');
				$list_recha_cancel = $list_recha_days->where('trang_thai', 'cancel');
				$totalCancelAmount = $list_recha_cancel->sum('amount');

				$days_recharge_data['total'] = count($list_recha_days) ?? 0;
				$days_recharge_data['success'] = count($list_recha_success) ?? 0;
				$days_recharge_data['cancel'] = count($list_recha_cancel) ?? 0;
				$days_recharge_data['pending'] = count($list_recha_pending) ?? 0;
				$days_recharge_data['money_total'] = $Amount ?? 0;
				$days_recharge_data['money_total_format'] = format_money($Amount) . ' VND' ?? 0;
				$days_recharge_data['money_success'] = $totalAmount ?? 0;
				$days_recharge_data['money_success_format'] = format_money($totalAmount) . ' VND' ?? 0;
				$days_recharge_data['money_pending'] = $totalPendingAmount ?? 0;
				$days_recharge_data['money_pending_format'] = format_money($totalPendingAmount) . ' VND' ?? 0;
				$days_recharge_data['money_cancel'] = $totalCancelAmount ?? 0;
				$days_recharge_data['money_cancel_format'] = format_money($totalCancelAmount) . ' VND' ?? 0;
				$days_recharge_data['day'] = $date->format('d-m-Y');
			} else {
				$days_recharge_data['total'] = 0;
				$days_recharge_data['success'] = 0;
				$days_recharge_data['cancel'] = 0;
				$days_recharge_data['pending'] = 0;
				$days_recharge_data['money_total'] = 0;
				$days_recharge_data['money_total_format'] = 0;
				$days_recharge_data['money_success'] = 0;
				$days_recharge_data['money_success_format'] = 0;
				$days_recharge_data['money_pending'] = 0;
				$days_recharge_data['money_pending_format'] = 0;
				$days_recharge_data['money_cancel'] = 0;
				$days_recharge_data['money_cancel_format'] = 0;
				$days_recharge_data['day'] = $date->format('d-m-Y');
			}

			$query_withdraws = Withdraw::query(); // Initialize the query
			$query_withdraws->WhereDate('created_at', $date);
			if (Auth::user()->role() != 'admin') {
				$query_withdraws->where('accessToken', $accessToken);
			}
			$list_withdraw_days = $query_withdraws->get();

			if (count($list_withdraw_days) > 0) {
				$AmountWithdraw = 0;
				$totalAmountSuccessWithdraw = 0;
				$totalAmountCancelWithdraw = 0;
				$totalAmountPendingWithdraw = 0;

				$AmountWithdraw = $list_withdraw_days->sum('amount');
				$list_withdraw_success = $list_withdraw_days->where('status', 'success');
				$totalAmountSuccessWithdraw = $list_withdraw_success->sum('amount');
				$list_withdraw_cancel = $list_withdraw_days->where('status', 'cancel');
				$totalAmountCancelWithdraw = $list_withdraw_cancel->sum('amount');
				$list_withdraw_pending = $list_withdraw_days->where('status', 'pending');
				$totalAmountPendingWithdraw = $list_withdraw_pending->sum('amount');

				//withdraw
				$days_withdraw_data['success'] = count($list_withdraw_success) ?? 0;
				$days_withdraw_data['money_success'] = $totalAmountSuccessWithdraw ?? 0;
				$days_withdraw_data['money_success_format'] = format_money($totalAmountSuccessWithdraw) . ' VND' ?? 0;
				$days_withdraw_data['cancel'] = count($list_withdraw_cancel) ?? 0;
				$days_withdraw_data['money_cancel'] = $totalAmountCancelWithdraw ?? 0;
				$days_withdraw_data['money_cancel_format'] = format_money($totalAmountCancelWithdraw) . ' VND' ?? 0;
				$days_withdraw_data['pending'] = count($list_withdraw_pending) ?? 0;
				$days_withdraw_data['money_pending'] = $totalAmountPendingWithdraw ?? 0;
				$days_withdraw_data['money_pending_format'] = format_money($totalAmountPendingWithdraw) . ' VND' ?? 0;
				$days_withdraw_data['total'] = count($list_withdraw) ?? 0;
				$days_withdraw_data['money_total'] = $AmountWithdraw ?? 0;
				$days_withdraw_data['money_total_format'] = format_money($AmountWithdraw) . ' VND' ?? 0;
				$days_withdraw_data['day'] = $date->format('d-m-Y');
			} else {
				//withdraw
				$days_withdraw_data['success'] = 0;
				$days_withdraw_data['money_success'] = 0;
				$days_withdraw_data['money_success_format'] = 0;
				$days_withdraw_data['cancel'] = 0;
				$days_withdraw_data['money_cancel'] = 0;
				$days_withdraw_data['money_cancel_format'] = 0;
				$days_withdraw_data['pending'] = 0;
				$days_withdraw_data['money_pending'] = 0;
				$days_withdraw_data['money_pending_format'] = 0;
				$days_withdraw_data['total'] = 0;
				$days_withdraw_data['money_total'] = 0;
				$days_withdraw_data['money_total_format'] = 0;
				$days_withdraw_data['day'] = $date->format('d-m-Y');
			}

			$report_data['days'][$i]['recharge'] = $days_recharge_data;
			$report_data['days'][$i]['withdraw'] = $days_withdraw_data;
			$i++;
		}


		return $report_data;
	}

	public function recharge_filter()
	{
		$daysAgo = 0;
		$accessToken = Auth::user()->access_token();
		$id_partners = Auth::user()->id();

		$ketqua = $this->call_recharge_filter($daysAgo, $accessToken, $id_partners);

		$data_fild = [
			'days' => $ketqua['days'],
			'daysAgo' => $daysAgo,
			'startDate' => $ketqua['startDate'],
			'endDate' => $ketqua['endDate'],
			'totalAmount' => $ketqua['recharge']['money_total_format'],
			'totalSuccessAmount' => $ketqua['recharge']['money_success_format'],
			'totalCancelAmount' => $ketqua['recharge']['money_cancel_format'],
			'totalPendingAmount' => $ketqua['recharge']['money_pending_format'],
			'totalAmountNum' => $ketqua['recharge']['money_total'],
			'totalSuccessAmountNum' => $ketqua['recharge']['money_success'],
			'totalCancelAmountNum' => $ketqua['recharge']['money_cancel'],
			'totalPendingAmountNum' => $ketqua['recharge']['money_pending'],
			'count_recha_total' => $ketqua['recharge']['total'],
			'count_recha_success' => $ketqua['recharge']['success'],
			'count_recha_cancel' => $ketqua['recharge']['cancel'],
			'count_recha_pending' => $ketqua['recharge']['pending'],
			'count_withdraw_total' => $ketqua['withdraw']['total'],
			'count_withdraw_succcess' => $ketqua['withdraw']['success'],
			'count_withdraw_cancel' => $ketqua['withdraw']['cancel'],
			'count_withdraw_pending' => $ketqua['withdraw']['pending'],
			'totalAmountWithdraw' => $ketqua['withdraw']['money_total_format'],
			'totalSuccessAmountWithdraw' => $ketqua['withdraw']['money_success_format'],
			'totalCancelAmountWithdraw' => $ketqua['withdraw']['money_cancel_format'],
			'totalPendingAmountWithdraw' => $ketqua['withdraw']['money_pending_format'],
			'totalAmountWithdrawNum' => $ketqua['withdraw']['money_total'],
			'totalSuccessAmountWithdrawNum' => $ketqua['withdraw']['money_success'],
			'totalCancelAmountWithdrawNum' => $ketqua['withdraw']['money_cancel'],
			'totalPendingAmountWithdrawNum' => $ketqua['withdraw']['money_pending']
		];

		return view('pages.recharge.filter', $data_fild);
	}

	public function recharge_admin_filter()
	{
		$daysAgo = 0;
		$accessToken = Auth::user()->access_token();
		$id_partners = Auth::user()->id();

		$ketqua = $this->call_recharge_filter($daysAgo, $accessToken, $id_partners);

		$data_fild = [
			'days' => $ketqua['days'],
			'daysAgo' => $daysAgo,
			'startDate' => $ketqua['startDate'],
			'endDate' => $ketqua['endDate'],
			'totalAmount' => $ketqua['recharge']['money_total_format'],
			'totalSuccessAmount' => $ketqua['recharge']['money_success_format'],
			'totalCancelAmount' => $ketqua['recharge']['money_cancel_format'],
			'totalPendingAmount' => $ketqua['recharge']['money_pending_format'],
			'totalAmountNum' => $ketqua['recharge']['money_total'],
			'totalSuccessAmountNum' => $ketqua['recharge']['money_success'],
			'totalCancelAmountNum' => $ketqua['recharge']['money_cancel'],
			'totalPendingAmountNum' => $ketqua['recharge']['money_pending'],
			'count_recha_total' => $ketqua['recharge']['total'],
			'count_recha_success' => $ketqua['recharge']['success'],
			'count_recha_cancel' => $ketqua['recharge']['cancel'],
			'count_recha_pending' => $ketqua['recharge']['pending'],
			'count_withdraw_total' => $ketqua['withdraw']['total'],
			'count_withdraw_succcess' => $ketqua['withdraw']['success'],
			'count_withdraw_cancel' => $ketqua['withdraw']['cancel'],
			'count_withdraw_pending' => $ketqua['withdraw']['pending'],
			'totalAmountWithdraw' => $ketqua['withdraw']['money_total_format'],
			'totalSuccessAmountWithdraw' => $ketqua['withdraw']['money_success_format'],
			'totalCancelAmountWithdraw' => $ketqua['withdraw']['money_cancel_format'],
			'totalPendingAmountWithdraw' => $ketqua['withdraw']['money_pending_format'],
			'totalAmountWithdrawNum' => $ketqua['withdraw']['money_total'],
			'totalSuccessAmountWithdrawNum' => $ketqua['withdraw']['money_success'],
			'totalCancelAmountWithdrawNum' => $ketqua['withdraw']['money_cancel'],
			'totalPendingAmountWithdrawNum' => $ketqua['withdraw']['money_pending']
		];

		return view('pages.recharge.admin_filter', $data_fild);
	}

	public function update_recharge_filter(Request $request)
	{
		$list = [
			'accessToken',
			'id_partners',
			'date'
		];

		$arr = $request->only($list);

		$daysAgo = $arr['date'] ?? 0;
		$accessToken = $arr['accessToken'];
		$id_partners = $arr['id_partners'];

		$ketqua = $this->call_recharge_filter($daysAgo, $accessToken, $id_partners);

		$data_fild = [
			'days' => $ketqua['days'],
			'daysAgo' => $daysAgo,
			'startDate' => $ketqua['startDate'],
			'endDate' => $ketqua['endDate'],
			'totalAmount' => $ketqua['recharge']['money_total_format'],
			'totalSuccessAmount' => $ketqua['recharge']['money_success_format'],
			'totalCancelAmount' => $ketqua['recharge']['money_cancel_format'],
			'totalPendingAmount' => $ketqua['recharge']['money_pending_format'],
			'totalAmountNum' => $ketqua['recharge']['money_total'],
			'totalSuccessAmountNum' => $ketqua['recharge']['money_success'],
			'totalCancelAmountNum' => $ketqua['recharge']['money_cancel'],
			'totalPendingAmountNum' => $ketqua['recharge']['money_pending'],
			'count_recha_total' => $ketqua['recharge']['total'],
			'count_recha_success' => $ketqua['recharge']['success'],
			'count_recha_cancel' => $ketqua['recharge']['cancel'],
			'count_recha_pending' => $ketqua['recharge']['pending'],
			'count_withdraw_total' => $ketqua['withdraw']['total'],
			'count_withdraw_succcess' => $ketqua['withdraw']['success'],
			'count_withdraw_cancel' => $ketqua['withdraw']['cancel'],
			'count_withdraw_pending' => $ketqua['withdraw']['pending'],
			'totalAmountWithdraw' => $ketqua['withdraw']['money_total_format'],
			'totalSuccessAmountWithdraw' => $ketqua['withdraw']['money_success_format'],
			'totalCancelAmountWithdraw' => $ketqua['withdraw']['money_cancel_format'],
			'totalPendingAmountWithdraw' => $ketqua['withdraw']['money_pending_format'],
			'totalAmountWithdrawNum' => $ketqua['withdraw']['money_total'],
			'totalSuccessAmountWithdrawNum' => $ketqua['withdraw']['money_success'],
			'totalCancelAmountWithdrawNum' => $ketqua['withdraw']['money_cancel'],
			'totalPendingAmountWithdrawNum' => $ketqua['withdraw']['money_pending']
		];

		return view('pages.recharge.filter', $data_fild);
	}

	public function update_recharge_admin_filter(Request $request)
	{
		$list = [
			'accessToken',
			'id_partners',
			'date'
		];

		$arr = $request->only($list);

		$daysAgo = $arr['date'] ?? 0;
		$accessToken = $arr['accessToken'];
		$id_partners = $arr['id_partners'];

		$ketqua = $this->call_recharge_filter($daysAgo, $accessToken, $id_partners);

		$data_fild = [
			'days' => $ketqua['days'],
			'daysAgo' => $daysAgo,
			'startDate' => $ketqua['startDate'],
			'endDate' => $ketqua['endDate'],
			'totalAmount' => $ketqua['recharge']['money_total_format'],
			'totalSuccessAmount' => $ketqua['recharge']['money_success_format'],
			'totalCancelAmount' => $ketqua['recharge']['money_cancel_format'],
			'totalPendingAmount' => $ketqua['recharge']['money_pending_format'],
			'totalAmountNum' => $ketqua['recharge']['money_total'],
			'totalSuccessAmountNum' => $ketqua['recharge']['money_success'],
			'totalCancelAmountNum' => $ketqua['recharge']['money_cancel'],
			'totalPendingAmountNum' => $ketqua['recharge']['money_pending'],
			'count_recha_total' => $ketqua['recharge']['total'],
			'count_recha_success' => $ketqua['recharge']['success'],
			'count_recha_cancel' => $ketqua['recharge']['cancel'],
			'count_recha_pending' => $ketqua['recharge']['pending'],
			'count_withdraw_total' => $ketqua['withdraw']['total'],
			'count_withdraw_succcess' => $ketqua['withdraw']['success'],
			'count_withdraw_cancel' => $ketqua['withdraw']['cancel'],
			'count_withdraw_pending' => $ketqua['withdraw']['pending'],
			'totalAmountWithdraw' => $ketqua['withdraw']['money_total_format'],
			'totalSuccessAmountWithdraw' => $ketqua['withdraw']['money_success_format'],
			'totalCancelAmountWithdraw' => $ketqua['withdraw']['money_cancel_format'],
			'totalPendingAmountWithdraw' => $ketqua['withdraw']['money_pending_format'],
			'totalAmountWithdrawNum' => $ketqua['withdraw']['money_total'],
			'totalSuccessAmountWithdrawNum' => $ketqua['withdraw']['money_success'],
			'totalCancelAmountWithdrawNum' => $ketqua['withdraw']['money_cancel'],
			'totalPendingAmountWithdrawNum' => $ketqua['withdraw']['money_pending']
		];

		return view('pages.recharge.admin_filter', $data_fild);
	}

	public function getData(Request $request, RechargeDataFilterTableDataTable $dataTable)
	{
		if (Auth::user()->role() == 'admin') {
			$datas = Recharge::orderBy('id', 'DESC')->where('trang_thai', 'cancel')->take(150)->get();
		} else {
			$datas = Recharge::where('id_partners', Auth::user()->id())->orderBy('id', 'DESC')->take(150)->get();
		}

		return Datatables::of($datas)
			->addColumn('action', function (Recharge $datas) {
				return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('recharge.getdetail') . '"
								onclick="getDetailRecharge(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalrecharge">
								Cập Nhật
							</a>
					</td>';
			})
			->editColumn('trang_thai', function (Recharge $datas) {
				$badgeClass = '';
				switch ($datas->trang_thai) {
					case 'pending':
						$badgeClass = 'badge-light-warning';
						break;
					case 'cancel':
						$badgeClass = 'badge-light-danger';
						break;
					case 'confirm':
						$badgeClass = 'badge-light-warning';
						break;
					default:
						$badgeClass = 'badge-light-primary';
						break;
				}

				return '<span class="badge py-3 px-4 fs-7 ' . $badgeClass . '"> ' . $datas->trang_thai . '</span>';
			})
			->editColumn('status', function (Recharge $datas) {
				return $datas->trang_thai;
			})
			->editColumn('cronjob', function (Recharge $datas) {
				return $datas->cronjob;
			})
			->editColumn('partners', function (Recharge $datas) {
				$temp = DB::table('users')->where('id', $datas->id_partners)->value('first_name');

				return $temp;
			})
			->editColumn('countdown', function (Recharge $datas) {
				$countdown = "timeresult_" . $datas->id;
				return '<div id="' . $countdown . '" > </div>';
			})
			->editColumn('created_at', function (Recharge $datas) {
				$countdown = "countdown_" . $datas->id;
				$timeadd = Carbon::parse($datas->created_at)->format('d-m-Y H:i:s');
				return '<div class="badge py-3 px-4 fs-7 badge-light-primary ' . $countdown . '" > ' . $timeadd . ' </div>';
			})
			->editColumn('time', function (Recharge $datas) {
				$countdown = "time_" . $datas->id;

				$timeadd = date('d-m-Y H:i:s', strtotime($datas->created_at));

				return '<input type="hidden"  name="' . $countdown . '" value="' . $timeadd . '" ></input>';

			})
			->editColumn('bankcode', function (Recharge $datas) {
				$bank = DB::table('bankcodes')->where('code', $datas->bankcode)->first();
				return $bank ? $bank->name : $datas->bankcode;
			})
			->editColumn('amount', function (Recharge $datas) {
				return number_format($datas->amount, 0, '', ',');
			})
			->rawColumns([
				'action', 'partners', 'created_at', 'trang_thai', 'countdown', 'time',
				'amount', 'bankcode', 'status', 'cronjob'
			])
			->toJson();
	}
	// end filter
}
