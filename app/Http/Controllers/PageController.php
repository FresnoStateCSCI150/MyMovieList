<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
	public function home()
	{
		return view('home');
	}
	
	public function about()
	{
		return view('about');
	}

	public function forgot()
	{
		return view('forgot');
	}

	/* For now to see a friends list you have to manually populate the users and user_friend tables 
	   using a tool like MySQL Workbench. I will implement friend requests when have user login/
	   authentification setup.
	*/
	public function friends()
	{
		// This assumes you have manually inserted a user with id 23.
		$user = \App\User::find(23); // When we have authentication set up, use Auth::user() instead.
		$userFriends = $user->friends()->get();

		return view('friends', compact('userFriends'));
	}
}