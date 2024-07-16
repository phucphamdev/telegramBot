<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\transactionsVietcombankDataTable;
	use App\Models\transactionsVietcombank;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class TransactionsVietcombankController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(transactionsVietcombankDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.vietcombank.transactionsvietcombank.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.vietcombank.transactionsvietcombank.index');
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
		 * @param \App\Models\transactionsVietcombank $transactionsVietcombank
		 * @return \Illuminate\Http\Response
		 */
		public function show(transactionsVietcombank $transactionsVietcombank)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\transactionsVietcombank $transactionsVietcombank
		 * @return \Illuminate\Http\Response
		 */
		public function edit(transactionsVietcombank $transactionsVietcombank)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Models\transactionsVietcombank $transactionsVietcombank
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, transactionsVietcombank $transactionsVietcombank)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\transactionsVietcombank $transactionsVietcombank
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(transactionsVietcombank $transactionsVietcombank)
		{
			//
		}
	}
