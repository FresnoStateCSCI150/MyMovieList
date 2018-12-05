<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="/discussion/{{ $post->id }}">{{ $post->title }}</a>
	</h2>
	<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#">User</a></p>
	{{ $post->body }}
</div>
<hr>