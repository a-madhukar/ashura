@extends('admin')

@section('content')
@if(count($modules))
<h1>Modules</h1>
@foreach($modules as $module)
<h2>{{$module->module_name}} </h2>
<p>Course: {{$module->course_name}} <p>
<p>
<span><a href="{{url('admin/module/edit',$module->id)}}"> Edit </a></span>
<span>|</span>
<span><a href="{{url('admin/module/delete',$module->id)}}"> Delete </a></span>
</p>
@endforeach
@else
<p>No modules</p>
@endif

@stop