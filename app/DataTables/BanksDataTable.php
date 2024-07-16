<?php
	
	namespace App\DataTables;
	
	use App\Models\Banks;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Services\DataTable;
	
	class BanksDataTable extends DataTable
	{
		
		public function dataTable($query)
		{
			return datatables()
				->eloquent($query)
				->addColumn('action', 'banks.action');
		}

//		public function dataTable($query)
//		{
//			return datatables()
//				->eloquent($query)
//				->addColumn('action', 'banks.action');
//		}
		
		public function query(Banks $model)
		{
			return $model->newQuery();
		}
		
		
		public function html()
		{
			return $this->builder()
				->setTableId('banks-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->dom('Bfrtip')
				->orderBy(1);
		}
		
		protected function getColumns()
		{
			return [
				Column::make('id')->title('Log ID')->width(100)->addClass('ps-0'),
				Column::make('name'),
				Column::make('full_name'),
				Column::make('desc'),
				Column::make('branch'),
				Column::make('number1'),
				Column::make('number2'),
				Column::make('port'),
				Column::make('url'),
				Column::make('username'),
				Column::make('password'),
				Column::make('desc_api'),
			];
		}
		
		/**
		 * Get filename for export.
		 *
		 * @return  string
		 */
		protected function filename(): string
		{
			return 'Banks_' . date('YmdHis');
		}
	}
