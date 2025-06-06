<?php

namespace App\DataTables;

use App\Models\employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class employeetableDataTable extends DataTable
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
        ->addColumn('E_number', function ($row) {
            $showUrl = route('employee.show', $row->id);
            return '<a href="' . $showUrl . '">' . $row->E_number . '</a>';
        })
        ->addColumn('action', function ($row) {
            $editUrl = route('employee.edit', $row->id);
            $deleteUrl = route('employee.destroy', $row->id);

            return '
                <a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\')">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            ';
        })
        ->rawColumns(['E_number', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(employee $model): QueryBuilder
    {

        $fields = [ 'employee.*',
                   'department.departmentname as departmentname',
                   'designation.designationname as designationname',
                   'countries.country_name as country_name',
                   'states.statename as statename',
                   'cities.cityname as cityname'

        ];
        $query = $model->newQuery()
            ->select($fields)
          -> join('department','department.depart_id','=','employee.department')
        ->join('designation','designation.desig_id','=','employee.designation')
        ->join('countries','countries.cid','=','employee.country')
        ->join('states','states.state_id','=','employee.state')
        ->join('cities','cityid','=','employee.city');




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

        ->minifiedAjax(route('employee.index'))
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
        return 'employee_' . date('YmdHis');
    }
}
