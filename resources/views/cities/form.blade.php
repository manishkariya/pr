@extends('app')

{!! Form::label('country', trans(' country name ')) !!}<i class="text-danger">*</i>
{{ Form::select('country_id', ['' => '-- Select country --'] + $country,null , [
    'class' => 'form-control required',
    'id' => 'country_id',
    'data-placeholder' => 'Select country',
]) }}
   @if ($errors->has('country_id'))
   <span class="text-danger">
       {{ $errors->first('country_id') }}
   </span>
   @endif
   <div>
{!! Form::label('country', trans('  state name ')) !!}<i class="text-danger">*</i>
{{ Form::select('stateid', ['' => '-- Select state --'] + $state,null , [
    'class' => 'form-control required',
    'id' => 'state_id',
    'data-placeholder' => 'Select state',
]) }}
   @if ($errors->has('stateid'))
   <span class="text-danger">
       {{ $errors->first('stateid') }}
   </span>
   @endif
</div>

<div class="form-group">
    {{Form::label(__('city.name'), __(' city name'))}}<i class="text-danger">*</i>
    {{Form::text('cityname', null,['class' => 'form-control' , 'placeholder' => 'Enter city nme','data-msg-remote' => 'The name has already been taken.']);}}
</div>
@if ($errors->has('cityname'))
<span class="text-danger">
    {{ $errors->first('cityname') }}
</span>
@endif



