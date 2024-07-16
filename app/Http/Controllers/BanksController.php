<?php

	namespace App\Http\Controllers;

	use App\DataTables\BanksDataTable;
	use App\Models\Banklistdetail;
	use App\Models\Banks;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	use Yajra\DataTables\DataTables;
	use Illuminate\Support\Facades\DB;

	class BanksController extends Controller
	{

		public function index(BanksDataTable $dataTable)
		{
			return $dataTable->render('pages.banks.index');
		}

		public function datatables()
		{
			$datas = Banks::latest('id')->get();

			return Datatables::of($datas)
				->addColumn('action', function (Banks $data) {
					return '<td class="text-end">
						<a  data-id="' . $data->id . '"   data-url="' . route('banks.getdetail') . '" onclick="getDetailBanks(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalbanks">Cập Nhật</a>

							<a  data-id="' . $data->id . '"   data-url="' . route('banks.destroy', $data->id) . '" onclick="getDeleteBanks(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Xoá</a>
					</td>';
				})
				->editColumn('trang_thai', function (Banks $datas)
				{
					if($datas->trang_thai == 'active')
					{
						return '<span class="badge py-3 px-4 fs-7 badge-light-primary"> '. $datas->trang_thai.'</span>';
					}

					return '<span class="badge py-3 px-4 fs-7 badge-light-warning"> '. $datas->trang_thai.'</span>';
				})
				->editColumn('id_partners', function (Banks $datas)
				{
					return $datas->id_partners;
				})
				->addColumn('created_at', function (Banks $data) {
					return date('d-m-Y', strtotime($data->created_at));
				})
				->rawColumns(['action','created_at','trang_thai','id_partners'])
				->toJson();
		}

		public function getdetail(Request $request)
		{
			$data = $request->all();

			$data = Banks::where('id', $data['id'])->first();

			return response()->json($data);
		}

		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			$check = Banks::where('number1', $request->number1)->first();

			if(!isset($check))
			{
				Banks::create([
					'name' => $request->name,
					'full_name' => $request->full_name,
					'id_partners' => $request->id_partners,
					'number1' => $request->number1,
					'username' => $request->username,
					'password' => $request->password,
					'branch' => $request->branch,
					'trang_thai' => $request->trang_thai,
					'bankcode' => $request->bankcode,
					'link_qrcode' => $request->link_qrcode,
				]);

				$data['success'] = true;
				$data['msg'] = 'Them Thanh Cong';
				return response()->json($data);

			}

			$data['success'] = false;
			$data['msg'] = 'The Nay Co Roi !!';
			return response()->json($data);
		}

		public function show($id)
		{
			$data = Banks::where('id', $id)->first();

			return view('pages.banks.show', compact('data'));
		}

		public function edit($id)
		{
			$data = Banks::where('id', $id)->first();

			return view('pages.banks.edit', compact('data'));
		}

		public function update(Request $request)
		{
			$data = $request->all();

			$list = [
				'id',
				'name',
				'full_name',
				'run',
				'id_partners',
				'branch',
				'number1',
				'port',
				'url',
				'group',
				'username',
				'password',
				'desc_api',
				'link_qrcode',
				'bankcode',
				'trang_thai'
			];

			if ($data['run'] == 'on') {
				$data['run'] = 1;
			} else {
				$data['run'] = 0;
			}


			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = Banks::where('id', $arr['id'])->first();

			$object->update($arr);
			$object->save();

			DB::table('banklistdetail')
				->where('id_bank', $arr['id'])
				->update(['trang_thai' =>$data['trang_thai']]);

			return response()->json(true);

		}

		public function destroy(Request $request)
		{
			$arr = $request->all();
			$data = Banks::where('id', $arr['id'])->first();
			if (isset($data)) {
				$data->delete();
				Banklistdetail::where('id_partners', $arr['id'])->delete();
			} else {
				return response()->json(false);
			}

			return response()->json(true);
		}
	}
