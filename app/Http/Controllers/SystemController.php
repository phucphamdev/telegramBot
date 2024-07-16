<?php

	namespace App\Http\Controllers;

	use App\Models\Momo;
	use App\Models\System;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;

	class SystemController extends Controller
	{
		public function index()
		{
			$info = System::where('id', 999)->first();
			$momo = Momo::where('id', 888)->first();
			$user_role = Auth::user()->role();

			if ($user_role == 'admin') {
				return view('pages.system.index', compact('info','momo'));
			}

			if ($user_role == 'partner') {
				return view('users.system.index', compact('info','momo'));
			}
		}

		public function cron_vcb()
		{
			$info = System::where('id', 999)->first();
			$momo = Momo::where('id', 888)->first();
			$user_role = Auth::user()->role();

			if ($user_role == 'admin') {
				return view('pages.cron_vcb.index', compact('info','momo'));
			}

			if ($user_role == 'partner') {
				return view('users.cron_vcb.index', compact('info','momo'));
			}
		}

		public function updateViettelPay(Request $request)
		{
			$data = $request->all();

			$list = [
				'viettelpay_phone',
				'viettelpay_password',
				'viettelpay_otp'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = System::where('id', 999)->first();

			$object->update($arr);
			$object->save();

			return redirect()->intended('system');
		}

		public function updateACBank(Request $request)
		{
			$data = $request->all();

			$list = [
				'acb_username',
				'acb_accountNumber',
				'acb_password'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();

			return redirect()->intended('system');
		}

		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			//
		}

		public function show(System $system)
		{
			//
		}

		public function edit(System $system)
		{
			//
		}

		public function update(Request $request)
		{
			$data = $request->all();

			$list = [
				'username',
				'password' ,
				'captchaKey',
				'imei',
				'cust_id',
				'sessionId',
				'account_no'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();

			return redirect()->intended('system');
		}

		public function updateMBBank(Request $request)
		{


			$data = $request->all();

			$list = [
				'mbbank_password',
				'mbbank_username',
				'mbbank_account_no',
				'mbbank_cust_id',
				'mbbank_sessionId',
				'mbbank_imei',
				'mbbank_captchaKey',
			];


			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();

			return redirect()->intended('system');
		}

		public function updateVietcombank(Request $request)
		{
			$data = $request->all();

			$list = [
				'username',
				'password' ,
				'captchaKey',
				'imei',
				'cust_id',
				'sessionId',
				'account_no'
			];

			$arr = [];
			foreach ($data as $key => $val) {
				if (in_array($key, $list)) {
					$arr[$key] = $val;
				}
			}

			$object = System::where('id', 999)->first();
			$object->update($data);
			$object->save();

			return redirect()->back();
		}

		public function apiSystemGet()
		{
			$data = System::where('id', 999)->first();

			if ($data) {
				return response($data);
			}

			return response(['No data']);

		}
	}
