@extends ('templates/master')

@section ('content')

	<div class="col-sm-8">

		{{-- original poster --}}
		<div class='container'>
    		<div class='row mb-3'>
        		<div class='col-md'>
            		<div class='card shadow-sm bg-white rounded'>
            			<div class='card-header'>
            				<h1>{{ $post->title }}</h1>
            				<hr>
            				<div class='row'>
            					<div class='col'>
            						<h6><strong>{{ $post->user->name }}</strong></h6>
            					</div>
            					<div class="w-200"></div>
            					<div class='col'>
            						<h6 class="text-right"><strong>{{ $post->created_at->diffForHumans() }}</strong> &nbsp; {{ $post->created_at->tz('America/Los_Angeles')->toDayDateTimeString() }}</h6>
            					</div>
            				</div>

            			</div>
                		<div class='card-body'>
							{{ $post->body }}
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- List of available comments --}}
		@if(count($post->comments))
		@foreach ($post->comments as $comment)
		<div class='container'>
    		<div class='row mb-3'>
        		<div class='col-md'>
            		<div class='card shadow-sm bg-white rounded'> 
            			<div class='card-header'>
            				<div class='row'>
            					<div class='col'>
            						<h6><strong>{{ $comment->user->name }}</strong></h6>
            					</div>
            					<div class="w-200"></div>
            					<div class='col'>
            						<h6 class="text-right"><strong>{{ $comment->created_at->diffForHumans() }}</strong> &nbsp; {{ $comment->created_at->tz('America/Los_Angeles')->toDayDateTimeString() }}</h6>
            					</div>
            				</div>
            			</div>            			
                		<div class='card-body'>
							{{ $comment->body }}
						</div>
					</div>
				</div>
			</div>	
		</div>
		@endforeach
		@endif

		<hr>

		{{-- Add a comment --}}
		<div class="card shadow-sm bg-white rounded mb-3">
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