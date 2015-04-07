@extends('admin')

@section('content')
<div class='container-fluid'>
    {!!Form::open()!!}
        <div class="form-group">
            {!!Form::label('course_id','Course: ') !!}
            {!!Form::select('course_id',$courses,null,['class'=>'form-control'])!!}       
        </div>
    
        <div class="form-group">
            {!!Form::label('module_name','Module Name : ') !!}
            {!!Form::text('module_name',null,['class'=>'form-control']) !!}
        </div>
    
    <div class="form-group">
        {!!Form::submit('Add Module',['class'=>'btn btn-primary form-control']) !!}
    </div>
    {!!Form::close()!!}
</div>
    
@stop