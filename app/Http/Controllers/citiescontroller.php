<?php

namespace App\Http\Controllers;

use App\DataTables\citiesDataTable;
use App\Http\Requests\cityrequest;
use App\Models\cities;
use Illuminate\Http\Request;
use App\Models\countries;
use App\Models\statemodel;

class citiescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(citiesDataTable  $dataTable  )
    {

        return $dataTable->render('cities.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $country = countries::where('status', 'yes')-> pluck('country_name','cid')->toArray();
        $state = statemodel::where('status', 'yes')-> pluck('statename','state_id')->toArray();


        return view('cities/create',['country'=>$country,'state'=>$state]);



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(cityrequest $request)
    {

        $cities=[

            'country_id'=>$request->country_id,

            'stateid'=>$request->stateid,
            'cityname'=>$request->cityname,

            ];
        cities::create($cities);

        return redirect()->route('cities.index')->with('success', __('country.create_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return redirect()->route('cities.edit', $id,);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = countries::pluck('country_name','cid')->toArray();

        $state = statemodel::pluck('statename','state_id')->toArray();


        $city =cities::where("cityid",$id)->first();

        return view ('cities.edit',['state'=>$state],['country'=>$country,'city'=>$city]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        cities::where('cityid',$id)->delete();

    }
    public function getcity($stateId)
    {
        $fetchcity = cities::where('stateid', $stateId)->where('status','yes')
            ->pluck('cityname', 'cityid');


        return response()->json($fetchcity);
    }

    public function toggleStatus(Request $request, $cid)
    {
        $country = cities::findOrFail($cid);

        $country->status = $request->status;
        $country->save();

        return response()->json(['success' => true]);
    }
}
