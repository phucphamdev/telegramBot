<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\PartnersCustomerDataTable;
	use App\Models\PartnersCustomer;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Str;
	use Illuminate\Support\Facades\Hash;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Yajra\DataTables\DataTables;
	
	class PartnersCustomerController extends Controller
	{
		
		public function index(PartnersCustomerDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.partnerscustomer.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.partnerscustomer.index');
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
		
		public function loadUser(UsersDataTable $dataTable)
		{
			return $dataTable->render('pages.users.index');
		}
		
		public function datatables()
		{
			$datas = User::latest('id')->where('type', 3)->get();
			
			return Datatables::of($datas)
				->addColumn('action', function (User $datas) {
					return '<td class="text-end">
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('partnerscustomer.getdetail') . '"
								onclick="getDetailPartnersCustomer(event, this); return false;"
								class="btn btn-primary  detail" with="90px"
								data-bs-toggle="modal"
								data-bs-target="#kt_modalpartnerscustomer">
								View
							</a>
							<a
								data-id="' . $datas->id . '"
								data-url="' . route('partnerscustomer.destroy', $datas->id) . '"
								onclick="getDeletePartnersCustomer(event, this); return false;"
								class="btn btn-danger er fs-6 px-8 py-4 " >
								Delete
							</a>
					</td>';
				})
				->editColumn('created_at', function (User $datas) {
					return date('d-m-Y', strtotime($datas->created_at));
				})
//				->editColumn('trang_thai', function (User $datas) {
//					if ($datas->trang_thai == 'active') {
//						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->trang_thai . '</span>';
//					}
//
//					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
//				})
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
		
		public function getdetail(Request $request)
		{
			$data = $request->all();
			
			$data = User::where('id', $data['id'])->first();
			
			return response()->json($data);
		}
		
		public function create(Request $request)
		{
			//
		}
		
		public function store(Request $request)
		{
			User::create([
				'first_name' => $request->name,
				'UUID' => "User_" . Str::random(30),
				'last_name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'email_verified_at' => now(),
				'type' => 3,
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
				'ten',
				'email',
				'cong_ty',
				'dien_thoai',
				'website',
				'quoc_gia',
				'tai_khoan',
				'telegram',
				'trang_thai',
				'ck_momo',
				'ck_vtpay',
				'ck_bank',
				'ck_zalo',
				'so_du',
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
	}
