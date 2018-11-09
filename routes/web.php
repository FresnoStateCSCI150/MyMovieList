<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('about','PageController@about');
Route::get('discussion', 'PostsController@index');
Route::get('discussion/{post}', 'PostsController@show');
Route::get('discussion/create', 'PostsController@create');
Route::get('account','PageController@account');

// Search get and post methods
Route::get('search', 'PageController@search');
Route::post('TMBD', 'PageController@getTMDBjson');

// Login and Register
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
