<?php

namespace App\DataTables;

use App\Models\statemodel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class stateDataTable extends DataTable
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
            $editUrl = route('state.edit', $row->state_id);
            $deleteUrl = route('state.destroy', $row->state_id);
            $checked = $row->status === 'yes' ? 'checked' : '';

            return '
                <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\')">
                    '.csrf_field().method_field('DELETE').'
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>

                <div class="form-check   form-switch d-inline-block  ml-3">
                    <input type="checkbox" class="form-check-input  status-switch  " data-id="'.$row->state_id.'" '.$checked.'>
                </div>
            ';
        })
        ->filterColumn('country_name', function ($query, $keyword) {
            $query->where('countries.country_name', 'LIKE', "%{$keyword}%");
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\statemodel $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(statemodel $model)
    {
        $fields = [
            'states.*',                         // All fields from states table
            'countries.country_name as country_name'  // Renamed for clarity in DataTable
        ];

        $query = $model->newQuery()
            ->select($fields)
            ->join('countries', 'states.countryid', '=', 'countries.cid');
            if (request()->get('country_name')) {
                $query->where('countries.country_name', 'like', "%" . request()->get("country_name") . "%");
            }
            if (request()->get('statename')) {
                $models->where('states.statename', 'like', "%" . request()->get("statename") . "%");
            }

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
        ->columns([
            ['data' => 'state_id', 'name' => 'state_id', 'title' => 'ID'],
            ['data' => 'countryid', 'name' => 'countryid', 'title' => 'state Name'],

            ['data' => 'statename', 'name' => 'statename', 'title' => 'state Name'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Actions', 'orderable' => false, 'searchable' => false],
        ])
        ->minifiedAjax(route('state.index'))
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
        return 'state_' . date('YmdHis');
    }
}
