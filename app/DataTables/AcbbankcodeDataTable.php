<?php
	
	namespace App\DataTables;
	
	use App\Models\Acbbankcode;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class AcbbankcodeDataTable extends DataTable
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
				->addColumn('action', 'acbbankcode.action')
				->editColumn('fastTransferSupported', function (Acbbankcode $model) {
					return $model->fastTransferSupported == 1 ? "True" : 'False';
				})
				->setRowId('id');
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\Acbbankcode $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(Acbbankcode $model): QueryBuilder
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
				->setTableId('acbbankcode-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->pageLength(25)
				->dom('Bfrtip')
				->orderBy(1);
		}
		
		/**
		 * Get columns.
		 *
		 * @return array
		 */
		protected function getColumns(): array
		{
			return [
//				Column::computed('action')
//					->exportable(false)
//					->printable(false)
//					->width(60)
//					->addClass('text-center'),
//				Column::make('id'),
				Column::make('bank'),
				Column::make('bankName'),
				Column::make('napasBankCode'),
				Column::make('thumbnail'),
				Column::make('fastTransferSupported'),
//				Column::make('created_at'),
//				Column::make('updated_at'),
			];
		}
		
		/**
		 * Get filename for export.
		 *
		 * @return string
		 */
		protected function filename(): string
		{
			return 'Acbbankcode_' . date('YmdHis');
		}
	}
