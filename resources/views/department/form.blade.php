@extends('app')

<div class="form-group">
    {{Form::label(__('department.name'), __('department name'))}}<i class="text-danger">*</i>
    {{Form::text('departmentname', null,['class' => 'form-control',  'data-msg-remote' => 'The name has already been taken.']);}}
</div>

@if ($errors->has('departmentname'))
<span class="text-danger">
    {{ $errors->first('departmentname') }}
</span>
@endif





