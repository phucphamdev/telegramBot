<?php

	namespace App\Http\Controllers;

	use App\DataTables\PartnersDataTable;
	use App\Http\Requests\Recharge;
	use App\Models\Banks;
	use App\Models\Partners;
	use App\Models\System;
	use Carbon\Carbon;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Str;
	use Illuminate\Support\Facades\Hash;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Telegram\Bot\Laravel\Facades\Telegram;
	use Yajra\DataTables\DataTables;

	class PartnersController extends Controller
	{

		public function document()
		{
			$document = array();

			return view('pages.partners.document.index',compact('document'));
		}

		public function index(PartnersDataTable $dataTable)
		{
			$user_role = Auth::user()->role();

			if ($user_role == 'admin') {
				return $dataTable->render('pages.partners.index');
			}

			if ($user_role == 'partner') {
				return $dataTable->render('users.partners.index');
			}
		}

		public function profile()
		{
			$user = Auth::user();

			return view('pages.partners.profile',compact('user'));
		}

		public function cron_vcb()
		{
			$user = Auth::user();
			$info = System::where('id', 999)->first();

			return view('pages.partners.cron_vcb',compact('user','info'));
		}

		public function vcb()
		{
			$user = Auth::user();
			$info = System::where('id', 999)->first();
			$vcb = new VietcombankController();
			$history = $vcb->getHistories();

			return view('pages.partners.vcb',compact('user','info','history'));
		}

		public function updateProfile(Request $request)
		{
			$data = $request->all();

			$list = [
				'id',
				'first_name',
				'last_name'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = User::where('id', $arr['id'])->first();

			/////////////////////////////////////////////////////////////////////////
			$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$date->setTimezone('+7');
			$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
			//user
			$data_logs['id_user'] = Auth::user()->id();
			$data_logs['created_at'] = $created_at;
			$data_logs['updated_at'] = $created_at;
			//user
			$data_logs['type'] = 'profile';
			// data old
			$data_logs['old'] = json_encode($object);
			// data new
			$data_logs['new'] = json_encode($arr);
			// add logs
			DB::table('logs_profile')->insert($data_logs);
			/////////////////////////////////////////////////////////////////////////

			if(isset($object))
			{
				$object->update($arr);
				$object->save();

				return response()->json(true);

			}else
			{
				return response()->json(false);
			}

			return response()->json(false);



		}

		public function cron_vcb_update(Request $request)
		{
			$data = $request->only(['sessionId']);

			$object = System::where('id', 999)->first();
			$object->update($data);

			return redirect()->back();
		}

		public function partners_logs()
		{
			$user = Auth::user();

			return view('pages.partners.partners_logs',compact('user'));
		}

		public function banklist(PartnersDataTable $dataTable)
		{
			$listbank = Banks::where('trang_thai','active')->get();

			$user_role = Auth::user()->role();

			if ($user_role == 'admin') {
				return $dataTable->render('pages.partners.banklist',compact('listbank'));
			}

			if ($user_role == 'partner') {
				return $dataTable->render('users.partners.banklist',compact('listbank'));
			}
		}

		public function apiIndex()
		{
			return response()->json([
				'data' => User::all(),
			]);
		}

		public function apiGetUserDetail($id)
		{
			return response()->json([
				'data' => User::where('id', $id)->first(),
			]);
		}

		public function datatables()
		{
			$datas = User::where('type', 2)->get();

			return Datatables::of($datas)
				->addColumn('action', function (User $datas) {
					return '<td class="text-end">
							<div class="d-flex justify-content-end flex-shrink-0">
							<a href="#"
									data-id="' . $datas->id . '"
								data-url="' . route('users.getdetail') . '"
								onclick="getDetailPartners(event, this); return false;"
								class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 detail"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalpartners"
							>
								<span class="svg-icon svg-icon-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
									</svg>
								</span>
							</a>
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('users.destroy', $datas->id) . '"
								onclick="getDeletePartners(event, this); return false;"
								class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
							>
								<span class="svg-icon svg-icon-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
										<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
										<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
									</svg>
								</span>
							</a>
						</div>
					</td>';
				})
				->editColumn('created_at', function (User $datas) {
					return date('d-m-Y', strtotime($datas->created_at));
				})
				->editColumn('ck_bank', function (User $datas) {
					return '<span class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'. $datas->ck_bank.' % </span>';
				})
				->editColumn('ck_zalo', function (User $datas) {
					return '<span class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'. $datas->ck_zalo.' % </span>';
				})
				->editColumn('ck_vtpay', function (User $datas) {
					return '<span class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'. $datas->ck_vtpay.' % </span>';
				})
				->editColumn('ck_momo', function (User $datas) {
					return '<span class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">'. $datas->ck_momo.' % </span>';
				})
				->editColumn('so_du', function (User $datas) {
					return '<span class="class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"">'. number_format($datas->so_du,-2) .'</span>';
				})
//				->editColumn('trang_thai', function (User $datas) {
//					if ($datas->trang_thai == 'active') {
//						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->trang_thai . '</span>';
//					}
//
//					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
//				})
				->rawColumns(['action','so_du','ck_bank','ck_zalo','ck_vtpay','ck_momo', 'created_at'])
				->toJson();
		}

		public function datatables2()
		{
			$datas = User::where('type', 2)->get();

			return Datatables::of($datas)
				->addColumn('action', function (User $datas) {
					return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('partnersbanklist.getdetail') . '"
								onclick="getDetailpartnersbanklist(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalpartnersbanklist">
								View
							</a>
					</td>';
				})
				->editColumn('created_at', function (User $datas) {
					return date('d-m-Y', strtotime($datas->created_at));
				})
				->editColumn('ck_bank', function (User $datas) {
					return '<td class="text-dark fw-bold text-hover-primary fs-6">'.$datas->ck_bank.'</td>';
				})
				->editColumn('banklist', function (User $datas) {
					return !empty(json_decode($datas->banklist)) ? json_decode($datas->banklist) : "No Data";
				})
				->rawColumns(['action','ck_bank','ck_zalo','ck_vtpay','ck_momo', 'created_at'])
				->toJson();
		}

		public function getdetail(Request $request)
		{
			$data = $request->all();

			$data = User::where('id', $data['id'])->first();

			return response()->json($data);
		}

		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			User::create([
				'first_name' => $request->name,
				'UUID' => "Partner_" . Str::random(30),
				'last_name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'email_verified_at' => now(),
				'type' => 2,
				'access_token' => $request->access_token,
				'ip' => $request->ip,
				'key' => $request->key,
				'callback_link' => $request->callback_link,
				'api_token' => Hash::make($request->email . $request->name),
			]);

			return response()->json(true);
		}

		public function show($id)
		{
			$data = User::where('id', $id)->first();

			return User::find($id);
		}

		public function edit($id)
		{
			$data = User::where('id', $id)->first();

			return User::find($id);
		}

		public function update(Request $request)
		{
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
				'ck_momo',
				'ck_vtpay',
				'ck_bank',
				'ck_zalo',
				'money',
				'so_du',
				'type_add'
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

			$user_role = Auth::user();

			if(isset($arr['type_add']) && isset($arr['money']))
			{
				if($arr['type_add'] == 1)
				{
					$arr['so_du'] = (int)$arr['so_du'] + (int)$arr['money'];

					$text_content = "<b>Cập Nhật Số Dư Đối Tác:</b>\n"
						. "<b>Cộng Số Tiền: </b>\n"
						. number_format($arr['money'], 0, '', ',') . "\n"
						. "<b> Tổng Cộng Tiền : </b>\n"
						. number_format($arr['so_du'], 0, '', ',') . "\n"
						. "<b> Đối Tác  : </b>\n"
						. $arr['first_name']."\n"
						. "<b> Người Duyệt   : </b>\n"
						. "$user_role->first_name\n"
						. "<b> Cập Nhật Lúc : </b>\n"
						. now();

					Telegram::sendMessage([
						'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
						'parse_mode' => 'HTML',
						'text' => $text_content
					]);
				}
				else
				{
					$arr['so_du'] = (int)$arr['so_du'] - (int)$arr['money'];

					$text = "<b>Cập Nhật Số Dư Đối Tác:</b>\n"
						. "<b>Trừ Tiền: </b>\n"
						. number_format($arr['money'], 0, '', ',') . "\n"
						. "<b> Tiền Còn Lại : </b>\n"
						. number_format($arr['so_du'], 0, '', ',') . "\n"
						. "<b> Đối Tác  : </b>\n"
						. $arr['first_name']."\n"
						. "<b> Người Duyệt   : </b>\n"
						. $user_role->first_name . "\n"
						. "<b> Cập Nhật : </b>\n"
						. now() ;

					Telegram::sendMessage([
						'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001764075879'),
						'parse_mode' => 'HTML',
						'text' => $text
					]);
				}
			}

			$object = User::where('id', $request->id)->first();
			$object->update($arr);
			$object->save();

			return response()->json(true);
		}

		public function updatebanklist(Request $request)
		{
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
		}

		public function destroy(Request $request)
		{
			$arr = $request->all();
			$data = User::where('id', $arr['id'])->first();
			if (isset($data)) {
				$data->delete();
			} else {
				return response()->json(false);
			}

			return response()->json(true);
		}

		private function oney_format(string $param, $so_du)
		{

		}


	}
