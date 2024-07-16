<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\MomoTranferDataTable;
	use App\Helper\Bank\Momo;
	use App\Models\Momo as ModelsMomo;
	use App\Models\MomoTranfer;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class MomoTranferController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(MomoTranferDataTable $dataTable)
		{
			
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin')
			{
				return $dataTable->render('pages.momo.momotranfer.index');
			}
			
			if ($user_role == 'partner')
			{
				return $dataTable->render('users.momo.momotranfer.index');
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
		 * @param \App\Models\MomoTranfer $momoTranfer
		 * @return \Illuminate\Http\Response
		 */
		public function show(MomoTranfer $momoTranfer)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Models\MomoTranfer $momoTranfer
		 * @return \Illuminate\Http\Response
		 */
		public function edit(MomoTranfer $momoTranfer)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Models\MomoTranfer $momoTranfer
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, MomoTranfer $momoTranfer)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Models\MomoTranfer $momoTranfer
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(MomoTranfer $momoTranfer)
		{
			//
		}
	}
