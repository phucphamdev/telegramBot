<?php
	
	namespace App\DataTables;
	
	use App\Models\PartnersCustomer;
	use App\Models\Partners;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class PartnersCustomerDataTable extends DataTable
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
				->addColumn('action', 'partnerscustomer.action')
				->editColumn('created_at', function (PartnersCustomer $model) {
					return $model->created_at->format('d M, Y');
				})
				->editColumn('id_partner', function (PartnersCustomer $model) {
					return $model->id_partner;
				})
				->setRowId('id');
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\PartnersCustomer $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(PartnersCustomer $model): QueryBuilder
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
				->setTableId('partnerscustomer-table')
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
//				Column::computed('action')
//					->exportable(false)
//					->printable(false)
//					->width(60)
//					->addClass('text-center'),
				Column::make('UUID'),
				Column::make('ten'),
				Column::make('tai_khoan'),
				Column::make('email'),
				Column::make('telegram'),
				Column::make('dien_thoai'),
				Column::make('ck_momo'),
				Column::make('ck_vtpay'),
				Column::make('ck_bank'),
				Column::make('ck_zalo'),
				Column::make('so_du'),
				Column::make('cong_ty'),
				Column::make('trang_thai'),
				Column::make('id_partner'),
//				Column::make('website'),
				Column::make('quoc_gia'),
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
			return 'PartnersCustomer_' . date('YmdHis');
		}
	}
