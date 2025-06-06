<?php

namespace App\DataTables;

use App\Models\cities;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class citiesDataTable extends DataTable
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
        ->addColumn('action', function ($row) {
            $editUrl = route('cities.edit', $row->cityid);
            $deleteUrl = route('cities.destroy', $row->cityid);
            $checked = $row->status === 'yes' ? 'checked' : '';



            return '



                <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\')">
                    '.csrf_field().method_field('DELETE').'
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>

                <div class="form-check   form-switch d-inline-block  ml-3">
                    <input type="checkbox" class="form-check-input  status-switch  " data-id="'.$row->cityid.'" '.$checked.'>
                </div>


            ';
        });;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\cities $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(cities $model): QueryBuilder
    {
        $fields = [
            'cities.*',
            'countries.country_name as country_name',
            'states.statename as state_name'
        ];
        $query = $model->newQuery()
            ->select($fields)
            ->join('countries', 'countries.cid', '=', 'cities.country_id')
            ->join('states', 'states.state_id', '=', 'cities.stateid');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()

        ->minifiedAjax(route('salary.index'))
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
        return 'cities_' . date('YmdHis');
    }
}
