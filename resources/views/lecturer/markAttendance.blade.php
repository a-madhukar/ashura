@extends('lecturer')

@section('content')
    
    {!!Form::open() !!}
       <div class="form-group">
        {!! Form::label('attendance_date','Date :') !!}
        {!! Form::input('date','attendance_date',date('Y-m-d'),['class'=>'form-control'])!!}
    </div> 
    <p>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <b> First Name </b>
                    </div>
                     <div class="col-md-4">
                         <b> Last Name </b>
                    </div>
                     <div class="col-md-4">
                         <b> Attendance </b>
                    </div>
                </div>
    </div>
</p>
        @foreach($students as $student)
        <div class="form-group">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        {{ $student['firstname']}} 
                    </div>
                     <div class="col-md-4">
                        {{ $student['lastname']}}
                    </div>
                     <div class="col-md-4">
                        {!!Form::label('attendance','Present :')!!} {!! Form::select('attendance[]',array('true'=>'Yes','false'=>'No'))!!}
                    </div>
                </div>
            </div>
            
        </div>
        @endforeach
        {!!Form::submit('Confirm',['class'=>'btn btn-primary form-control']) !!}
    {!!Form::close() !!}
  

@stop