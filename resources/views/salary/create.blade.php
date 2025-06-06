@extends('app')
@include('header')

<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Salary Details </h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-6 p-4 shadow " >


                {!! Form::open(['route' => 'salary.store','id' => 'salaryForm']) !!}

                @include('salary.form',[
                    'salary' => null
                ])
                <div  class="text-center mt-2">
                <button  class="btn btn-md btn-primary">submit</button>

                <div>
                {!! Form::close() !!}

            </div>

        </div>
</div>
@include('salary.script')