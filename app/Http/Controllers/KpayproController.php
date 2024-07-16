<?php

	namespace App\Http\Controllers;

	use App\Models\Kpaypro;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;

	class KpayproController extends Controller
	{
		public function dashboard()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.dashboard', compact('listUser','user'));
		}

		public function trackingSettings()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.settings', compact('listUser','user'));
		}

		public function tracking()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.tracking', compact('listUser','user'));
		}

		public function trackingCronjob()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.cronjob', compact('listUser','user'));
		}

		public function trackingBanks()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.banks', compact('listUser','user'));
		}

		public function trackingUsers()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.users', compact('listUser','user'));
		}

		public function trackingLogs()
		{
			$user_role = Auth::user()->role();
			$user = User::where('id', Auth::user()->id)->first();
			$listUser = User::orderBy('id', 'desc')->paginate(10);

			return view('super.logs', compact('listUser','user'));
		}


		public function profile()
		{

			return view('version2.kpaypro.profile');
		}

		public function settings()
		{

			return view('version2.kpaypro.settings');
		}

		public function bankscode()
		{

			return view('version2.kpaypro.bankscode');
		}

		public function banks()
		{

			return view('version2.kpaypro.banks');
		}

		public function index()
		{

			return view('version2.kpaypro.index');
		}

		public function test()
		{

			return view('version2.kpaypro.test');
		}

	}
