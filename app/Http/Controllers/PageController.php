<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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

	public function account()
	{
		return view('account');
	}

	public function search()
	{
		return view('search');
	}

	public function getTMDBjson(Request $request) {
		$searchString = $request->input('data');
		$reqString = "https://api.themoviedb.org/3/search/movie?api_key=".env("TMD_API_KEY","")."&language=en-US&query=".$searchString."&page=1";
		$json = json_decode(file_get_contents($reqString));
		return response()->json([
			'success' => $json
		]);
	}

	public function saveMovieReview(Request $request) {

		//Models
		$MovDat = Movie_Data();
		$Review = Movie_Review();

		$MovDat->tmdb_id = undefined;
		$MovDat->tmdb_score = undefined;
		$MovDat->title = undefined;
		$MovDat->img_path = undefined;
		$MovDat->release = undefined;
		$MovDat->description = undefined;

		$Review->user_id = undefined; 
		$Review->tmdb_id = undefined;
		$Review->user_score = undefined;
		$Review->review = undefined;
	}
}