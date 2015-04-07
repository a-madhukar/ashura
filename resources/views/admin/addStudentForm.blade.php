@extends('admin')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <h2>Add Student</h2>
        </div>
        
        <div class="container-fluid">
            {!!Form::open(['url'=>'admin/adduser/student']) !!}
                @include('admin._form',['submitbutton'=>'Add Student'])
            {!!Form::close() !!}
        </div>
    </div>
@stop