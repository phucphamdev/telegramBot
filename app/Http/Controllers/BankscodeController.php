<?php

	namespace App\Http\Controllers;

	use App\DataTables\BankscodeDataTable;
	use App\Models\Bankscode;
	use Carbon\Carbon;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	use Yajra\DataTables\DataTables;
	use Illuminate\Support\Facades\DB;

	class BankscodeController extends Controller
	{
		public function index(BankscodeDataTable $dataTable)
		{
			$user_role = Auth::user()->role();

			if ($user_role == 'admin')
			{
				return $dataTable->render('pages.bankscode.index');
			}

			if ($user_role == 'partner')
			{
				return $dataTable->render('users.bankscode.index');
			}
		}

		public function datatables()
		{
			$datas = Bankscode::all();

			return Datatables::of($datas)
				->addColumn('action', function (Bankscode $data) {
					return '<td class="text-end">
						<a  data-id="' . $data->id . '"   data-url="' . route('bankscode.getdetail') . '" onclick="getDetailBankscode(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modalbanks">Cập Nhật</a>
					</td>';
				})
				->editColumn('name', function (Bankscode $datas)
				{
					return $datas->name;
				})
				->editColumn('code', function (Bankscode $datas) {
					return $datas->code;
				})
				->editColumn('updated_at', function (Bankscode $datas) {
					return date('d-m-Y', strtotime($datas->updated_at));
				})
				->editColumn('created_at', function (Bankscode $datas) {
					return date('d-m-Y', strtotime($datas->created_at));
				})
				->rawColumns(['action','nanme','code','created_at','updated_at'])
				->toJson();
		}

		public function getdetail(Request $request)
		{
			$data = $request->all();

			$data = Bankscode::where('id', $data['id'])->first();

			return response()->json($data);
		}

		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			$data = $request->all();
			$check = Bankscode::where('code', $request->code)->first();

			if(!isset($check))
			{
				Bankscode::create([
					'name' => $request->name,
					'code' => $request->code
				]);

				$data['success'] = true;
				$data['msg'] = 'Them Thanh Cong';

				/////////////////////////////////////////////////////////////////////////
				$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
				//user
				$data_logs['id_user'] = Auth::user()->id();
				$data_logs['created_at'] = $created_at;
				$data_logs['updated_at'] = $created_at;
				//user
				$data_logs['type'] = 'Banks Code : Them Banks Code';
				// data old
				$data_logs['old'] = json_encode($data);
				// data new
				$data_logs['new'] = json_encode($data);
				// add logs
				DB::table('logs_profile')->insert($data_logs);
				/////////////////////////////////////////////////////////////////////////
				return response()->json($data);

			}



			$data['success'] = false;
			$data['msg'] = 'The Nay Co Roi !!';
			return response()->json($data);
		}

		public function storebank(Request $request)
		{
			$data = $request->all();

			$list = [
				'name',
				'code'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$check = Bankscode::where('code', $request->code)->first();

			if(!isset($check))
			{
				Bankscode::create($arr);

				/////////////////////////////////////////////////////////////////////////
				$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
				//user
				$data_logs['id_user'] = Auth::user()->id();
				$data_logs['created_at'] = $created_at;
				$data_logs['updated_at'] = $created_at;
				//user
				$data_logs['type'] = 'Banks Code : Them Bank';
				// data old
				$data_logs['old'] = json_encode($data);
				// data new
				$data_logs['new'] = json_encode($data);
				// add logs
				DB::table('logs_profile')->insert($data_logs);
				/////////////////////////////////////////////////////////////////////////

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
			$data = Bankscode::where('id', $id)->first();

			return view('pages.bankscode.show', compact('data'));
		}

		public function edit($id)
		{
			$data = Bankscode::where('id', $id)->first();

			return view('pages.bankscode.edit', compact('data'));
		}

		public function update(Request $request)
		{
			$data = $request->all();

			$list = [
				'id',
				'name',
				'code'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = Bankscode::where('id', $arr['id'])->first();

			$object->update($arr);
			$object->save();

			/////////////////////////////////////////////////////////////////////////
			$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$date->setTimezone('+7');
			$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
			//user
			$data_logs['id_user'] = Auth::user()->id();
			$data_logs['created_at'] = $created_at;
			$data_logs['updated_at'] = $created_at;
			//user
			$data_logs['type'] = 'Update Banks Code';
			// data old
			$data_logs['old'] = json_encode($object);
			// data new
			$data_logs['new'] = json_encode($arr);
			// add logs
			DB::table('logs_profile')->insert($data_logs);
			/////////////////////////////////////////////////////////////////////////

			return response()->json(true);

		}

		public function destroy(Request $request)
		{
			$arr = $request->all();
			$data = Bankscode::where('id', $arr['id'])->first();

			if (isset($data))
			{
				/////////////////////////////////////////////////////////////////////////
				$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
				//user
				$data_logs['id_user'] = Auth::user()->id();
				$data_logs['created_at'] = $created_at;
				$data_logs['updated_at'] = $created_at;
				//user
				$data_logs['type'] = 'Delete Banks Code';
				// data old
				$data_logs['old'] = json_encode($data);
				// data new
				$data_logs['new'] = json_encode($arr);
				// add logs
				DB::table('logs_profile')->insert($data_logs);
				/////////////////////////////////////////////////////////////////////////
				$data->delete();
			}
			else
			{
				return response()->json(false);
			}

			return response()->json(true);
		}
	}
