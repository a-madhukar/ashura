@extends('admin')

@section('content')

<!-- The update faculty form  -->
<div class="container-fluid">
<h1>{{$faculty->facultyname}} </h1>

<div class="container-fluid">
{!!Form::model($faculty,['method'=>'PATCH', 'url'=>['admin/faculty',$faculty->id]]) !!}

@include('admin._facultyform',['button'=>'Update Faculty'])

{!!Form::close() !!}
</div>
</div>
@stop
