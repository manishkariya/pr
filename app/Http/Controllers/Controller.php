<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Models\department;
use App\Models\designation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
use DB;
use Psy\Readline\Hoa\Console;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index1()
    {
       return view ('register');

    }

    public function login()
    {

        $user = Sentinel::getUser();
        if ($user)
         {
            return redirect('employee')->withErrors('pls login first.');

                  }

       return view('login');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Sentinel::getUser();
        if ($user)
         {

           return view ('employee/index');            }

       return redirect('login');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function storelogin(loginRequest $request)
    {
       // dd($request->all());


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Sentinel::authenticate($credentials)) {



           return redirect('/employee')->with('success', 'Login successful.');
        }

        return redirect('/')->withErrors('Invalid login details.');
    }
    public function fetchdepartment()
    {
        $department=  department::all();
        return Response()->json( $department);
    }


    /**
     * Display the specified resource.
     *   @param  int  $id
     *
     * @return Response
     */
    public function show(string $id)
    {
        $departments = department::pluck( 'departmentname','depart_id')->toArray();
        $defaultDepartmentId = 1; // Set this to the ID of the department you want as default

        return view('employee/create', compact('departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */



    public function register(registerRequest $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'email.unique' => 'This email is already registered.',


        ]);

        $user = Sentinel::registerAndActivate([
            'email'    => $request->email,
            'password' => $request->password,
            'first_name' => $request->firstname,
            'last_name'  => $request->lastname,
        ]);

   // $user->permissions = [
      //  'student.view' => false,
   //  ];

    // $user->save();

        return redirect('/')->with('success', 'Registration successful. Please login.');


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(Request $request)
    {
        Sentinel::logout();
        $request->session()->invalidate();


        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out.');
    }

    public function getDesignations($departmentId)
{
    $designations = designation::where('department_id', $departmentId)
        ->pluck('designationname', 'desig_id');


    return response()->json($designations);
}
}
