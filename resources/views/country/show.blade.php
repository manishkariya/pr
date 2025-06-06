@extends('app');

@foreach ($countries as $row )

<div> {{$row->country_name}}

@endforeach
<a href="/country/create" class="btn btn-md btn-danger">edit</a>
