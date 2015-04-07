@extends('admin')

@section('content')

<!-- The add faculty form  -->
<div class="container-fluid">
{!!Form::open() !!}
    <div class="form-group">
        {!!Form::label('facultyname','Faculty Name:') !!}
        {!!Form::text('facultyname',null,['class'=>'form-control'])!!}
     </div>

    <div class="form-group">
        {!!Form::label('facultyhead','Faculty Head:') !!}
        {!!Form::text('facultyhead',null,['class'=>'form-control'])!!}
     </div>


    <div class="form-group">
        {!!Form::submit('Add Faculty',['class'=>'btn btn-primary form-control']) !!}
    </div>
{!!Form::close() !!}
</div>


@stop 
