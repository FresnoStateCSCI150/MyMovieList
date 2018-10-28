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
})->name('home');

Route::get('about','PageController@about');

Route::get('login', 'PageController@login');

Route::get('register', 'PageController@register');

Route::get('discussion', 'PostsController@index');
Route::get('discussion/{post}', 'PostsController@show');

Route::get('friends', 'PageController@friends');