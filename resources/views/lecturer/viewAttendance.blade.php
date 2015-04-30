@extends('lecturer')

@section('content')
<div class="container-fluid">
<h1>Attendance</h1>
@if(count($students) == count($attendanceList))
<div class="row">
	<div class="col-md-4">
		<b> First Name </b>
	</div>

	<div class="col-md-4">
		<b> Last Name </b>
	</div>

	<div class="col-md-4">
		<b> Attendance % </b>
	</div>
</div>
@foreach($students as $student)
	<div class="row">
		<div class="col-md-4">
			{{$student->firstname}}
		</div>

		<div class="col-md-4">
			{{$student->lastname}}
		</div>

		<div class="col-md-4">
			{{$attendanceList[$student->id]}}
		</div>
	</div>


@endforeach
@else
<p> No Attendance has been taken</p>
@endif

</div>

@stop