@extends('student')

@section('content')
	<div class="container-fluid">

{!!Form::open() !!}

<div class="form-group">
{!!Form::label('purpose','Purpose :') !!}
{!!Form::select('purpose',['Printing'=>'Printing','Fine'=>'Fine','Resit'=>'Resit'],null,['class'=>'form-control'])!!}
</div>


<div class="form-group">
{!!Form::label('amount','Amount :') !!}
{!!Form::text('amount',null,['class'=>'form-control','placeholder'=>'amount'])!!}
</div>

<div class="form-group">
{!!Form::label('cardholdername','Cardholder Name :') !!}
{!!Form::text('cardholdername',null,['class'=>'form-control','placeholder'=>'cardholdername'])!!}
</div>

<div class="form-group">
{!!Form::label('cardno','Card Number :') !!}
{!!Form::text('cardno',null,['class'=>'form-control','placeholder'=>'card number'])!!}
</div>

<div class="form-group">
{!!Form::label('cv','CV :') !!}
{!!Form::text('cv',null,['class'=>'form-control','placeholder'=>'cv'])!!}
</div>


<div class="form-group">
{!!Form::label('expirydate','Expiry Date :') !!}
{!!Form::input('date','expirydate',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::submit('Pay',['class'=>'btn btn-primary form-control']) !!}
</div>





{!!Form::close() !!}
	</div>
@stop