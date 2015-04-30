@extends('admin')

@section('content')
	<div class="container-fluid">
<h1>Select Student</h1>
{!!Form::open()!!}
<div class="form-group">
{!!Form::label('student_id','Student :')!!}
{!!Form::select('student_id',$students,null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::submit('Next',['class'=>'btn btn-primary form-control'])!!}
</div>
{!!Form::close()!!}
	</div>
@stop