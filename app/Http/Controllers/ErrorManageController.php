<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\HistoryBankDataTable;
	use App\Models\ErrorManage;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Yajra\DataTables\DataTables;
	
	class ErrorManageController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(HistoryBankDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin')
			{
				return $dataTable->render('pages.errormanage.index');
			}
			
			if ($user_role == 'partner')
			{
				return $dataTable->render('users.errormanage.index');
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
		 * @param \App\Models\ErrorManage $errorManage
		 * @return \Illuminate\Http\Response
		 */
		public function show(ErrorManage $errorManage)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\ErrorManage $errorManage
		 * @return \Illuminate\Http\Response
		 */
		public function edit(ErrorManage $errorManage)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Models\ErrorManage $errorManage
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, ErrorManage $errorManage)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\ErrorManage $errorManage
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(ErrorManage $errorManage)
		{
			//
		}
	}
