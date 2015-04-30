@extends('admin')

@section('content')
<div class="container">
<h1>Courses</h1>
@if(count($courses))
@foreach($courses as $course)
<div class="container-fluid">
	<h2>{{$course->course_name}}</h2>
<p>Faculty: {{$course->facultyname}} </p>
<p>Course Type: {{$course->type}}  </p>
<p>
<span><a href="{{url('admin/course/edit',$course->id)}}"> Edit </a></span>
<span>|</span>
<span><a href="{{url('admin/course/delete',$course->id)}}"> Delete </a></span>
</p>

</div>

@endforeach
@else
<p>No courses </p>
@endif
</div>
@stop