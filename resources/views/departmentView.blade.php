
@extends('master')

@section('content')

<div class="container" >
	<div  class="row">
		<h1> {{$department->title}} Department</h1>
	<img src="/images/{{$department->description}}">

	<div>
	<br /> <br />


	<h2>   Adding New Employee </h2>
	    
	    <form   action="/department/{{ $department->id }}" method="POST" enctype="multipart/form-data" >

				{!! csrf_field() !!}
			   

			    name: <input type="text" name="emp_name" /> <br />
				<hr />
				 Phone: <input type="text" name="emp_phone" /> <br />
				<hr />
				Work description:<br /> <textarea name="emp_work_desc"> </textarea> <br />
				<hr />

				<button  class="btn btn-default" type="submit" > Add New Employee </button>

				<br />
				<br />

		</form>


		
	</div>



    
	<h2>  Current Employes</h2>
		<table class="table">
		<tr>
			<th> <h5>Name</h5></th>
			<th> <h5>Phone</h5></th>
			<th> <h5>Work Description</h5></th>

		</tr>
		@foreach($emps as $emp)

		<tr>
			<th> <h5>{{$emp->name}}</h5></th>
			<th> <h5>{{$emp->phone}}</h5></th>
			<th> <h5>{{$emp->work_desc}}</h5></th>
		</tr>
		@endforeach
		

		

	</table>
	<div class="row text-center">
			{!!  $emps->render() !!}
		</div>



	</div>
</div>



@stop