@extends('admin')

@section('content')
<div class='container-fluid'>
@if(count($modules))
{!!Form::model($modules, ['method'=>'PATCH', 'url'=>['admin/module',$modules->id]])!!}
@include('admin._modulesForm',['button'=>'Edit Module'])
{!!Form::close()!!}
</div>

@endif

@stop