<?php
	
	namespace App\Http\Controllers;
	
	use App\Models\GeneralManage;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class GeneralManageController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin')
			{
				return view('pages.generalmanage.index');
			}
			
			if ($user_role == 'partner')
			{
				return view('users.generalmanage.index');
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
		 * @param \App\Models\GeneralManage $generalManage
		 * @return \Illuminate\Http\Response
		 */
		public function show(GeneralManage $generalManage)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\GeneralManage $generalManage
		 * @return \Illuminate\Http\Response
		 */
		public function edit(GeneralManage $generalManage)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Models\GeneralManage $generalManage
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, GeneralManage $generalManage)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\GeneralManage $generalManage
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(GeneralManage $generalManage)
		{
			//
		}
	}
