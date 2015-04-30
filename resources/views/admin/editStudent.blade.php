@extends('admin')

@section('content')
<div class="container-fluid">
@if($student)
{!!Form::model($student,['method'=>'PATCH', 'url'=>['admin/student',$student->id]])!!}
@include('admin._form',['submitbutton'=>'Edit Student'])
{!!Form::close()!!}
@endif
</div>
@stop