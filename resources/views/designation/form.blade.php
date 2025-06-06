@extends('app')

<div class="form-group">
{!! Form::label('country', trans('  Department  name ')) !!}<i class="text-danger">*</i>
{{ Form::select('department_id', ['' => '-- Select department --']+ $department, isset($designation) ? $designation['department_id'] : null , [
    'class' => 'form-control required ' . ($errors->has('department_id') ? 'is-invalid' : '') ,
    'id' => 'departmentid',
    'data-placeholder' => 'Select country',
]) }}
</div><br>


<div class="form-group">
    {{Form::label(__('department.name'), __('designation name'))}}<i class="text-danger">*</i>
    {{Form::text('designationname', null,[
        'class' => 'form-control required ' . ($errors->has('designationname') ? 'is-invalid' : '')  ,'data-msg-remote' => 'The name has already been taken.']);}}
</div>





