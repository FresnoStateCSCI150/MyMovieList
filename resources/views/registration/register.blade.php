@extends ('template')

@section ('content')

	<div class="col-sm-8">

		<h1>Please register</h1>
	
		<hr>
	
		<form method="POST" action="/register">

			{{ csrf_field() }}

		  <div class="form-group">
		    <label for="name">Name:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
		  </div>
		
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
		  </div>
	
		  <div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
		  </div>
	
		  <div class="form-group">
		    <label for="password_confirmation">Confirm Password:</label>
		    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
		  </div>
	
		  <button type="submit" class="btn btn-primary">Register</button>

		  @include ('errors')
	
		</form>

	</div>

@endsection