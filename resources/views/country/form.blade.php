@extends('app')

<div class="form-group">
    {{Form::label(__('country.name'), __('country.name'))}}<i class="text-danger">*</i>
    {{Form::text('country_name', null,['class' => 'form-control',  'data-msg-remote' => 'The name has already been taken.']);}}
</div>
@if ($errors->has('country_name'))
<span class="text-danger">
    {{ $errors->first('country_name') }}
</span>
@endif




