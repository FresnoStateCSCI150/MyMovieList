@extends ('templates/master')

@section ('content')

	<h1>Discussions</h1>
	
	<hr>

	<a class="btn btn-primary" href="/discussion/create" role="button">Create a post</a>

	<hr>

	<div class="col-sm-8 blog-main">

		@foreach ($posts as $post)
			@include ('posts.post')
		@endforeach

	</div>

@endsection