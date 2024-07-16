<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\ApiManageDataTable;
	use App\Models\ApiManage;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Yajra\DataTables\DataTables;
	
	class ApiManageController extends Controller
	{
		public function index(ApiManageDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin')
			{
				return $dataTable->render('pages.apimanage.index');
			}
			
			if ($user_role == 'partner')
			{
				return $dataTable->render('users.apimanage.index');
			}
		}

		public function datatables()
		{
			$datas = HistoryBank::latest('id')->get();
			
			return Datatables::of($datas)
				->addColumn('action', function (HistoryBank $data) {
					return '<td class="text-end">
						<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('apimanage.getdetail') . '" onclick="getDetailHistorybank(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistorybank">View</a>
							
							<a data-magd="' . $data->ma_gd . '" data-id="' . $data->id . '"   data-url="' . route('apimanage.destroy', $data->id) . '" onclick="getDeleteHistorybank(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
				})
				->editColumn('trang_thai', function (HistoryBank $datas)
				{
					if($datas->trang_thai == 'active')
					{
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> '. $datas->trang_thai.'</span>';
					}
					
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> '. $datas->trang_thai.'</span>';
				})
				->addColumn('created_at', function (HistoryBank $data) {
					return date('d-m-Y', strtotime($data->created_at));
				})
				->rawColumns(['action','created_at','trang_thai'])
				->toJson();
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
			
			return view('pages.apimanage.show', compact('data'));
		}
		
		public function edit($id)
		{
			$data = HistoryBank::where('id', $id)->first();
			
			return view('pages.apimanage.edit', compact('data'));
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
			
			if($data['trang_thai'] == 'on')
			{
				$data['trang_thai'] = "active";
			}else{
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
