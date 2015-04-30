@extends('parents')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<b>Module Name </b>
</div>
<div class="col-md-6">
<b>Attendance </b>
</div>
</div>
</div>
<br/>
@foreach($modules as $module)
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
{{$module}}
</div>
<div class="col-md-6">
{{(string)rand(70,100) }}%
</div>
</div>
</div>
<br/>

@endforeach

@stop