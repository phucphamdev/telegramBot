<?php

namespace App\Http\Controllers;

use App\DataTables\HistoryBankDataTable;
use App\Models\Acbtranfer;
use App\Models\HistoryBank;
use App\Models\TPBank;
use App\Models\transactionMbBankHistoryList;
use App\Models\transactionsVietcombank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Telegram\Bot\Laravel\Facades\Telegram;
use Yajra\DataTables\DataTables;

class HistoryBankController extends Controller
{
	public function index(HistoryBankDataTable $dataTable)
	{
		$user_role = Auth::user()->role();

		$mbbank = transactionMbBankHistoryList::all();
		foreach ($mbbank as $mb) {
			$data['groupbank'] = 'MBBank';
			$data['id_bank'] = $mb->id;
			$data['id_refNo'] = $mb->id_refNo;
			$data['refNo'] = $mb->refNo;
			$data['description'] = $mb->description;
			$data['accountNo'] = $mb->accountNo;
			$data['debitAmount'] = $mb->debitAmount;

			$item = HistoryBank::where('groupbank', 'MBBank')
				->where('id_refNo', $mb->id_refNo)
				->get();
//									->first();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch MBBank Mới !! </b>\n"
					. "<b> Nội Dung  : </b>\n"
					. $data['description'] . "\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		$acbbank = Acbtranfer::all();
		foreach ($acbbank as $acb) {
			$data['groupbank'] = 'ACB';
			$data['id_bank'] = $acb->id;
			$data['id_refNo'] = $acb->transactionNumber;
			$data['refNo'] = $acb->transactionNumber;
			$data['description'] = $acb->description;
			$data['accountNo'] = $acb->accountName;
			$data['debitAmount'] = $acb->amount;

			$item = HistoryBank::where('groupbank', 'ACB')
				->where('id_refNo', $acb->transactionNumber)
				->get();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch ACB Mới !! </b>\n"
					. "<b> Nội Dung  : </b>\n"
					. $data['description'] . "\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		$vcbbank = transactionsVietcombank::all();

		foreach ($vcbbank as $vcb) {
			$data['groupbank'] = 'VCB';
			$data['id_bank'] = $vcb->id;
			$data['id_refNo'] = $vcb->PCTime;
			$data['refNo'] = $vcb->Reference;
			$data['description'] = $vcb->Description;
			$data['accountNo'] = $vcb->Amount;
			$data['debitAmount'] = $vcb->Amount;

			$item = HistoryBank::where('groupbank', 'VCB')
				->where('id_refNo', $vcb->PCTime)
				->get();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch VCB Mới !! </b>\n"
					. "<b> Nội Dung  : </b>\n"
					. $data['description'] . "\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		$tpbank = TPBank::all();

		foreach ($tpbank as $tpb) {
			$data['groupbank'] = 'TPBank';
			$data['id_bank'] = $tpb->id;
			$data['id_refNo'] = $tpb->arrangementId;
			$data['refNo'] = $tpb->reference;
			$data['description'] = $tpb->description;
			$data['accountNo'] = $tpb->amount;
			$data['debitAmount'] = $tpb->amount;

			$item = HistoryBank::where('groupbank', 'TPBank')
				->where('refNo', $tpb->reference)
				->get();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch TPBank Mới !! </b>\n"
					. "<b> Nội Dung  : </b>\n"
					. $data['description'] . "\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		if ($user_role == 'admin') {
			return $dataTable->render('pages.historybank.index');
		}

		if ($user_role == 'partner') {
			return $dataTable->render('users.historybank.index');
		}
	}

	public function loading()
	{
		$mbbank = transactionMbBankHistoryList::all();
		foreach ($mbbank as $mb) {
			$data['groupbank'] = 'MBBank';
			$data['id_bank'] = $mb->id;
			$data['id_refNo'] = $mb->id_refNo;
			$data['refNo'] = $mb->refNo;
			$data['description'] = $mb->description;
			$data['accountNo'] = $mb->accountNo;
			$data['debitAmount'] = $mb->debitAmount;

			$item = HistoryBank::where('groupbank', 'MBBank')
				->where('id_refNo', $mb->id_refNo)
				->get();
//									->first();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch MBBank Mới !! </b>\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		$acbbank = Acbtranfer::all();
		foreach ($acbbank as $acb) {
			$data['groupbank'] = 'ACB';
			$data['id_bank'] = $acb->id;
			$data['id_refNo'] = $acb->transactionNumber;
			$data['refNo'] = $acb->transactionNumber;
			$data['description'] = $acb->description;
			$data['accountNo'] = $acb->accountName;
			$data['debitAmount'] = $acb->amount;

			$item = HistoryBank::where('groupbank', 'ACB')
				->where('id_refNo', $acb->transactionNumber)
				->get();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch ACB Mới !! </b>\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		$vcbbank = transactionsVietcombank::all();

		foreach ($vcbbank as $vcb) {
			$data['groupbank'] = 'VCB';
			$data['id_bank'] = $vcb->id;
			$data['id_refNo'] = $vcb->PCTime;
			$data['refNo'] = $vcb->Reference;
			$data['description'] = $vcb->Description;
			$data['accountNo'] = $vcb->Amount;
			$data['debitAmount'] = $vcb->Amount;

			$item = HistoryBank::where('groupbank', 'VCB')
				->where('id_refNo', $vcb->PCTime)
				->get();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch VCB Mới !! </b>\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}

		$tpbank = TPBank::all();

		foreach ($tpbank as $tpb) {
			$data['groupbank'] = 'TPBank';
			$data['id_bank'] = $tpb->id;
			$data['id_refNo'] = $tpb->arrangementId;
			$data['refNo'] = $tpb->reference;
			$data['description'] = $tpb->description;
			$data['accountNo'] = $tpb->amount;
			$data['debitAmount'] = $tpb->amount;

			$item = HistoryBank::where('groupbank', 'TPBank')
				->where('refNo', $tpb->reference)
				->get();

			if (count($item) == 0) {
				HistoryBank::create($data);

				$text_content = "<b>Có Giao Dịch TPBank Mới !! </b>\n"
					. "<b> Cập Nhật: </b>\n"
					. now();

				Telegram::sendMessage([
					'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
					'parse_mode' => 'HTML',
					'text' => $text_content
				]);
			} else {
//					$item->update($data);
//					$item->save();
			}
		}
	}

	public function datatables()
	{
		$datas = HistoryBank::latest('id')->get();

		return Datatables::of($datas)
			->addColumn('action', function (HistoryBank $data) {
				return '<td class="text-end">
						<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.getdetail') . '" onclick="getDetailHistorybank(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistorybank">View</a>
							
							<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.destroy', $data->id) . '" onclick="getDeleteHistorybank(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
			})
			->editColumn('groupbank', function (HistoryBank $datas) {
				return $datas->groupbank;
			})
			->editColumn('doi_tac', function (HistoryBank $datas) {
				if (empty($datas->doi_tac)) {
					return "No Data";
				} else {
					$partners = User::where('id', $datas->doi_tac)->first();

					if (isset($partners->first_name)) {
						return $partners->first_name;
					}

					return $datas->doi_tac;
				}


			})
			->editColumn('id_refNo', function (HistoryBank $datas) {
				return $datas->id_refNo;
			})
			->editColumn('refNo', function (HistoryBank $datas) {
				return $datas->refNo;
			})
			->editColumn('description', function (HistoryBank $datas) {
				return $datas->description;
			})
			->editColumn('accountNo', function (HistoryBank $datas) {
				return $datas->accountNo;
			})
			->editColumn('debitAmount', function (HistoryBank $datas) {
				return $datas->debitAmount;
			})
			->addColumn('created_at', function (HistoryBank $data) {
				return date('d-m-Y', strtotime($data->created_at));
			})
			->rawColumns(['doi_tac', 'action', 'groupbank', 'id_refNo', 'refNo', 'description', 'accountNo', 'debitAmount', 'created_at', 'trang_thai'])
			->toJson();
	}

	public function vcb_historybank(HistoryBankDataTable $dataTable)
	{
		return $dataTable->render('pages.historybank.vcb.index');
	}

	public function acb_historybank(HistoryBankDataTable $dataTable)
	{
		return $dataTable->render('pages.historybank.acb.index');
	}

	public function mbbank_historybank(HistoryBankDataTable $dataTable)
	{
		return $dataTable->render('pages.historybank.mbbank.index');
	}

	public function tpbank_historybank(HistoryBankDataTable $dataTable)
	{
		return $dataTable->render('pages.historybank.tpbank.index');
	}

	public function datatables_vcb_historybank()
	{
		$datas = HistoryBank::where('groupbank', 'VCB')->get();

		return Datatables::of($datas)
			->addColumn('action', function (HistoryBank $data) {
				return '<td class="text-end">
						<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.getdetail') . '" onclick="getDetailHistorybank(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistorybank">View</a>
							
							<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.destroy', $data->id) . '" onclick="getDeleteHistorybank(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
			})
			->editColumn('groupbank', function (HistoryBank $datas) {
				return $datas->groupbank;
			})
			->editColumn('doi_tac', function (HistoryBank $datas) {
				if (empty($datas->doi_tac)) {
					return "No Data";
				} else {
					$partners = User::where('id', $datas->doi_tac)->first();

					if (isset($partners->first_name)) {
						return $partners->first_name;
					}

					return $datas->doi_tac;
				}


			})
			->editColumn('id_refNo', function (HistoryBank $datas) {
				return $datas->id_refNo;
			})
			->editColumn('refNo', function (HistoryBank $datas) {
				return $datas->refNo;
			})
			->editColumn('description', function (HistoryBank $datas) {
				return $datas->description;
			})
			->editColumn('accountNo', function (HistoryBank $datas) {
				return $datas->accountNo;
			})
			->editColumn('debitAmount', function (HistoryBank $datas) {
				return $datas->debitAmount;
			})
			->addColumn('created_at', function (HistoryBank $data) {
				return date('d-m-Y', strtotime($data->created_at));
			})
			->rawColumns(['doi_tac', 'action', 'groupbank', 'id_refNo', 'refNo', 'description', 'accountNo', 'debitAmount', 'created_at', 'trang_thai'])
			->toJson();
	}

	public function datatables_acb_historybank()
	{
		$datas = HistoryBank::where('groupbank', 'ACB')->get();

		return Datatables::of($datas)
			->addColumn('action', function (HistoryBank $data) {
				return '<td class="text-end">
						<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.getdetail') . '" onclick="getDetailHistorybank(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistorybank">View</a>
							
							<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.destroy', $data->id) . '" onclick="getDeleteHistorybank(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
			})
			->editColumn('groupbank', function (HistoryBank $datas) {
				return $datas->groupbank;
			})
			->editColumn('doi_tac', function (HistoryBank $datas) {
				if (empty($datas->doi_tac)) {
					return "No Data";
				} else {
					$partners = User::where('id', $datas->doi_tac)->first();

					if (isset($partners->first_name)) {
						return $partners->first_name;
					}

					return $datas->doi_tac;
				}


			})
			->editColumn('id_refNo', function (HistoryBank $datas) {
				return $datas->id_refNo;
			})
			->editColumn('refNo', function (HistoryBank $datas) {
				return $datas->refNo;
			})
			->editColumn('description', function (HistoryBank $datas) {
				return $datas->description;
			})
			->editColumn('accountNo', function (HistoryBank $datas) {
				return $datas->accountNo;
			})
			->editColumn('debitAmount', function (HistoryBank $datas) {
				return $datas->debitAmount;
			})
			->addColumn('created_at', function (HistoryBank $data) {
				return date('d-m-Y', strtotime($data->created_at));
			})
			->rawColumns(['doi_tac', 'action', 'groupbank', 'id_refNo', 'refNo', 'description', 'accountNo', 'debitAmount', 'created_at', 'trang_thai'])
			->toJson();
	}

	public function datatables_mbbank_historybank()
	{
		$datas = HistoryBank::where('groupbank', 'MBBank')->orderByDesc('ID')->get();

		return Datatables::of($datas)
			->addColumn('action', function (HistoryBank $data) {
				return '<td class="text-end">
						<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.getdetail') . '" onclick="getDetailHistorybank(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistorybank">View</a>
							
							<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.destroy', $data->id) . '" onclick="getDeleteHistorybank(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
			})
			->editColumn('groupbank', function (HistoryBank $datas) {
				return $datas->groupbank;
			})
			->editColumn('doi_tac', function (HistoryBank $datas) {
				if (empty($datas->doi_tac)) {
					return "No Data";
				} else {
					$partners = User::where('id', $datas->doi_tac)->first();

					if (isset($partners->first_name)) {
						return $partners->first_name;
					}

					return $datas->doi_tac;
				}


			})
			->editColumn('id_refNo', function (HistoryBank $datas) {
				return $datas->id_refNo;
			})
			->editColumn('refNo', function (HistoryBank $datas) {
				return $datas->refNo;
			})
			->editColumn('description', function (HistoryBank $datas) {
				return $datas->description;
			})
			->editColumn('accountNo', function (HistoryBank $datas) {
				return $datas->accountNo;
			})
			->editColumn('debitAmount', function (HistoryBank $datas) {
				return $datas->debitAmount;
			})
			->addColumn('created_at', function (HistoryBank $data) {
				return date('d-m-Y', strtotime($data->created_at));
			})
			->rawColumns(['doi_tac', 'action', 'groupbank', 'id_refNo', 'refNo', 'description', 'accountNo', 'debitAmount', 'created_at', 'trang_thai'])
			->toJson();
	}

	public function datatables_tpbank_historybank()
	{
		$datas = HistoryBank::where('groupbank', 'TPBank')->get();

		return Datatables::of($datas)
			->addColumn('action', function (HistoryBank $data) {
				return '<td class="text-end">
						<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.getdetail') . '" onclick="getDetailHistorybank(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistorybank">View</a>
							
							<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('historybank.destroy', $data->id) . '" onclick="getDeleteHistorybank(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
			})
			->editColumn('groupbank', function (HistoryBank $datas) {
				return $datas->groupbank;
			})
			->editColumn('doi_tac', function (HistoryBank $datas) {
				if (empty($datas->doi_tac)) {
					return "No Data";
				} else {
					$partners = User::where('id', $datas->doi_tac)->first();

					if (isset($partners->first_name)) {
						return $partners->first_name;
					}

					return $datas->doi_tac;
				}


			})
			->editColumn('id_refNo', function (HistoryBank $datas) {
				return $datas->id_refNo;
			})
			->editColumn('refNo', function (HistoryBank $datas) {
				return $datas->refNo;
			})
			->editColumn('description', function (HistoryBank $datas) {
				return $datas->description;
			})
			->editColumn('accountNo', function (HistoryBank $datas) {
				return $datas->accountNo;
			})
			->editColumn('debitAmount', function (HistoryBank $datas) {
				return $datas->debitAmount;
			})
			->addColumn('created_at', function (HistoryBank $data) {
				return date('d-m-Y', strtotime($data->created_at));
			})
			->rawColumns(['doi_tac', 'action', 'groupbank', 'id_refNo', 'refNo', 'description', 'accountNo', 'debitAmount', 'created_at', 'trang_thai'])
			->toJson();
	}

	public function datatables_user()
	{
		$user_role = Auth::user()->role();

		if ($user_role == 'partner' && Auth::user()->id) {
			$datas = HistoryBank::where('doi_tac', Auth::user()->id)->get();

			return Datatables::of($datas)
				->editColumn('groupbank', function (HistoryBank $datas) {
					return $datas->groupbank;
				})
				->editColumn('doi_tac', function (HistoryBank $datas) {
					if ($datas->doi_tac == Auth::user()->id) {
						return Auth::user()->first_name();
					}

					return $datas->doi_tac;

				})
				->editColumn('id_refNo', function (HistoryBank $datas) {
					return $datas->id_refNo;
				})
				->editColumn('refNo', function (HistoryBank $datas) {
					return $datas->refNo;
				})
				->editColumn('description', function (HistoryBank $datas) {
					return $datas->description;
				})
				->editColumn('accountNo', function (HistoryBank $datas) {
					return $datas->accountNo;
				})
				->editColumn('debitAmount', function (HistoryBank $datas) {
					return $datas->debitAmount;
				})
				->addColumn('created_at', function (HistoryBank $data) {
					return date('d-m-Y', strtotime($data->created_at));
				})
				->rawColumns(['doi_tac', 'groupbank', 'id_refNo', 'refNo', 'description', 'accountNo', 'debitAmount', 'created_at', 'trang_thai'])
				->toJson();
		}

	}

	public function getdetail(Request $request)
	{
		$data = $request->all();

		$data = HistoryBank::where('id', $data['id'])->first();

		return response()->json($data);
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show($id)
	{
		$data = HistoryBank::where('id', $id)->first();

		return view('pages.historybank.show', compact('data'));
	}

	public function edit($id)
	{
		$data = HistoryBank::where('id', $id)->first();

		return view('pages.historybank.edit', compact('data'));
	}

	public function update(Request $request)
	{
		$data = $request->all();

		$list = [
			'id',
			'ma_gd',
			'ten_khach_hang',
			'tai_khoan_nhan',
			'tai_khoan_khach_hang',
			'so_tien_thuc_nhan',
			'so_tien',
			'noi_dung',
			'doi_tac',
			'trang_thai'
		];

		if ($data['trang_thai'] == 'on') {
			$data['trang_thai'] = "active";
		} else {
			$data['trang_thai'] = "inactive";
		}


		$arr = [];
		foreach ($data as $key => $val) {
			if (in_array($key, $list)) {
				$arr[$key] = $val;
			}
		}

		$object = HistoryBank::where('id', $arr['id'])->first();

		$object->update($arr);
		$object->save();

		return response()->json(true);

	}

	public function destroy(Request $request)
	{
		$arr = $request->all();
		$data = HistoryBank::where('id', $arr['id'])->first();
		if (isset($data)) {
			$data->delete();
		} else {
			return response()->json(false);
		}

		return response()->json(true);
	}
}
