<?php

namespace App\Http\Controllers;

use App\DataTables\employeetableDataTable;
use App\Http\Requests\employeeRequest;
use App\Models\cities;
use App\Models\countries;
use App\Models\department;
use App\Models\employee;
use App\Models\designation;
use App\Models\experience;
use App\Models\statemodel;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Yajra\DataTables\Facades\DataTables;
use luminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(employeetableDataTable $DataTable)
    {
        $user = Sentinel::getUser();
             if ($user)
              {

                return $DataTable->render('employee.index');          }

            return redirect('/')->withErrors('pls login first.');




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poNumber = 'EP-' ;




        $country = countries::where('status', 'yes',)->pluck('country_name','cid')->toArray();

        $departments = department::pluck('departmentname','depart_id')->toArray();
        $des = designation::pluck('designationname','desig_id')->toArray();
        $state = statemodel::pluck('statename','state_id')->toArray();
        $city = cities::pluck('cityname','cityid')->toArray();




        return view ('employee.create',['department'=>$departments,'desig'=>$des,'country'=>$country,'state'=>$state,'city'=>$city]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(employeeRequest $request)
    {
        $last = employee::orderBy('id', 'desc')->first();

        $epNumber = 'EP-' . now()->format('Y').'/'.$last['id'];

        $department= department::where("depart_id",$request->department)->value('departmentname');
         $designation=  DB::table('designation')->where("desig_id",$request->designation)->value('designationname');

         $addemployee=[

            'E_number'=>$epNumber,
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'lastname'=>$request->lastname,
            'birthdate'=>$request->birthdate,
            'age'=>$request->age,
            'department'=>$request->department,
            'designation'=>$request->designation,
            'country'=>$request->country,

            'state'=>$request->state,
            'city'=>$request->city,


            ];
          $emd1id=  employee::create($addemployee);
          $regid=$emd1id->id;
          $groupA = $request->input('group-a');



    foreach($groupA as $index => $values)
   {
        $emdid=$regid;




        experience::create([
            'empid'=>$emdid,
            'totalexperience'=>$values['totalexperience'],
            'role'=>$values['role'],
            'company_name'=>$values['company_name'],
            'start_date'=>$values['start_date'],
            'end_date'=>$values['end_date'],





        ]);


    }

    return redirect()->route('employee.index');



}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee =  employee::where('id',$id)->first();

        $depart= $employee->department;
        $desig=$employee->designation;
        $department = department::where('depart_id',$depart)->first();
        $designation = designation::where('desig_id',$desig)->first();
        $experince =experience::where('empid',$id)->get();
        $country = countries::where('cid',$employee['country'])->value('country_name');





        return view('employee.show',['employee'=>$employee,'department'=>$department,'designation'=>$designation,'experience'=>$experince,'countries'=>$country]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee =employee::where("id",$id)->first();
        $store=  $employee->country;
        $store1=  $employee->state;


        $state = statemodel::where('countryid',$store)->pluck('statename','state_id')->toArray();
        $city = cities::Where('stateid', $store1)->pluck('cityname','cityid')->toArray();



        $country = countries::where('status', 'yes',)->orWhere('cid', $store)->pluck('country_name','cid')->toArray();

        $departments = department::pluck('departmentname','depart_id')->toArray();
        $des = designation::where('department_id',$employee->department)->pluck('designationname','desig_id')->toArray();
     //  $city = cities::pluck('cityname','cityid')->toArray();

       $country = countries::where('status', 'yes',)->orWhere('cid', $store)->pluck('country_name','cid')->toArray();


        $designation =experience::Where("empid",$id)->get();


        return view ('/employee.edit',['employee'=>$employee,'department'=>$departments,'designation'=>$designation,'desig'=>$des,'country'=>$country,'state'=>$state,'city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(employeeRequest $request,$id)
    {
        $employee=[

            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'lastname'=>$request->lastname,
            'birthdate'=>$request->birthdate,
            'age'=>$request->age,
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            ];


            employee::where("id",$id)->update($employee);
            $groupA = $request->input('group-a');

            $itemIDs = collect($groupA)->pluck('Ex_id')
            ->filter(function ($value, $key) {
                return  $value != null;
            }) ?? null;
            if (!empty($itemIDs)) {
                experience::where('empid', $id)
                    ->whereNotIn('Ex_id', $itemIDs)->delete();
            }


            if (isset($request['group-a']) && $request['group-a'])


            foreach($groupA as $index => $values)
            {
                    $exid=$values['Ex_id'] ?? 0;

                    $exp=[

                        'empid'=>$id,

                        'totalexperience'=>$values['totalexperience'],
                        'role'=>$values['role'],
                        'company_name'=>$values['company_name'],
                        'start_date'=>$values['start_date'],
                        'end_date'=>$values['end_date'],
                         ];
                    if(!empty( $exid))
                    {

                    experience::where("Ex_id",$exid)->update($exp);

                    }
                    else
                    {
                        experience::create($exp);
                    }


                }






        return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = employee::findOrFail($id);
        $user->delete();

        $subregister=experience::where('empid',$id);
        $subregister->delete();

        return redirect()->route('employee.index')->with('success', __('country.create_success'));
    }


    public function getUsers(DataTables $datatables,Request $request)
    {

      //  if ($request->ajax()) {
         //   $data = employee::query();
          //  return DataTables::of($data)->make(true);

            if ($request->ajax()) {

                $allcities=employee::join('department','department.depart_id','=','employee.department')
                ->join('designation','designation.desig_id','=','employee.designation')
                ->join('countries','countries.cid','=','employee.country')
                ->join('states','states.state_id','=','employee.state')
                ->join('cities','cityid','=','employee.city')
                ->select('employee.*','department.departmentname','designation.designationname','countries.country_name','states.statename','cities.cityname')->get();

                $data = $allcities;


                return DataTables::of($data)
                ->addColumn('id_link', function ($row) {
                    $url = route('employee.show', $row->id);

                    return '<a href="' . $url . '">' . $row->E_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('employee.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                    $deleteBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-sm btn-danger delete-button">Delete</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['id_link', 'action']) // tell DataTables to render HTML
                ->make(true);
            }
            return response()->json(['message' => 'Invalid request'], 400);

        }


}
