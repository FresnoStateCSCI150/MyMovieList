<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="/discussion/{{ $post->id }}">{{ $post->title }}</a>
	</h2>
	<p class="blog-post-meta">
		<a href="#{{-- add link to user profile here --}}">{{ $post->user->name }}</a> on
		{{ $post->created_at->toFormattedDateString() }}
	</p>
	{{ $post->body }}
</div>
<hr>