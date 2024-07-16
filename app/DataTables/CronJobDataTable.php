<?php
	
	namespace App\DataTables;
	
	use App\Models\CronJob;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Services\DataTable;
	
	class CronJobDataTable extends DataTable
	{
		/**
		 * Build DataTable class.
		 *
		 * @param QueryBuilder $query Results from query() method.
		 * @return \Yajra\DataTables\EloquentDataTable
		 */
		public function dataTable(QueryBuilder $query): EloquentDataTable
		{
			return (new EloquentDataTable($query))
				->addColumn('action', 'cronjob.action')
				->setRowId('id');
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\Acbank $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(CronJob $model): QueryBuilder
		{
			return $model->newQuery();
		}
		
		/**
		 * Optional method if you want to use html builder.
		 *
		 * @return \Yajra\DataTables\Html\Builder
		 */
		public function html(): HtmlBuilder
		{
			return $this->builder()
				->setTableId('acbtranfer-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->dom('Bfrtip')
				->orderBy(1);
//				->buttons(
//					Button::make('create'),
//					Button::make('export'),
//					Button::make('print'),
//					Button::make('reset'),
//					Button::make('reload')
//				);
		}
		
		/**
		 * Get columns.
		 *
		 * @return array
		 */
		protected function getColumns(): array
		{
			return [
				Column::make('id'),
				Column::make('name'),
				Column::make('data'),
				Column::make('status'),
				Column::make('created_at'),
				Column::make('updated_at'),
			];
		}
		
		/**
		 * Get filename for export.
		 *
		 * @return string
		 */
		protected function filename(): string
		{
			return 'CronJob_' . date('YmdHis');
		}
	}
