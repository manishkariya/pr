
@extends('app');
<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Add designation </h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-9 p-4 shadow " >

{!! Form::open(['route' => 'designation.store','id' => 'designationForm']) !!}
@include('designation.form',[
        'designation' => null
    ])

<div  class="text-center mt-4">
    <button  class="btn btn-md btn-primary">submit</button>
<div>
{!! Form::close() !!}