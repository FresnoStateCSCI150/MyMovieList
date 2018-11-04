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
}