


@extends('master')

@section('content')
	<div  class="container"  style="opacity: 0.9">
		<div class="column">

			@foreach ($sections as $section)

<!--      The first section -->
		  <div class="col-md-3">
		  	<div class="thumbnail">
		  		<img src="/images/{{$section->description}}">
		  		<h1><a class="btn btn-primary" > {{$section->title}}  </a></h1>
		  	</div>
		  </div>

			@endforeach



@stop
	