<?php

namespace App;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'body'];

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
    	$this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }
}
