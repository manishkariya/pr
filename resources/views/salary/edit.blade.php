@extends('app')
<div class="container">
    <div class="d-flex justify-content-center text-dark">
                <h1> Edit Salary</h1>
    </div>
        <div class=" d-flex justify-content-center ">


{!! Form::model($salary, ['route' => ['salary.update', $salary->salaryid],'id' => 'salaryForm']) !!}
@method('PUT')
{!! Form::hidden ('id', $salary->salaryid ,['id' => 'id' ])!!}
@include('salary.form',[
        'salary' => $salary
    ])
<button class="btn btn-secondary">update</button>
{!! Form::close() !!}


        </div>

    </div>
    @include('salary.script')
