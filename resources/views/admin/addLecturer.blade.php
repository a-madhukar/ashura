@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <h2> Add lecturer </h2> 
    </div>
    
    <div class="container-fluid">
        {!!Form::open(['url'=>'admin/adduser/lecturer']) !!}
            @include('admin._form',['submitbutton'=>'Add Lecturer'])
        {!!Form::close() !!}
    </div>
        

</div>
@stop