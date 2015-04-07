@extends('admin')


@section('content')
<h1>Faculties</h1>
     @foreach($faculties as $faculty) 
        <h2><a href="{{url('/admin/home/faculty',$faculty->id)}}">{{$faculty->facultyname}} </a> </h2>
    @endforeach
@stop