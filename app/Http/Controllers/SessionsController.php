<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function __construct()
	{
		// only guests can make it to login pages
		// users cannot access these functions, except destroy (logout)
		$this->middleware('guest', ['except' => 'destroy']);
	}


    public function create()
    {
    	// direct to login page
    	return view('sessions.login');
    }

    public function store()
    {
    	// attempt to authenticate user
    	if (! auth()->attempt(request(['email', 'password'])) )
    	{
    		// if not, redirect back with errors
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	};

    	// if yes, sign them in
    		// happens automatically

    	// redirect to the homepage
    	return redirect()->home();
    }

    public function destroy()
    {
    	// logout user
    	auth()->logout();

    	// redirect to the homepage
    	return redirect()->home();
    }
}
