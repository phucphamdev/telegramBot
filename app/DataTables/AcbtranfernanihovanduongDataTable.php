<?php

namespace App\DataTables;

use App\Models\Acbtranfersnani88;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AcbtranfernanihovanduongDataTable extends DataTable
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
			->editColumn('activeDatetime', function (Acbtranfersnani88 $model) {

				if (!empty($model->activeDatetime)) {
					$mil = $model->activeDatetime / 1000;
					return date("d/m/Y H:i:s", $mil);
				}

			})
			->editColumn('amount', function (Acbtranfersnani88 $model) {
				return number_format($model->amount, 0, '', ',');
			})
			->editColumn('effectiveDate', function (Acbtranfersnani88 $model) {
				if (!empty($model->effectiveDate)) {
					$mil = $model->effectiveDate / 1000;
					return date("d/m/Y H:i:s", $mil);
				}
			})
			->editColumn('postingDate', function (Acbtranfersnani88 $model) {
				if (!empty($model->postingDate)) {
					$mil = $model->postingDate / 1000;
					return date("d/m/Y H:i:s", $mil);
				}
			});
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\Acbtranfersnani88 $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(Acbtranfersnani88 $model): QueryBuilder
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
			->setTableId('acbtranfernanihovanduong-table')
			->columns($this->getColumns())
			->minifiedAjax()
			->pageLength(25)
			->dom('Bfrtip')
			->orderBy(11);
		//				->buttons(
		//					Button::make('create'),
		//					Button::make('export'),
		//					Button::make('print'),
		//					Button::make('reset'),
		//					Button::make('reload')
		//				);
	}

	/**
	 * Get the dataTable columns definition.
	 *
	 * @return array
	 */
	public function getColumns(): array
	{
		return [
			Column::make('id'),
			Column::make('amount'),
			Column::make('description'),
			Column::make('account'),
			Column::make('accountName'),
			//				Column::make('receiverName'),
			Column::make('transactionNumber'),
			//				Column::make('bankName'),
			Column::make('isOnline'),
			Column::make('postingDate'),
			//				Column::make('accountOwner'),
			Column::make('type'),
			//				Column::make('receiverAccountNumber'),
			Column::make('currency'),
			Column::make('activeDatetime'),
			Column::make('effectiveDate'),
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
		return 'Acbtranfernanihovanduong_' . date('YmdHis');
	}
}
