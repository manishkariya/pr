<?php

namespace App\Http\Controllers;

use App\DataTables\salaryDataTable;
use App\Http\Requests\salaryrequest;
use App\Models\employee;
use App\Models\salarymodel;

use Illuminate\Http\Request;

class salarycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(salaryDataTable $dataTable)
    {

        return $dataTable->render('salary.index');
       // $country = employee::where('status', 'yes')-> pluck('country_name','cid')->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employeename = employee::selectRaw("id, CONCAT(firstname, ' ', middlename ,' ',lastname ) as full_name")->pluck('full_name', 'id')->toArray();

        return view('salary/create',['employeename'=>$employeename]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(salaryrequest $request)
    {
       // dd($request->all());

        $salary=["employee_id"=>$request->employee_id,
                 "basic"=>isset($request['basic']) ? (float)$request['basic']:0,
                 "hra"=>isset($request['hra']) ? (float)$request['hra']:0,
                 "specialallows"=>isset($request['speacialallows'])? (float)$request['speacialallows']:0,
                 "overtime"=>isset($request['overtime'])? (float)$request['overtime']:0,
                 "totalsalary"=>isset($request['totalsalary'])? (float)$request['totalsalary']:0

    ];
        salarymodel::create($salary);
        return  redirect()->route ('salary.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $salary =salarymodel::where("salaryid",$id)->first();
        $employeename = employee::where('id',$salary->employee_id)->selectRaw("id, CONCAT(firstname, ' ', middlename ,' ',lastname ) as full_name")->first('full_name', 'id')->toArray();





        return view ('salary.show',['salary'=>$salary,'employeename'=>$employeename]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employeename = employee::selectRaw("id, CONCAT(firstname, ' ', middlename ,' ',lastname ) as full_name")->pluck('full_name', 'id')->toArray();

        $salary =salarymodel::where("salaryid",$id)->first();

        return view ('/salary.edit',['salary'=>$salary,'employeename'=>$employeename]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(salaryrequest $request,  $id)
    {
        $salary=["employee_id"=>$request->employee_id,
        "basic"=>isset($request['basic']) ? (float)$request['basic']:0,
        "hra"=>isset($request['hra']) ? (float)$request['hra']:0,
        "specialallows"=>isset($request['speacialallows'])? (float)$request['speacialallows']:0,
        "overtime"=>isset($request['overtime'])? (float)$request['overtime']:0,
        "totalsalary"=>isset($request['totalsalary'])? (float)$request['totalsalary']:0

];

     salarymodel::where("salaryid",$id)->update($salary);
return redirect()->route('salary.index')->with('success', __('country.create_success'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $salary=salarymodel::where('salaryid',$id);
        $salary->delete();
        return  redirect()->route('salary.index');
    }
}
