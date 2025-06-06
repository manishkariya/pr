<?php

namespace App\Http\Controllers;

use App\DataTables\stateDataTable;
use App\Http\Requests\staterequest;
use App\Models\cities;
use App\Models\countries;
use App\Models\state;
use App\Models\statemodel;
use Illuminate\Http\Request;

class statecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(stateDataTable $dataTable)
    {

        return $dataTable->render('states.index');



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = countries::where('status', 'yes')-> pluck('country_name','cid')->toArray();



        return view('states/create',['country'=>$country]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(staterequest $request)
    {

        $state=[
            'countryid'=>$request->country_name,
            'statename'=>$request->statename,

            ];
        statemodel::create($state);

        return redirect()->route('state.index')->with('success', __('country.create_success'));

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return redirect()->route('state.edit', $id,);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        $state =statemodel::where("state_id",$id)->first();

       $store=  $state->countryid;

       $country = countries::where('status', 'yes',)->orWhere('cid', $store)->pluck('country_name','cid')->toArray();


        return view ('/states.edit',['state'=>$state],['country'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(staterequest $request,$id)
    {

        $data=[

            'countryid'=>$request->country_name,
            'statename'=>$request->statename

            ];        statemodel::where("state_id",$id)->update($data);
            return redirect()->route('state.index')->with('success', __('country.create_success'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $cityid=  cities::where('stateid',$id)->first();

        if(empty($cityid))
        {
            statemodel::where('state_id',$id)->delete();
        }

        return redirect()->route('state.index')->with('success', __('country.create_success'));


    }
    public function getstate($countryId)
    {
        $fetchstate = statemodel::where('countryid', $countryId)->where('status','yes')
            ->pluck('statename', 'state_id');


        return response()->json($fetchstate);
    }
    public function toggleStatus(Request $request, $state_id)
    {


        $country = statemodel::findOrFail($state_id);


        $country->status = $request->status;
        $country->save();

        return response()->json(['success' => true]);
    }
}
