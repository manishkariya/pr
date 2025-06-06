<?php

namespace App\Http\Controllers;

use App\DataTables\CountriesDataTable;
use App\Models\countries;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\countryrequest;
use App\Models\cities;
use App\Models\Country;
use App\Models\statemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;



class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CountriesDataTable $dataTable)
    {
        return $dataTable->render('country.index');


     // $countries = countries::all();
       // return view('country/index',['countries'=>$countries]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('country/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(countryrequest $request)
    {
        $countries=[

            'country_name'=>$request->country_name,

            ];
        countries::create($countries);

        return redirect()->route('country.index')->with('success', __('country.create_success'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('country.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $country =countries::where("cid",$id)->first();

        return view ('/country.edit',['country'=>$country]);


    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Update the specified resource in storage.
     *
       * Update the specified resource in storage.
     *

     */
    public function update(countryrequest $request,string $id)
    {

        $data=[

            'country_name'=>$request->country_name,

            ];        countries::where("cid",$id)->update($data);
            return redirect()->route('country.index')->with('success', __('country.create_success'));

    }


    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {

     $stateid= statemodel::Where("countryid",$id)->first();


       if(empty($stateid))
       {
       countries::where("cid",$id)->delete();
       }

        return redirect()->route('country.index')->with('success', __('country.create_success'));

    }

    public function toggleStatus(Request $request, $cid)
{
    $country = countries::findOrFail($cid);

    $country->status = $request->status;
    $country->save();

    return response()->json(['success' => true]);
}


}
