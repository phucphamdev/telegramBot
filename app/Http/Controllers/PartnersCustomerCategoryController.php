<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\PartnersCustomerCategoryDataTable;
	use App\Models\PartnersCustomerCategory;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class PartnersCustomerCategoryController extends Controller
	{
		public function index(PartnersCustomerCategoryDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.partnerscustomercategory.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.partnerscustomercategory.index');
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
		
		public function show(PartnersCustomerCategory $partnersCustomerCategory)
		{
			//
		}
		
		public function edit(PartnersCustomerCategory $partnersCustomerCategory)
		{
			//
		}
		
		public function update(Request $request, PartnersCustomerCategory $partnersCustomerCategory)
		{
			//
		}
		
		public function destroy(PartnersCustomerCategory $partnersCustomerCategory)
		{
			//
		}
	}
