<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie_Data;
use App\Movie_Review;

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

		$validatedData = $request->validate([
        	'user_id' => 'required|unique:posts'
    	]);

		//Models
		$Review = Movie_Review();

		$Review->user_id = $request->user_id; 
		$Review->tmdb_id = $request->tmdb_id;
		$Review->user_score = $request->user_score;
		$Review->review = $request->user_review;

		//If successful return sucess!
		if($Review->save()) {
			return response()->json([
				'success' => 'success'
			]);
		}
	}

	public function saveMovieData(Request $request){
		
		$this->validate($request, [
			'tmdb_id' => 'required|unique:movie_data'
		]);
		try {        
			//process data and submit
			$MovDat = new Movie_Data;
			$MovDat->tmdb_id = $request->input('tmdb_id');
			$MovDat->tmdb_score = $request->input('tmdb_score');
			$MovDat->title = $request->input('title');
			$MovDat->img_path = $request->input('img_path');
			$MovDat->release = $request->input('release');
			$MovDat->description = $request->input('description');
			//If successful return sucess!
			$MovDat->save();
			return response()->json([
				'all' => $MovDat,
			]);

		} 
		catch(\Exception $e) {
				return response()->json([
				'err' => $e->getMessage(),
			]);
		}
	}
}