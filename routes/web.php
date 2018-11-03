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

// Register
Route::get('register', 'RegistrationController@create'); // send to register page
Route::post('register', 'RegistrationController@store'); // store user info

// Login
Route::get('login', 'SessionsController@create'); // send to login page
Route::post('login', 'SessionsController@store'); // store user info
Route::get('logout', 'SessionsController@destroy'); // logout user

/*Route::get('forgot', 'PageController@forgot'); */



Route::get('discussion', 'PostsController@index');
Route::get('discussion/{post}', 'PostsController@show');
Route::get('discussion/create', 'PostsController@create');


Route::get('friends', 'PageController@friends');
