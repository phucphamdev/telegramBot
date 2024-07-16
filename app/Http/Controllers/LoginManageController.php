<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\LoginManageDataTable;
	use App\Models\LoginManage;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class LoginManageController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(LoginManageDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.loginmanage.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.loginmanage.index');
			}
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
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			//
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param \App\Models\LoginManage $loginManage
		 * @return \Illuminate\Http\Response
		 */
		public function show(LoginManage $loginManage)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\LoginManage $loginManage
		 * @return \Illuminate\Http\Response
		 */
		public function edit(LoginManage $loginManage)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Models\LoginManage $loginManage
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, LoginManage $loginManage)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\LoginManage $loginManage
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(LoginManage $loginManage)
		{
			//
		}
	}
