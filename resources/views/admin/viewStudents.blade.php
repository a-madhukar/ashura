@extends('admin')

@section('content')

<div class="container-fluid">

<h1> Students </h1>

@if(count($students))

@foreach($students as $student)
<div class="container-fluid">
<h2>{{$student->firstname}} {{$student->lastname}}</h2>
<p>Course: {{$student->course_name}} </p>
<p>Passport: {{$student->passport}}  </p>
<p>Address Line 1: {{$student->addressline1}} </p>
<p>Address Line 2: {{$student->addressline2}}  </p>
<p>City: {{$student->city}} </p>
<p>state: {{$student->state}}</p>
<p>Country: {{$student->country}} </p>
<p>PostCode: {{$student->postcode}}</p>
<p>Email: {{$student->email}}</p>

<p>
<span><a href="{{url('admin/student/edit',$student->id)}}"> Edit </a></span>
<span>|</span>
<span><a href="{{url('admin/student/delete',$student->id)}}"> Delete </a></span>
</p>

</div>

@endforeach
@else
<p>No Students </p>
@endif
</div>
@stop