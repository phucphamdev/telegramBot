<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\ApiManageDataTable;
	use App\Models\RolesPermissionsView;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class RolesPermissionsViewController extends Controller
	{
		
		public function index(ApiManageDataTable $dataTable)
		{
			$user_role = Auth::user()->role();
			
			if ($user_role == 'admin') {
				return $dataTable->render('pages.rolespermissionsview.index');
			}
			
			if ($user_role == 'partner') {
				return $dataTable->render('users.rolespermissionsview.index');
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
		
		public function show(RolesPermissionsView $rolesPermissionsView)
		{
			//
		}
		
		public function edit(RolesPermissionsView $rolesPermissionsView)
		{
			//
		}
		
		public function update(Request $request, RolesPermissionsView $rolesPermissionsView)
		{
			//
		}
		
		public function destroy(RolesPermissionsView $rolesPermissionsView)
		{
			//
		}
	}
