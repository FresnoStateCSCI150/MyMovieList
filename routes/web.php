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
    return view('welcome');
});

Route::get('about', function() {
    
    // about page

	return view('about');
});

Route::get('login', function() {
    
    // login page

	return view('login');
});

Route::get('register', function() {
    
    // register page

	return view('register');
});

Route::get('discussion', 'PostsController@index');
Route::get('discussion/{post}', 'PostsController@show');