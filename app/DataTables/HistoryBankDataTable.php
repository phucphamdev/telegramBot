<?php
	
	namespace App\DataTables;
	
	use App\Models\HistoryBank;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Illuminate\Support\Str;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Services\DataTable;
	
	class HistoryBankDataTable extends DataTable
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
				->editColumn('created_at', function (HistoryBank $model) {
					return $model->created_at->format('d M, Y');
				})
				->editColumn('detail', function (HistoryBank $model) {
					$content['ma_gd'] = $model->ma_gd;
					$content['ten_khach_hang'] = $model->ten_khach_hang;
					$content['tai_khoan_nhan'] = $model->tai_khoan_nhan;
					$content['tai_khoan_khach_hang'] = $model->tai_khoan_khach_hang;
					$content['noi_dung'] = $model->noi_dung;
					$content['so_tien'] = $model->so_tien;
					$content['so_tien_thuc_nhan'] = $model->so_tien_thuc_nhan;
					$content['doi_tac'] = $model->doi_tac;
					$content['created_at'] = $model->created_at;
					
					return view('pages.historybank._details', compact('content'));
				})
				->addColumn('action', function (HistoryBank $model) {
					return view('pages.historybank._actionmenu', compact('model'));
				});
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\HistoryBank $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(HistoryBank $model): QueryBuilder
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
				->setTableId('historybank-table')
				->columns($this->getColumns())
				->minifiedAjax()
				->pageLength(25)
				->dom('Bfrtip')
				->orderBy(5);
		}
		
		/**
		 * Get columns.
		 *
		 * @return array
		 */
		protected function getColumns(): array
		{
			return [
				[
					'name' => 'groupbank',
					'title' => 'Nhóm Ngân Hàng',
					'data' => 'groupbank'
				],

//				Column::make('id_refNo'),
				[
					'name' => 'refNo',
					'title' => 'refNo',
					'data' => 'refNo'
				],
				[
					'name' => 'description',
					'title' => 'Ghi Chú',
					'data' => 'description'
				],
				[
					'name' => 'accountNo',
					'title' => 'Số Tiển / Tài Khoản',
					'data' => 'accountNo'
				],
				[
					'name' => 'debitAmount',
					'title' => 'Số Tiển / Tài Khoản',
					'data' => 'debitAmount'
				],
				[
					'name' => 'created_at',
					'title' => 'Ngày Tạo',
					'data' => 'created_at'
				],
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
			return 'HistoryBank_' . date('YmdHis');
		}
	}
