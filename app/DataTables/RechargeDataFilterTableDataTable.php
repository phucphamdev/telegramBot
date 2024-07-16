<?php

namespace App\DataTables;

use App\Models\Recharge;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class RechargeDataFilterTableDataTable extends DataTable
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
			->addColumn('action', 'rechargedatafiltertable.action')
			->setRowId('id');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\RechargeDataFilterTable $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(RechargeDataFilterTable $model): QueryBuilder
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
			->setTableId('rechargedatafiltertable-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			->orderBy(1)
			->selectStyleSingle()
			->buttons([
				Button::make('create'),
				Button::make('export'),
				Button::make('print'),
				Button::make('reset'),
				Button::make('reload')
			]);
	}

	/**
	 * Get the dataTable columns definition.
	 *
	 * @return array
	 */
	public function getColumns(): array
	{
		return [
			Column::computed('action')
				->exportable(false)
				->printable(false)
				->width(60)
				->addClass('text-center'),
			Column::make('id'),
			Column::make('add your columns'),
			Column::make('created_at'),
			Column::make('updated_at'),
		];
	}

	public function filter(Request $request)
	{
		$query = Recharge::query();

		// Example: Filtering based on status
		if ($request->has('trang_thai')) {
			$query->where('trang_thai', $request->input('trang_thai'));
		}

		// Apply other filters based on the request parameters

		return $this->applyScopes($query);
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename(): string
	{
		return 'RechargeDataFilterTable_' . date('YmdHis');
	}
}
