@extends('admin')

@section('content')

<!-- The add faculty form  -->
<div class="container-fluid">
{!!Form::open() !!}

@include('admin._facultyform',['button'=>'Add Faculty'])

{!!Form::close() !!}
</div>


@stop 
