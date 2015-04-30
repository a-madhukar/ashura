@extends('lecturer')

@section('content')
<h1>Select Course</h1>
{!!Form::open() !!}
<div class="form-group">
{!!Form::label('course_id','Course :') !!}
{!!Form::select('course_id',$course,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!!Form::submit('Next',['class'=>'btn btn-primary form-control']) !!}
</div>
{!!Form::close() !!}
@stop