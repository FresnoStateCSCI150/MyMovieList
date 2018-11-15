<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Movie_Data;
use App\Movie_Review;
use Validator;

class PageController extends Controller
{
	public function home()
	{
		$reviews = Movie_Review::all();
		return view('home')->with('reviews', $reviews);
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

		$validatedData = Validator::make($request->all(), [
			'user_id' => 'required|unique:movie_reviews,user_id,NULL,id,tmdb_id,'.$request->tmdb_id,
			'tmdb_id' => 'required|unique:movie_reviews,tmdb_id,NULL,id,user_id,'.$request->user_id,
		]);

		if ($validatedData->fails()) {
			return response()->json([
				'exists' => 'You already have a review for this movie!',
			]);
		}

		try {
			//Models
			$Review = new Movie_Review;

			$Review->user_id = $request->user_id; 
			$Review->tmdb_id = $request->tmdb_id;
			$Review->user_score = $request->user_score;
			$Review->review = $request->user_review;	
			if($Review->save()) {
				return response()->json([
					'success' => 'Review saved!'
				]);
			}	
		} 
		catch(\Exception $e) {
			return response()->json([
				'err' => $e->getMessage(),
			]);
		}
	}

	public function saveMovieData(Request $request){
		
		$validatedData = Validator::make($request->all(), [
			'tmdb_id' => 'required|unique:movie_data'
		]);

		if ($validatedData->fails()) {
			return response()->json([
				'Exists' => 'Data already exists in database',
			]);
		}

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
				'success' => 'success',
			]);

		} 
		catch(\Exception $e) {
				return response()->json([
				'err' => $e->getMessage(),
			]);
		}
	}
}