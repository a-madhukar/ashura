@extends('admin')

@section('content')

<div class="container-fluid">

<h1> Lecturers </h1>

@if(count($lecturers))

@foreach($lecturers as $lecturer)
<div class="container-fluid">
<h2>{{$lecturer->firstname}} {{$lecturer->lastname}}</h2>
<p>Course: {{$lecturer->course_name}} </p>
<p>Passport: {{$lecturer->passport}}  </p>
<p>Address Line 1: {{$lecturer->addressline1}} </p>
<p>Address Line 2: {{$lecturer->addressline2}}  </p>
<p>City: {{$lecturer->city}} </p>
<p>state: {{$lecturer->state}}</p>
<p>Country: {{$lecturer->country}} </p>
<p>PostCode: {{$lecturer->postcode}}</p>
<p>Email: {{$lecturer->email}}</p>

<p>
<span><a href="{{url('admin/lecturer/edit',$lecturer->id)}}"> Edit </a></span>
<span>|</span>
<span><a href="{{url('admin/lecturer/delete',$lecturer->id)}}"> Delete </a></span>
</p>

</div>

@endforeach
@else
<p>No Lecturers </p>
@endif
</div>
@stop