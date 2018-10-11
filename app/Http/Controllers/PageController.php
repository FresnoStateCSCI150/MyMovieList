<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
	public function welcome()
	{
		return view('welcome');
	}
	
	public function about()
	{
		return view('about');
	}

	public function login()
	{
		return view('login');
	}

	public function register()
	{
		return view('register');
	}

	public function forgot()
	{
		return view('forgot');
	}
}