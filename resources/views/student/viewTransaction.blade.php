@extends('student')

@section('content')
<div class="container-fluid">
<h2> Your Transactions </h2>
<div class="row">
<div class="col-md-4">
<b>Purchase Point </b>
</div>
<div class="col-md-4">
<b>Purpose </b>
</div>
<div class="col-md-4">
<b>Amount </b>
</div>
</div>
</div>

		@foreach($transactions as $transaction)
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
<span>{{$transaction['created_at']}} </span>
</div>
<div class="col-md-4">
<span>{{$transaction['purpose']}} </span>
</div>
<div class="col-md-4">
<span>{{$transaction['amount']}} </span>
</div>
</div>
</div>


		@endforeach

@stop