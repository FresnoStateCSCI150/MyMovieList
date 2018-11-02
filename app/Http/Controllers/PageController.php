<?php

namespace App\Http\Controllers;

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
}