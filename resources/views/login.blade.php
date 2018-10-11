@extends ('template')

@section ('content')

	<h1>Please login</h1>

	<hr>

	<form>

	  <div class="form-group">
	    <label for="InputEmail">Email address</label>
	    <input type="email" class="form-control" id="InputEmail" placeholder="Email">
	  </div>

	  <div class="form-group">
	    <label for="InputPassword">Password</label>
	    <input type="password" class="form-control" id="InputPassword" placeholder="Password">
	  </div>

	  <button type="submit" class="btn btn-default">Login</button>

	</form>

	<hr>

	<p>Don't have an account? <a href="/register">Register.</a></p>
	
	<a href="/forgot">Forgot your password?</a>

@endsection