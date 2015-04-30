@extends('admin')

@section('content')
<div class="container-fluid">
<h1>Docket Number</h1>
@if(count($docket))
<p> The docket number is {{$docket}} </p>
@else
<p>The student has low attendance <p>
@endif
</div>
@stop