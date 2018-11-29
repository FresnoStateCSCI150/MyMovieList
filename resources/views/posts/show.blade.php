@extends ('template')

@section ('content')

	<div class="col-sm-8">

		<h1>{{ $post->title }}</h1>

		{{ $post->body }}

		<hr>

		{{-- List of available comments --}}		
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

		{{-- Add a comment --}}
		<div class="card">
			<div class="card-block">
				<form method="POST" action="/dicussion/{{ $post->id }}/comments">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
			</div>
		</div>

	</div>

@endsection