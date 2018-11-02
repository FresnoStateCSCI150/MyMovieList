<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	return view('posts.index');
    }

    public function show()
    {
    	return view('posts.show');
    }

    public function create()
    {
    	return view('posts.create');
    }

    //store function
}
