
@extends('app')
@include('header')

<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Add country </h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-9 p-4 shadow " >

{!! Form::open(['route' => 'country.store','id' => 'countryForm']) !!}
@include('country.form',[
        'countries' => null
    ])

<div  class="text-center">
    <button  class="btn btn-md btn-primary">submit</button>
<div>
{!! Form::close() !!}

</div></div>