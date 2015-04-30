@extends('admin')

@section('content')
<div class="container-fluid">
   <div class="container-fluid">
        <h2> Add Course</h2>
   </div>
    
    {!!Form::open()!!}
@include('admin._courseForm',['button'=>'Add Course'])
    {!!Form::close() !!}
</div>
    
@stop