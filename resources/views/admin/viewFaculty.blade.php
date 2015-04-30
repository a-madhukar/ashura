@extends('admin')

@section('content')
<div class="container-fluid">
<h1>Faculties </h1>
@if(count($faculties))
	@foreach($faculties as $faculty)
		<div class="container-fluid">
			<h2> {{$faculty->facultyname}} </h2>
			<p> Faculty Head: {{$faculty->facultyhead}}</p>
			<p>
				<span><a href="{{url('admin/faculty/edit',$faculty->id)}}"> Edit </a></span>
				<span>|</span>
				<span><a href="{{url('admin/faculty/delete',$faculty->id)}}"> Delete </a></span>
			</p>
		</div>
	@endforeach
@else
<p>No Faculties </p>
@endif
</div>
@stop