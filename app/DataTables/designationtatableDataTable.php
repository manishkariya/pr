<?php

namespace App\DataTables;

use App\Models\designation;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class designationtatableDataTable extends DataTable
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
            $editUrl = route('designation.edit', $row->desig_id);
            $deleteUrl = route('designation.destroy', $row->desig_id);


            return '
                <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\')">
                    '.csrf_field().method_field('DELETE').'
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>


            ';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\designation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(designation $model)
    {
        $fields = [
            'designation.*',
            'department.departmentname as departmentname'
        ];

        $query = $model->newQuery()
            ->select($fields)
            ->join('department', 'department.depart_id', '=', 'designation.department_id');

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

        ->minifiedAjax(route('designation.index'))
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
        return 'designationtatable_' . date('YmdHis');
    }
}
