<?php
	
	namespace App\DataTables;
	
	use App\Models\transactionMbBankHistoryList;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class transactionMbBankHistoryListDataTable extends DataTable
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
			->editColumn('created_at', function (transactionMbBankHistoryList $model) {
			return $model->created_at->format('d M, Y');
			});
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\transactionMbBankHistoryList $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(transactionMbBankHistoryList $model): QueryBuilder
		{
			return $model->newQuery()->orderByDesc('ID');
		}
		
		/**
		 * Optional method if you want to use html builder.
		 *
		 * @return \Yajra\DataTables\Html\Builder
		 */
		public function html(): HtmlBuilder
		{
			return $this->builder()
				->setTableId('transactionmbbankhistorylist-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->pageLength(25)
				->dom('Bfrtip')
				->orderBy(2);
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
				Column::make('id_refNo'),
				Column::make('postingDate'),
				Column::make('transactionDate'),
				Column::make('accountNo'),
				Column::make('creditAmount'),
				Column::make('debitAmount'),
//				Column::make('currency'),
				Column::make('description'),
//				Column::make('availableBalance'),
//				Column::make('beneficiaryAccount'),
				Column::make('refNo'),
//				Column::make('benAccountName'),
//				Column::make('bankName'),
//				Column::make('dueDate'),
//				Column::make('docId'),
//				Column::make('transactionType'),
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
			return 'transactionMbBankHistoryList_' . date('YmdHis');
		}
	}
