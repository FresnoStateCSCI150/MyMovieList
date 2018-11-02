@extends ('template')

@section ('content')

	<div class="col-sm-8">
	
		<h1>Please login</h1>
	
		<hr>
	
		<form method="POST" action="/login">
	
			{{ csrf_field() }}

		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
		  </div>
	
		  <div class="form-group">
		    <label for="InputPassword">Password</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		  </div>
	
		  <button type="submit" class="btn btn-default">Login</button>

		  @include ('errors')
	
		</form>
	
		<hr>
	
		<p>Don't have an account? <a href="/register">Register.</a></p>
		
		<a href="/forgot">Forgot your password?</a>
	
	</div>

@endsection