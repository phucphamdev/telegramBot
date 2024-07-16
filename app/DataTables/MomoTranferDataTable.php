<?php
	
	namespace App\DataTables;
	
	use App\Models\MomoTranfer;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class MomoTranferDataTable extends DataTable
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
				->addColumn('action', 'momotranfer.action')
				->setRowId('id');
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\MomoTranfer $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(MomoTranfer $model): QueryBuilder
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
				->setTableId('momotranfer-table')
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
//				Column::computed('action')
//					->exportable(false)
//					->printable(false)
//					->width(60)
//					->addClass('text-center'),
				Column::make('id'),
				Column::make('transId'),
				Column::make('io'),
				Column::make('partnerId'),
				Column::make('partnerName'),
				Column::make('amount'),
				Column::make('comment'),
				Column::make('postBalance'),
				Column::make('status'),
				Column::make('created_at'),
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
			return 'MomoTranfer_' . date('YmdHis');
		}
	}
