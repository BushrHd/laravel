

<!DOCTYPE html>
<html>
<head>
	<title>  Nourelalam</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap.min.css')}}">
	<style type="text/css">
		body{

			/*background: url("{{asset('images/library.jpg')}}") no-repeat center center fixed;*/

			background-size: 100% auto;
		}

		header{opacity: 0.7;}
		footer{background-color: #fff, opacity:0.7, text-align:center;}

	</style>
</head>
<body>


	<header class="jumbotron">

		<div class="container">
			<div class="col-md-10">
				<h1> ALliance Church</h1>
			     <p> Gos Is In Love With Us</p>
	      	</div>

	      		<div class="col-md-2">  Date: {{$date}} <br />	Time: {{$time}}  </div>
<br />	<br />	
	      		<div class="col-md-2">

	      	@if(Auth::check())

	      			<a href="/admin" > {{Auth::user()->name}} </a>
		         </div>
		         <div class="col-md-2">
	      			<a href="/" > Home page </a>
		         </div>
		         <div class="col-md-2">
	      			<a href={{ route('logout') }} > Log out </a>
		         </div>
		    @else
		    <div class="col-md-2">
	      			<a href="/login" > Log in </a>
		     </div>
		      <div class="col-md-2">
	      			<a href="/register" > Register </a>
		      </div>
		      
		     @endif


	
		</div>
	</header>


	@if(Session::has('m'))
	<div  class="container">

	  <div 
	  	@php  
	  	 $a = session()->pull('m')
	  	
	  	@endphp

      class="alert alert-{{ $a[0]}}"> {{ $a[1] }}</div>
	</div>
	
	@endif


	@yield('content')

	<footer class="jumbotron">

		&copy; All Rights Reserved for Bushr Haddad 
		
	</footer>


</body>
</html>