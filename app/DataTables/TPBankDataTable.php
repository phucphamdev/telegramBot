<?php

	namespace App\DataTables;

	use App\Models\TPBank;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;

	class TPBankDataTable extends DataTable
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
			->editColumn('created_at', function (TPBank $model) {
				return $model->created_at->format('d M, Y');
			});
		}

		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\TPBank $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(TPBank $model): QueryBuilder
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
				->setTableId('tpbank-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->pageLength(50)
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
//				Column::make('arrangementId'),
				Column::make('id'),
				Column::make('reference'),
				Column::make('description'),
				Column::make('bookingDate'),
				Column::make('amount'),
				Column::make('currency'),
				Column::make('creditDebitIndicator'),
				Column::make('runningBalance'),
				Column::make('created_at')
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
			return 'TPBank_' . date('YmdHis');
		}
	}
