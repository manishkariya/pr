<?php

namespace App\Http\Controllers;

use App\DataTables\departmenttatableDataTable;
use App\Http\Requests\departmentrequest;
use App\Http\Requests\employeeRequest;
use App\Models\department;
use Illuminate\Http\Request;
use App\DataTables\deDataTable;



class departmentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(departmenttatableDataTable $DataTable)
    {

              return $DataTable->render('department.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(departmentrequest $request)
    {

        $department=[

            'departmentname'=>$request->departmentname
        ];

       department::create($department);


        return redirect()->route('departments.index')->with('success', __('country.create_success'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('departments.edit',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department =department::where("depart_id",$id)->first();

        return view ('department.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(departmentrequest $request,  $id)
    {
        $data=[
            'departmentname'=>$request->departmentname
        ];
        department::where('depart_id',$id)->update($data);
        return redirect()->route('departments.index')->with('success', __('country.create_success'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('departments.index')->with('success', __('country.create_success'));

    }
}
