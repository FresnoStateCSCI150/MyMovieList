<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	// direct to registration page
    	return view('registration.register');
    }

    public function store()
    {
    	// validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|unique:users|email',
    		'password' => 'required|confirmed'
    	]);

    	// save and create the user
    	$user = User::create([ 
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
		]);

    	// login user
    	auth()->login($user);

    	// redirect to the homepage
    	return redirect()->home();
    }
}
