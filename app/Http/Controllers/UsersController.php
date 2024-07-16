<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{

	public function index(UsersDataTable $dataTable)
	{
		$user_role = Auth::user()->role();

		if ($user_role == 'admin') {
			return $dataTable->render('pages.users.index');
		}

		if ($user_role == 'partner') {
			return $dataTable->render('users.users.index');
		}
	}

	public function index2()
	{
		return view('version2.index');
	}

	public function lang($locale)
	{
		if ($locale) {
			App::setLocale($locale);
			Session::put('lang', $locale);
			Session::save();
			return redirect()->back()->with('locale', $locale);
		} else {
			return redirect()->back();
		}
	}

	public function root()
	{
		return view('version2.index');
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
		$datas = User::latest('id')->where('type', 1)->get();

		return Datatables::of($datas)
			->addColumn('action', function (User $data) {
				return '<td class="text-end">
						<a  data-id="' . $data->id . '"   data-url="' . route('users.getdetail') . '" onclick="getDetailUsers(event, this); return false;"
							class="btn btn-primary er fs-6 px-8 py-4 " data-bs-toggle="modal" data-bs-target="#kt_modaluser">View</a>

							<a  data-id="' . $data->id . '"   data-url="' . route('users.destroy', $data->id) . '" onclick="getDeleteUsers(event, this); return false;"
							class="btn btn-danger er fs-6 px-8 py-4 " >Delete</a>
					</td>';
			})
			->editColumn('created_at', function (User $datas) {
				return date('d-m-Y', strtotime($datas->created_at));
			})
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
			'type' => 1,
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
		$config = theme()->getOption('page');

		return User::find($id);
	}

	public function edit($id)
	{
		$config = theme()->getOption('page', 'edit');

		return User::find($id);
	}

	public function update(Request $request)
	{
		$data = $request->only([
			'first_name',
			'last_name',
			'email',
			'password',
			'type',
			'callback_link',
			'access_token',
			'ip',
			'key',
		]);

		if (!empty($data['password'])) {
			$data['password'] = Hash::make($data['password']);
		}

		$object = User::find($request->id);
		$object->update($data);

		return response()->json(true);
	}

	public function update2(Request $request)
	{
		$data = $request->only([
			'tpbank_username',
			'tpbank_password',
			'tpbank_debtorAccountNumber',
		]);

		$object = System::find(999);
		$object->update($data);

		return redirect()->intended('system');
	}

	public function destroy(Request $request)
	{
		$id = $request->input('id');
		$data = User::find($id);

		if ($data) {
			$data->delete();
			return response()->json(true);
		}

		return response()->json(false);
	}
}
