<?php

namespace App;

class Post extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user() // $post->user->name (to get user associated with post)
    {
    	return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
    	$this->comments()->create(compact('body'));
    }
}
