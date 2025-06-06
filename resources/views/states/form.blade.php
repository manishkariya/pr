@extends('app')

{!! Form::label('country', trans(' select country name ')) !!}<i class="text-danger">*</i>
{{ Form::select('countryid', ['' => '-- Select country --'] + $country,null , [
    'class' => 'form-control required',
    'id' => 'departmentid',
    'data-placeholder' => 'Select country',
]) }}
   @if ($errors->has('country_name'))
   <span class="text-danger">
       {{ $errors->first('country_name') }}
   </span>
   @endif

<div class="form-group">
    {{Form::label(__('state.name'), __('Enter state name'))}}<i class="text-danger">*</i>
    {{Form::text('statename', null,['class' => 'form-control', 'placeholder' => 'Enter state name',  'data-msg-remote' => 'The name has already been taken.']);}}
    @if ($errors->has('statename'))
    <span class="text-danger">
        {{ $errors->first('statename') }}
    </span>
    @endif
</div>





