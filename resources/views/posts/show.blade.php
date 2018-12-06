@extends ('templates/master')

@section ('content')

	<div class="col-sm-8">

		<h1>{{ $post->title }}</h1>

		{{ $post->body }}

		<hr>
 
		{{-- List of available comments --}}
		@if(count($post->comments))	
		<div class="comments">
			<ul class="list-group">
				@foreach ($post->comments as $comment)
					<li class="list-group-item">
						<strong>
							{{ $comment->created_at->diffForHumans() }}: &nbsp;
						</strong>
						{{ $comment->body }}
					</li>
				@endforeach
			</ul>
		</div>

		<hr>
		@endif

		{{-- Add a comment --}}
		<div class="card">
			<div class="card-block m-3">
				<h5>Join the conversation.</h5>
				<form method="POST" action="/discussion/{{ $post->id }}/comments">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>

				@include('errors/errors')

			</div>
		</div>

	</div>

@endsection