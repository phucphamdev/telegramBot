<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\ProxyDataTable;
	use App\Models\Proxy;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Str;
	use Illuminate\Support\Facades\Hash;
	use Yajra\DataTables\DataTables;
	
	class ProxyController extends Controller
	{
		
		public function index(ProxyDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.proxy.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.proxy.index');
			}
		}
		
		public function datatables()
		{
			$datas = Proxy::latest('id')->get();
			
			return Datatables::of($datas)
				->addColumn('action', function (Proxy $data) {
					return '<td class="text-end">
						<a  data-id="' . $data->id . '"   data-url="' . route('proxy.getdetail') . '" onclick="getDetailProxy(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalproxy">View</a>
							
							<a data-id="' . $data->id . '"   data-url="' . route('proxy.destroy', $data->id) . '" onclick="getDeleteProxy(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
				})
				->editColumn('status', function (Proxy $datas) {
					if ($datas->status == 'active') {
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> ' . $datas->status . '</span>';
					}
					
					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> ' . $datas->status . '</span>';
				})
				->addColumn('created_at', function (Proxy $data) {
					return date('d-m-Y', strtotime($data->created_at));
				})
				->rawColumns(['action', 'created_at', 'status'])
				->toJson();
		}
		
		public function getdetail(Request $request)
		{
			$data = $request->all();
			
			$data = Proxy::where('id', $data['id'])->first();
			
			return response()->json($data);
		}
		
		public function create()
		{
			//
		}
		
		public function store(Request $request)
		{
			Proxy::create([
				'local' => $request->local,
				'ip' => $request->ip,
				'port' => $request->port,
				'username' => $request->username,
				'password' => Hash::make($request->password),
				'status' => $request->status,
				'type' => $request->type,
			]);
			
			return response()->json(true);
		}
		
		public function show($id)
		{
			$data = Proxy::where('id', $id)->first();
			
			return view('pages.proxy.show', compact('data'));
		}
		
		public function edit($id)
		{
			$data = Proxy::where('id', $id)->first();
			
			return view('pages.proxy.edit', compact('data'));
		}
		
		public function update(Request $request)
		{
			$data = $request->all();
			
			$list = [
				'id',
				'local',
				'ip',
				'port',
				'username',
				'password',
				'status',
				'type',
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
			
			$object = Proxy::where('id', $arr['id'])->first();
			$object->update($arr);
			if ($object->save()) {
				return response()->json(true);
			}
			
			return response()->json(false);
			
		}
		
		public function destroy(Request $request)
		{
			$arr = $request->all();
			$data = Proxy::where('id', $arr['id'])->first();
			if (isset($data)) {
				$data->delete();
			} else {
				return response()->json(false);
			}
			
			return response()->json(true);
		}
	}
