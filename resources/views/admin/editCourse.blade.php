@extends('admin')

@section('content')
<div class="container-fluid">
<div class="container-fluid">
<h2> {{$course->course_name}}</h2>
</div>

{!!Form::model($course,['method'=>'PATCH','action'=>['AdminController@updateCourse',$course->id]])!!}

@include('admin._courseForm',['button'=>'Update Course'])

{!!Form::close() !!}
</div>

@stop