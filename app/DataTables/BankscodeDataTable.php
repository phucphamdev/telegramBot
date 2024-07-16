<?php
	
	namespace App\DataTables;
	
	use App\Models\Bankscode;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class BankscodeDataTable extends DataTable
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
				->addColumn('action', 'bankscode.action')
				->setRowId('id');
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\Bankscode $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(Bankscode $model): QueryBuilder
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
				->setTableId('bankscode-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->pageLength(25)
				->dom('Bfrtip')
				->orderBy(1);
		}
		
		/**
		 * Get the dataTable columns definition.
		 *
		 * @return array
		 */
		public function getColumns(): array
		{
			return [
				Column::make('id')->title('ID')->width(50)->addClass('ps-0'),
				Column::make('name'),
				Column::make('code')
			];
		}
		
		/**
		 * Get filename for export.
		 *
		 * @return string
		 */
		protected function filename(): string
		{
			return 'Bankscode_' . date('YmdHis');
		}
	}
