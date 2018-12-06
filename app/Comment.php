<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['body'];
	
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function user() // $comment->user->name (to get user associated with comment)
    {
    	return $this->belongsTo(User::class);
    }    
}
