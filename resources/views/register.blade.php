@extends ('template')

@section ('content')

	<h1>Please register</h1>

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

	  <div class="form-group">
	    <label for="InputPassword">Confirm Password</label>
	    <input type="password" class="form-control" id="InputPassword" placeholder="Confirm Password">
	  </div>

	  <button type="submit" class="btn btn-default">Register</button>

	</form>

@endsection