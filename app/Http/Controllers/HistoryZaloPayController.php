<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\HistoryZaloPayDataTable;
	use App\Models\HistoryZaloPay;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Yajra\DataTables\DataTables;
	
	class HistoryZaloPayController extends Controller
	{
		public function index(HistoryZaloPayDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.historyzalopay.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.historyzalopay.index');
			}
			
		}
		
		public function datatables()
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				$datas = HistoryZaloPay::latest('id')->get();
				
				return Datatables::of($datas)
					->addColumn('action', function (HistoryZaloPay $data) {
						return '<td class="text-end">
						<a  data-id="' . $data->id . '"   data-url="' . route('historyzalopay.getdetail') . '" onclick="getDetailHistoryZaloPay(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalhistoryzalopay">View</a>
							
							<a  data-id="' . $data->id . '"   data-url="' . route('historyzalopay.destroy', $data->id) . '" onclick="getDeleteHistoryZaloPay(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
					})
					->editColumn('trang_thai', function (HistoryZaloPay $datas) {
						if ($datas->trang_thai == 'active') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->trang_thai . '</span>';
						}
						
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
					})
					->addColumn('created_at', function (HistoryZaloPay $data) {
						return date('d-m-Y', strtotime($data->created_at));
					})
					->rawColumns(['action', 'created_at', 'trang_thai'])
					->toJson();
			}
			
			if ($user_role == 'partner') {
				$datas = HistoryZaloPay::latest('id')->get();
				
				return Datatables::of($datas)
					->editColumn('trang_thai', function (HistoryZaloPay $datas) {
						if ($datas->trang_thai == 'active') {
							return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->trang_thai . '</span>';
						}
						
						return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->trang_thai . '</span>';
					})
					->addColumn('created_at', function (HistoryZaloPay $data) {
						return date('d-m-Y', strtotime($data->created_at));
					})
					->rawColumns(['action', 'created_at', 'trang_thai'])
					->toJson();
			}
			
			
			
		}
		
		public function getdetail(Request $request)
		{
			$data = $request->all();
			
			$data = HistoryZaloPay::where('id', $data['id'])->first();
			
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
			$data = HistoryZaloPay::where('id', $id)->first();
			
			return view('pages.historyzalopay.show', compact('data'));
		}
		
		public function edit($id)
		{
			$data = HistoryZaloPay::where('id', $id)->first();
			
			return view('pages.historyzalopay.edit', compact('data'));
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
			
			$object = HistoryZaloPay::where('id', $arr['id'])->first();
			
			$object->update($arr);
			$object->save();
			
			return response()->json(true);
			
		}
		
		public function destroy(Request $request)
		{
			$arr = $request->all();
			$data = HistoryZaloPay::where('id', $arr['id'])->first();
			if (isset($data)) {
				$data->delete();
			} else {
				return response()->json(false);
			}
			
			return response()->json(true);
		}
	}
