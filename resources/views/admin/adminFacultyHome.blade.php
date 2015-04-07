@extends('admin')


@section('content')
    <h1>Courses</h1>
    @foreach($courses as $course)
    <div class='container-fluid'>
        <a href='#'><h2>{{$course->course_name}} </h2></a>
        @if($course->course_type_id==1)
        <p>Diploma</p>
        @elseif($course->course_type_id==2)
        <p>Degree</p>
        @endif
    </div>
    @endforeach
@stop