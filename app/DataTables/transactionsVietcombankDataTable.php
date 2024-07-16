<?php

	namespace App\DataTables;

	use App\Models\transactionsVietcombank;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;

	class transactionsVietcombankDataTable extends DataTable
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
				->addColumn('action', 'transactionsvietcombank.action')
				->setRowId('id');
		}

		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\transactionsVietcombank $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(transactionsVietcombank $model): QueryBuilder
		{
			return $model->newQuery()->orderBy('id', 'desc');
		}

		/**
		 * Optional method if you want to use html builder.
		 *
		 * @return \Yajra\DataTables\Html\Builder
		 */
		public function html(): HtmlBuilder
		{
			return $this->builder()
				->setTableId('transactionsvietcombank-table')
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
				Column::make('id'),
				Column::make('TransactionDate'),
				Column::make('Reference'),
				Column::make('CD'),
				Column::make('Amount'),
				Column::make('Description'),
				Column::make('PCTime'),
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
			return 'transactionsVietcombank_' . date('YmdHis');
		}
	}
