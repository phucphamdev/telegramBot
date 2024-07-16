<?php
	
	namespace App\DataTables;
	
	use App\Models\HistoryZaloPay;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Services\DataTable;
	
	class HistoryZaloPayDataTable extends DataTable
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
				->editColumn('created_at', function (HistoryZaloPay $model) {
					return $model->created_at->format('d M, Y');
				})
				->editColumn('detail', function (HistoryZaloPay $model) {
					$content['ma_gd'] = $model->ma_gd;
					$content['ten_khach_hang'] = $model->ten_khach_hang;
					$content['tai_khoan_nhan'] = $model->tai_khoan_nhan;
					$content['tai_khoan_khach_hang'] = $model->tai_khoan_khach_hang;
					$content['noi_dung'] = $model->noi_dung;
					$content['so_tien'] = $model->so_tien;
					$content['so_tien_thuc_nhan'] = $model->so_tien_thuc_nhan;
					$content['doi_tac'] = $model->doi_tac;
					$content['created_at'] = $model->created_at;
					
					return view('pages.historyzalopay._details', compact('content'));
				})
				->addColumn('action', function (HistoryZaloPay $model) {
					return view('pages.historyzalopay._actionmenu', compact('model'));
				});
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\HistoryZaloPay $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(HistoryZaloPay $model): QueryBuilder
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
				->setTableId('historyzalopay-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->dom('Bfrtip')
				->stateSave(true)
				->orderBy(3)
				->responsive()
				->autoWidth(false)
				->parameters(['scrollX' => true])
				->addTableClass('align-middle table-row-dashed fs-6 gy-5');
		}
		
		/**
		 * Get columns.
		 *
		 * @return array
		 */
		protected function getColumns(): array
		{
			return [
				Column::make('tai_khoan_nhan')->title('Log ID')->width(100)->addClass('ps-0'),
				Column::make('tai_khoan_khach_hang')->title('Log ID')->width(100)->addClass('ps-0'),
				Column::make('ten_khach_hang'),
				Column::make('noi_dung'),
				Column::make('so_tien'),
				Column::make('so_tien_thuc_nhan'),
				Column::make('trang_thai'),
				Column::make('detail'),
				Column::computed('action')
					->exportable(false)
					->printable(false)
					->addClass('text-center')
					->responsivePriority(-1),
				Column::make('ma_gd')->title('Mã GD')->addClass('none'),
				Column::make('tai_khoan_nhan')->addClass('none'),
				Column::make('doi_tac')->addClass('none'),
				Column::make('created_at')->addClass('none'),
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
			return 'HistoryZaloPay_' . date('YmdHis');
		}
	}
