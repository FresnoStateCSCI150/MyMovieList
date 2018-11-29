<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    // constructor function
    public function __construct()
    {
        // must be logged in in order to create post
        $this->middleware('auth')->except(['index', 'show']);
            // except any guest can view all posts (index)
            // and any guest can view a single post (show)
    }

    public function index()
    {
        $posts = Post::all();

    	return view('posts.index', compact('posts'));
    }

    public function show()
    {
    	return view('posts.show');
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // create a new post using the request data and save to database
        Post::create(request(['title', 'body']));

        // redirect to home page
        return redirect('discussion');
    }
}
