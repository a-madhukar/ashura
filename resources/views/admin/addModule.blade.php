@extends('admin')

@section('content')
<div class='container-fluid'>
    {!!Form::open()!!}
		@include('admin._modulesForm',['button'=>'Add Module'])
    {!!Form::close()!!}
</div>
    
@stop