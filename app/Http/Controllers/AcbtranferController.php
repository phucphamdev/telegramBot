<?php

	namespace App\Http\Controllers;

	use App\DataTables\AcbtranferDataTable;
	use App\DataTables\AcbtranfernaniDataTable;
	use App\DataTables\AcbtranfernanihovanduongDataTable;
	use App\Models\Acbtranfer;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;

	class AcbtranferController extends Controller
	{

		public function index(AcbtranferDataTable $dataTable)
		{
			$user_role = Auth::user()->role();

			if ($user_role == 'admin')
			{
				return $dataTable->render('pages.acbank.acbtranfer.index');
			}

			if ($user_role == 'partner')
			{
				return $dataTable->render('users.acbank.acbtranfer.index');
			}

		}

		public function acbtranfer_nani88(AcbtranfernaniDataTable $dataTable)
		{
			return $dataTable->render('pages.acbank.acbtranfer.index_nani88');
		}

		public function acbtranfer_nani88_hovanduong(AcbtranfernanihovanduongDataTable $dataTable)
		{
			return $dataTable->render('pages.acbank.acbtranfer.index_nani_hovanduong');
		}



		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			//
		}

		public function show(Acbtranfer $acbtranfer)
		{
			//
		}

		public function edit(Acbtranfer $acbtranfer)
		{
			//
		}

		public function update(Request $request, Acbtranfer $acbtranfer)
		{
			//
		}

		public function destroy(Acbtranfer $acbtranfer)
		{
			//
		}
	}
