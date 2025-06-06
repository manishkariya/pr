<?php

namespace App\DataTables;

use App\Models\countries;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CountriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query)
    {
        return datatables()
        ->eloquent($query)
        ->addColumn('action', function ($row) {
            $editUrl = route('country.edit', $row->cid);
            $deleteUrl = route('country.destroy', $row->cid);
            $checked = $row->status === 'yes' ? 'checked' : '';

            return '
                <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\')">
                    '.csrf_field().method_field('DELETE').'
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>

                <div class="form-check   form-switch d-inline-block  ml-3">
                    <input type="checkbox" class="form-check-input  status-switch  " data-id="'.$row->cid.'" '.$checked.'>
                </div>
            ';
        });
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\countries $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(countries $model)
    {
        return $model->newQuery()->select(['cid', 'country_name', 'status']);    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns([
            ['data' => 'cid', 'name' => 'cid', 'title' => 'ID'],
            ['data' => 'country_name', 'name' => 'country_name', 'title' => 'Country Name'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Actions', 'orderable' => false, 'searchable' => false],
        ])
        ->minifiedAjax(route('country.index'))
        ->parameters([
            'processing' => true,
            'serverSide' => true,
            'responsive' => true,
        ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Countries_' . date('YmdHis');
    }
}
