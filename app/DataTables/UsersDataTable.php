<?php
	
	namespace App\DataTables;
	
	use App\Models\User;
	use Illuminate\Database\Eloquent\Builder as QueryBuilder;
	use Yajra\DataTables\EloquentDataTable;
	use Yajra\DataTables\Html\Builder as HtmlBuilder;
	use Yajra\DataTables\Html\Button;
	use Yajra\DataTables\Html\Column;
	use Yajra\DataTables\Html\Editor\Editor;
	use Yajra\DataTables\Html\Editor\Fields;
	use Yajra\DataTables\Services\DataTable;
	
	class UsersDataTable extends DataTable
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
				->editColumn('created_at', function (User $model) {
					return $model->created_at->format('d M, Y');
				})
				->editColumn('type', function (User $model)
				{
					if($model->type ==1)
					{
						return   "Nhân Viên ";
					}
					elseif ($model->type ==2)
					{
						return   "Đối Tác";
					}elseif ($model->type ==3)
					{
						return   "KH của Đối Tác";
					}
					
					return   "Nhân Viên ";
				})
				->editColumn('detail', function (User $model) {
					$content['first_name'] = $model->ma_gd;
					$content['last_name'] = $model->ten_khach_hang;
					$content['UUID'] = $model->tai_khoan_nhan;
					$content['email'] = $model->tai_khoan_khach_hang;
					$content['password'] = $model->noi_dung;
					$content['created_at'] = $model->created_at;
					
					return view('pages.users._details', compact('content'));
				})
				->addColumn('action', function (User $model) {
					return view('pages.users._actionmenu', compact('model'));
				});
		}
		
		/**
		 * Get query source of dataTable.
		 *
		 * @param \App\Models\User $model
		 * @return \Illuminate\Database\Eloquent\Builder
		 */
		public function query(User $model): QueryBuilder
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
				->setTableId('users-table')
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
				Column::make('UUID')->title('Log ID')->width(100)->addClass('ps-0'),
				Column::make('first_name'),
				Column::make('last_name'),
				Column::make('email'),
				Column::make('type'),
				Column::make('password'),
				Column::computed('action')
					->exportable(false)
					->printable(false)
					->addClass('text-center')
					->responsivePriority(-1),
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
			return 'Users_' . date('YmdHis');
		}
	}
