<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\PartnersCategoryDataTable;
	use App\Models\PartnersCategory;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class PartnersCategoryController extends Controller
	{
		public function index(PartnersCategoryDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.partnerscategory.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.partnerscategory.index');
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
		
		public function show(PartnersCategory $partnersCategory)
		{
			//
		}
		
		public function edit(PartnersCategory $partnersCategory)
		{
			//
		}
		
		public function update(Request $request, PartnersCategory $partnersCategory)
		{
			//
		}
		
		public function destroy(PartnersCategory $partnersCategory)
		{
			//
		}
	}
