@extends('admin')

@section('content')
<div class="container-fluid">
@if($lecturer)
{!!Form::model($lecturer,['method'=>'PATCH', 'url'=>['admin/lecturer',$lecturer->id]])!!}
	@include('admin._form',['submitbutton'=>'Edit Lecturer'])
{!!Form::close()!!}
@endif
</div>
@stop