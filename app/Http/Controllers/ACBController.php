<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\ACBDataTable;
	use App\Models\ACB;
	use Illuminate\Http\Request;
	
	class ACBController extends Controller
	{
		
		public function index(ACBDataTable $dataTable)
		{
			return $dataTable->render('pages.acb.index');
		}
		
		public function create()
		{
			//
		}
		
		public function store(Request $request)
		{
			//
		}
		
		public function show(ACB $aCB)
		{
			//
		}
		
		public function edit(ACB $aCB)
		{
			//
		}
		
		public function update(Request $request, ACB $aCB)
		{
			//
		}
		
		public function destroy(ACB $aCB)
		{
			//
		}
	}
