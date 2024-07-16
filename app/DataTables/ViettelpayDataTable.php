<?php
	
	namespace App\DataTables;
	
	use App\Models\Viettelpay;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class ViettelpayDataTable extends DataTable
	{
		/**
		 * Build DataTable class.
		 *
		 * @param QueryBuilder $query Results from query() method.
		 * @return \Yajra\DataTables\EloquentDataTable
		 */
		public function dataTable(QueryBuilder $query): EloquentDataTable
		{
			return datatables()
				->eloquent($query)
				->addColumn('action', 'viettelpay.action');
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\Viettelpay $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(Viettelpay $model): QueryBuilder
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
				->setTableId('viettelpay-table')
				->columns($this->getColumns())
				->minifiedAjax()
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
				Column::make('customer_name'),
				Column::make('transaction_amount'),
				Column::make('transaction_title'),
				Column::make('transaction_content'),
				Column::make('transaction_status'),
				Column::make('shop_name'),
				Column::make('feature_name'),
				Column::make('acc_name'),
				Column::make('account_number'),
//				Column::make('money_source_bank_code'),
				Column::make('request_id'),
				Column::make('process_code'),
//				Column::make('viettel_bank_code'),
				Column::make('ben_msisdn'),
//				Column::make('ben_bank_code'),
				Column::make('ben_account_number'),
//				Column::make('display_type'),
				Column::make('is_spend_money_transaction'),
				Column::make('transaction_fee'),
				Column::make('transaction_time'),
//				Column::make('created_at')->addClass('none'),
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
			return 'Viettelpay_' . date('YmdHis');
		}
	}
