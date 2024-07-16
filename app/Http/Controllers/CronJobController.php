<?php
	
	namespace App\Http\Controllers;
	
	use App\DataTables\CronJobDataTable;
	use App\Models\CronJob;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Yajra\DataTables\DataTables;
	
	class CronJobController extends Controller
	{
		public function index(CronJobDataTable $dataTable)
		{
			return $dataTable->render('pages.cronjob.index');
		}
		
		public function datatables()
		{
			$datas = CronJob::all();
			
			return Datatables::of($datas)
				->addColumn('status', function (CronJob $datas) {
					return $datas->status;
				})
				->addColumn('name', function (CronJob $datas) {
					return $datas->name;
				})
				->addColumn('data', function (CronJob $datas) {
					return $datas->data;
				})
				->editColumn('created_at', function (CronJob $datas) {
				
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary " > ' . date('d/m/Y H:m:s', strtotime($datas->created_at)) . ' </div>';
				})
				->editColumn('updated_at', function (CronJob $datas) {
					return '<div class="badge py-3 px-4 fs-7 badge-light-primary" > ' . date('d/m/Y H:m:s', strtotime($datas->updated_at)) . ' </div>';
				})
				->rawColumns(['name','created_at', 'status', 'data','updated_at'])
				->toJson();
			
		}
		
		public function create()
		{
			//
		}
		
		public function store(Request $request)
		{
			//
		}
		
		public function show(CronJob $cronJob)
		{
			//
		}
		
		public function edit(CronJob $cronJob)
		{
			//
		}
		
		public function update(Request $request, CronJob $cronJob)
		{
			//
		}
		
		public function destroy(CronJob $cronJob)
		{
			//
		}
	}
