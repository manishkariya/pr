<?php

namespace App\Http\Controllers;

use App\Http\Requests\departmentrequest;
use App\Http\Requests\designationrequest;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\designation;
use App\DataTables\designationtatableDataTable;




class designationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(designationtatableDataTable $DataTable)
    {



        return $DataTable->render('designation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = department::pluck('departmentname','depart_id')->toArray();

        return view('designation/create',['department'=>$department]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(designationrequest $request)
    {
        $designation=[

            'department_id'=>$request->department_id,
            'designationname'=>$request->designationname
        ];

       designation::create($designation);


        return redirect()->route('designation.index')->with('success', __('country.create_success'));

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $designation =designation::where("desig_id",$id)->first();

        $department = department::where('depart_id',$designation->department_id)->pluck('departmentname','depart_id')->toArray();

        return view ('designation.edit',['designation'=>$designation,'department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(designationrequest $request,  $id)
    {
        $data=[

            'department_id'=>$request->department_id,
            'designationname'=>$request->designationname

            ];        designation::where("desig_id",$id)->update($data);
            return redirect()->route('designation.index')->with('success', __('country.create_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        designation::where('desig_id',$id)->delete();
        return redirect()->route('designation.index')->with('success', __('country.create_success'));

    }
}
