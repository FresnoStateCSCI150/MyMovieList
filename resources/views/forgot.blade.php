@extends ('template')

@section ('content')

	<h1>Please enter your email</h1>

	<hr>

	<form>

	  <div class="form-group">
	    <label for="InputEmail">Email address</label>
	    <input type="email" class="form-control" id="InputEmail" placeholder="Email">
	  </div>

	  <button type="submit" class="btn btn-default">Submit</button>

	</form>

@endsection