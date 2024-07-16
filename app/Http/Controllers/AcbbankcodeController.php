<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\AcbbankcodeDataTable;
	use App\Models\Acbbankcode;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class AcbbankcodeController extends Controller
	{
		
		public function index(AcbbankcodeDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin')
			{
				return $dataTable->render('pages.acbank.acbbankcode.index');
			}
			
			if ($user_role == 'partner')
			{
				return $dataTable->render('users.acbank.acbbankcode.index');
			}
			
		}
		
		public function create()
		{
			//
		}
		
		public function store(Request $request)
		{
			//
		}
		
		public function show(Acbbankcode $acbbankcode)
		{
			//
		}
		
	
		public function edit(Acbbankcode $acbbankcode)
		{
			//
		}
		
		public function update(Request $request, Acbbankcode $acbbankcode)
		{
			//
		}
		
		public function destroy(Acbbankcode $acbbankcode)
		{
			//
		}
	}
