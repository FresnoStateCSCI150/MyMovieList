@extends ('template')

@section ('content')

	<div class="col-sm-8">

		<h1>Create a Post</h1>
		
		<hr>

		<form method="POST" action="/discussion">

			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" id="title" name="title" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="body">Body:</label>
				<textarea id="body" name="body" class="form-control" required></textarea>
			</div>

			<hr>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Post</button>
			</div>

			@if (count($errors))
			<div class="form-group">
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif

		</form>

	</div>

@endsection