
@extends('app')
<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Add state </h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-9 p-4 shadow " >

{!! Form::open(['route' => 'state.store','id' => 'stateForm']) !!}
@include('states.form',[
        'state' => null
    ])

<div  class="text-center">
    <button  class="btn btn-md btn-primary">submit</button>
<div>
{!! Form::close() !!}