<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankUsersRequest;
use App\Http\Requests\UpdateBankUsersRequest;
use App\Models\BankUsers;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BankUsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view("pages.bankusers.index");
	}

	public function settings()
	{
		return view("pages.bankusers.settings");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \App\Http\Requests\StoreBankUsersRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		try {

			$data = $request->all();

			$list = [
				'id_partners',
				'full_name',
				'desc',
				'branch',
				'number1',
				'number2',
				'username',
				'password',
				'password',
				'bankcode',
				'link_qrcode'
			];
			$arr = [];

			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}


			BankUsers::create($arr);

			$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
			$date->setTimezone('+7');
			$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
			//user
			$data_logs['id_user'] = Auth::user()->id();
			$data_logs['created_at'] = $created_at;
			$data_logs['updated_at'] = $created_at;
			//user
			$data_logs['type'] = 'Them Bank';
			// data old
			$data_logs['old'] = json_encode($arr);
			// data new
			$data_logs['new'] = json_encode($arr);
			// add logs
			DB::table('logs_profile')->insert($data_logs);

			$data['success'] = true;
			$data['msg'] = 'Them Thanh Cong';
			return response()->json($data);

		} catch (\Exception $e) {

			\Log::info("BankUsersController store:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);
		}
	}

	public function show($id)
	{
		$data = BankUsers::where('id', $id)
			->get()->toArray();

		if (isset($data[0])) {
			$data = $data[0];

			return view("pages.bankusers.edit", compact('data'));
		}

		return view("pages.bankusers.edit");


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\BankUsers $bankUsers
	 * @return \Illuminate\Http\Response
	 */
	public function edit(BankUsers $bankUsers)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \App\Http\Requests\UpdateBankUsersRequest $request
	 * @param \App\Models\BankUsers $bankUsers
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{


		try {

			$data = $request->all();

			if (isset($data['id'])) {
				if ($data['run'] == 'on') {
					$data['run'] = 1;
				} else {
					$data['run'] = 0;
				}

				$object = BankUsers::where('id', $data['id'])->first();

				$date = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
				$date->setTimezone('+7');
				$created_at = $date->format('Y-m-d H:m:s'); //2023-04-14 11:56:08
				//user
				$data_logs['id_user'] = Auth::user()->id();
				$data_logs['created_at'] = $created_at;
				$data_logs['updated_at'] = $created_at;
				//user
				$data_logs['type'] = 'Update Bank';
				// data old
				$data_logs['old'] = json_encode($object);
				// data new
				$data_logs['new'] = json_encode($data);
				// add logs
				DB::table('logs_profile')->insert($data_logs);


				$object->update($data);
				$object->save();

				return response()->json(true);

			} else {
				$result['errorCode'] = 404;
				$result['errorDescription'] = "Vui lòng liên hệ CSKH";

				return response()->json($result);
			}

		} catch (\Exception $e) {

			\Log::info("BankUsersController update2:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);
		}

	}

	public function update2(Request $request, BankUsers $bankUsers)
	{
		try {

			$data = $request->all();

			$arr['id'] = $data['id'];

			echo "<pre>";
			print_r($data);
			echo "</pre>";
			die('update2');


			$data['success'] = true;
			$data['msg'] = 'update2 Thanh Cong';
			return response()->json($data);

		} catch (\Exception $e) {

			\Log::info("BankUsersController update2:" . json_encode($e));

			// tra json bao loi
			$result['errorCode'] = 404;
			$result['errorDescription'] = "Vui lòng liên hệ CSKH";

			return response()->json($result);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\BankUsers $bankUsers
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(BankUsers $bankUsers)
	{
		//
	}
}
