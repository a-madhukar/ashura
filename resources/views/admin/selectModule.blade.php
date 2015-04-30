@extends('admin')

@section('content')
<div class="container-fluid">
<h1>Select Module</h1>
{!!Form::open()!!}
<div class="form-group">
{!!Form::label('module_id','Module :')!!}
{!!Form::select('module_id',$modules,null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::submit('Next',['class'=>'btn btn-primary form-control'])!!}
</div>
{!!Form::close()!!}
</div>
@stop