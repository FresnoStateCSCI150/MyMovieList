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
<<<<<<< HEAD
=======
>>>>>>> master
Route::get('discussion', 'PostsController@index');
Route::get('discussion/{post}', 'PostsController@show');
Route::get('discussion/create', 'PostsController@create');
Route::get('account','PageController@account');

// Search get and post methods
Route::get('search', 'PageController@search');
Route::post('TMBD', 'PageController@getTMDBjson');

<<<<<<< HEAD
// Login and Register
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======

// Friends functionality
Route::get('friends', 'FriendsController@friends')->middleware('auth')->name('friends');
Route::post('friends/request', 'FriendsController@createFriendRequest')->middleware('auth');
Route::post('friends/create', 'FriendsController@createFriendship');
Route::post('friends/decline', 'FriendsController@declineFriendship');
Route::post('friends/delete', 'FriendsController@deleteFriendship');
>>>>>>> master
