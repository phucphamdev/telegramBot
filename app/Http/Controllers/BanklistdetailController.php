<?php

namespace App\Http\Controllers;

use App\DataTables\PartnersDataTable;
use App\Models\Banklistdetail;
use App\Models\Banks;
use App\Models\Bankscode;
use App\Models\Recharge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use \stdClass;

class BanklistdetailController extends Controller
{

	public function index(PartnersDataTable $dataTable)
	{
		$listbank = Banks::where('trang_thai', 'active')->get();
		$bankscode = Bankscode::all();

		$user_role = Auth::user()->role();

		if ($user_role == 'admin') {
			return $dataTable->render('pages.partners.banklist', compact('listbank', 'bankscode'));
		}

	}

	public function datatables2()
	{
		try {

			$datas = User::where('type', 2)->get();

			return Datatables::of($datas)
				->addColumn('action', function (User $datas) {
					return '<td class="text-end">
							<div class="d-flex justify-content-end flex-shrink-0">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('partnersbanklist.getdetail') . '"
								onclick="getDetailpartnersbanklist(event, this); return false;"
								class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 detail"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalpartnersbanklist">
								<span class="svg-icon svg-icon-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
									</svg>
								</span>
							</a>
						</div>
					</td>';
				})
				->addColumn('banklist', function (User $datas) {
					$list = Banklistdetail::where('id_partners', $datas->id)
						->where('trang_thai', "active")
						->get();
					if (count($list) > 0) {
						$arr = '';
						foreach ($list as $item) {
							$temp = DB::table('bankcodes')->where('code', $item->id_bank)->get();
							foreach ($temp as $pro) {
								$arr .= '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $pro->name . '</span>';
							}
						}

						return $arr;
					}

					return "No Data";
				})
				->rawColumns(['action', 'banklist'])
				->toJson();

		} catch (\Exception $e) {
			// ghi log
			\Log::info("datatables2:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function getdetail(Request $request)
	{

		try {

			$data = $request->all();

			$object = User::where('id', $data['id'])->first();

			$arr = '<input type="hidden" class="form-control form-control-solid"  value="' . $data['id'] . '" name="id"/>';


			$list = Banklistdetail::where('id_partners', $data['id'])->where('trang_thai', "active")->get();
			$data_arr = $object;

			if (count($list) > 0) {
				foreach ($list as $item) {
					$temp = DB::table('banks')->where('bankcode', $item->id_bank)->get();
					foreach ($temp as $pro) {
						$data = $pro;
					}
					$arr .= '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $data->full_name . '</span>';
				}
				$data_arr['list'] = $arr;
			}

			return response()->json($arr);

		} catch (\Exception $e) {
			// ghi log
			\Log::info("getdetail:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}

	}

	public function updatebanklist(Request $request)
	{

		try {

			$data = $request->all();

			$list = [
				'first_name',
				'last_name',
				'email',
				'password',
				'type',
				'callback_link',
				'access_token',
				'banklist',
				'ip',
				'key',
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					if ($key == 'password') {
						$arr[$key] = Hash::make($val);
					} else {
						$arr[$key] = $val;
					}
				}
			}

			// tạo ra json danh sach bank cho doi tac nay dung


			$object = User::where('id', $request->id)->first();
			$object->update($arr);
			$object->save();

			return response()->json(true);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("updatebanklist:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show(Banklistdetail $banklistdetail)
	{
		//
	}

	public function edit(Banklistdetail $banklistdetail)
	{
		//
	}

	public function update(Request $request)
	{
		try {


			$data = $request->all();

			$list = [
				'first_name',
				'last_name',
				'email',
				'password',
				'type',
				'callback_link',
				'access_token',
				'ip',
				'key',
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					if ($key == 'password') {
						$arr[$key] = Hash::make($val);
					} else {
						$arr[$key] = $val;
					}
				}
			}


			$object = User::where('id', $request->id)->first();
			$object->update($arr);
			$object->save();

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

	public function update2(Request $request)
	{

		try {

			$data = $request->all();

			$list = [
				'id',
				'tags',
				'checkboxes',
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = Banklistdetail::where('id_partners', $arr['id'])->get();

			if (count($object) > 0) {
				Banklistdetail::where('id_partners', $arr['id'])->delete();
			}


			foreach (json_decode($arr['tags']) as $key => $tag_item) {
				Banklistdetail::create([
					'id_partners' => $arr['id'],
					'id_bank' => $tag_item->name,
					'trang_thai' => 'active'
				]);
			}

			return response()->json(true);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("update2:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}


	}

	public function apiCheckPartner(Request $request)
	{
		try {
			$data = $request->all();

			$list = [
				'key',
				'accessToken',
			];

			$arr = [];
			$send = [];
			$kq = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			if (isset($arr['key']) && isset($arr['accessToken'])) {

				$check_user_key = User::where('key', $arr['key'])->first();
				$check_user_access_token = User::where('access_token', $arr['accessToken'])->first();

				if (!isset($check_user_key) || !isset($check_user_access_token)) {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key error or  access_token error ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}

				if ($check_user_key->id == $check_user_access_token->id) {
					$partners = User::where('key', $arr['key'])
						->where('access_token', $arr['accessToken'])
						->first();
					if (isset($partners)) {
						$objects = Banklistdetail::where('id_partners', $partners->id)->get();

						if ($objects->isNotEmpty()) {
							$kq = [
								'isError' => false,
								'message' => "Success",
								'data' => []
							];

							foreach ($objects as $val2) {
								$temp = DB::table('banks')
									->where('bankcode', $val2->id_bank)
									->where('trang_thai', 'active')
									->first();

								if ($temp) {
									$data2 = [
										'cardName' => $temp->full_name,
										'cardCode' => $temp->number1,
										'bankName' => $temp->name,
										'account' => $temp->number1,
										'bankcode' => $temp->bankcode,
										'shortName' => $temp->bankcode,
									];

									$kq['data'] = $data2;

									return response()->json($kq);
								}
							}

//							return response()->json($kq);
						}

						$result['errorCode'] = 404;
						$result['errorDescription'] = "khong co ngan hang nao cho ban , hay lien he Admin de duoc ho tro !! ";
						$result['errorData'] = [];

						return response()->json($result);

					}
				} else {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key / access_token ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}
			}

			$result['errorCode'] = 404;
			$result['errorDescription'] = "Tham so truyen vao khong day du hoac khong chinh xac";
			$result['errorData'] = [];

			return response()->json($result);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("apiCheckPartner:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}
	}

	public function apiGetBanksPartner(Request $request)
	{


		try {

			$data = $request->all();

			$list = [
				'key',
				'accessToken',
			];

			$arr = [];
			$send = [];
			$kq = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			if (isset($arr['key']) && isset($arr['accessToken'])) {

				$check_user_key = User::where('key', $arr['key'])->first();
				$check_user_access_token = User::where('access_token', $arr['accessToken'])->first();

				if (!isset($check_user_key) || !isset($check_user_access_token)) {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key error or  access_token error ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}

				if ($check_user_key->id == $check_user_access_token->id) {
					$partners = User::where('key', $arr['key'])
						->where('access_token', $arr['accessToken'])
						->first();
					if (isset($partners)) {
						$objects = Banklistdetail::where('id_partners', $partners->id)->get();

						if ($objects->isNotEmpty()) {
							$data3 = [];

							foreach ($objects as $val2) {
								$temp = DB::table('banks')
									->where('bankcode', $val2->id_bank)
									->where('id_partners', $partners->id)
									->where('trang_thai', 'active')
									->first();

								if ($temp) {
									$data2 = [
										'cardName' => $temp->full_name,
										'cardCode' => $temp->number1,
										'bankName' => $temp->name,
										'account' => $temp->number1,
										'bankCode' => $temp->bankcode,
										'shortName' => $temp->bankcode,
									];

									$data3[] = $data2;
								}
							}

							$kq = [
								'isError' => false,
								'message' => "Success",
								'data' => $data3
							];

							return response()->json($kq);
						}

						$result['errorCode'] = 404;
						$result['errorDescription'] = "khong co ngan hang nao cho ban , hay lien he Admin de duoc ho tro !! ";
						$result['errorData'] = [];

						return response()->json($result);

					}
				} else {
					$result['errorCode'] = 404;
					$result['errorDescription'] = "Tai khoan khong ton tai ( key / access_token ) ";
					$result['errorData'] = [];

					return response()->json($result);
				}
			}

			$result['errorCode'] = 404;
			$result['errorDescription'] = "Tham so truyen vao khong day du hoac khong chinh xac";
			$result['errorData'] = [];

			return response()->json($result);


		} catch (\Exception $e) {
			// ghi log
			\Log::info("apiGetBanksPartner:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);

		}


	}

	public function destroy(Banklistdetail $banklistdetail)
	{
		//
	}
}
