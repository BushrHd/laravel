

@extends('master')

@section('content')

<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading"> Managing Sections</div>
		<div class="panel-body">
			<!-- Creating new department -->
			<h2><br /> Creating New Department</h2> <hr />

			<form action="admin"  method="POST" enctype="multipart/form-data">

				{!! csrf_field() !!}
		
				Enter the name of the section: <input type="text" name="dept_title" /> <br />
				<hr />
				Upload an image: <input type="file" name="image" /> <br />
				<hr />

				<button  class="btn btn-default" type="submit" > Create New Department </button>
				<br />
				<br />

			</form>


		<h2><br /> Editing Departments</h2> <hr />


			@foreach($sections as $section)
			@if($section->trashed())

			<p >
				
			<form  style="width:300px; display:inline-block; background-color: #CA3C3C"  action="admin/{{$section->id}}}" method="POST" >
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="PATCH">
			<input type="text" name="dept_title" value={{$section->title}} /> 
			<button class="btn btn-default" type="submit" style="background-color: #CA3C3C "> update </button>
		   </form>




			<form style="width:300px; display:inline-block; background-color: #CA3C3C" action="admin/{{$section->id}}}" method="POST" >
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE">
			<button class="btn btn-default" type="submit" style="background-color: #CA3C3C " > delete forever </button>

		   </form>



			<form style="width:300px; display:inline-block; background-color: #CA3C3C" action="admin/restore/{{$section->id}}}" method="POST" >
			{!! csrf_field() !!}
			<button class="btn btn-default" type="submit" style="background-color: #CA3C3C " > restore </button>

		   </form>
		


			</p>

			@else


			<p >
				
			<form   style="width:300px; display:inline-block" action="admin/{{$section->id}}}" method="POST" >
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="PATCH">
			<input type="text" name="dept_title" value={{$section->title}} /> 
			<button class="btn btn-primary" type="submit"> update </button>
		   </form>




			<form style="width:300px; display:inline-block;" action="admin/{{$section->id}}}" method="POST" >
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE">
			<button class="btn btn-primary" type="submit" style="background-color: #CA3C3C "> delete </button>

		   </form>



		   <form style=" display:inline-block;" action="admin/{{$section->id}}}" >
			{!! csrf_field() !!}
			<button class="btn btn-primary" style="background-color: #fff; color: #000 "  type="submit"> show department </button>

		   </form>
				

			</p>



			@endif


				
			


			@endforeach





		  <br />
		</div>
	</div>

</div>



@stop