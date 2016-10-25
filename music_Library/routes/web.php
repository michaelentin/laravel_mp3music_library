<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
TODO: make controllers, pass in as second parameter to function
TODO: make a playlist/{{playlistid}} route
*/
Route::get('songs/add', function () {
	return view('songs/songsAdd');
});

//This url will be used for showing songs a user wants to add to a playlist
Route::get('songs/view', function () {
	return view('songs/songsView');
});

//This url will be used for showing all songs on the db, be able to play them. serves as home.
Route::get('library', function () {
	return view('library/library');
});

Route::get('playlist', 'playlistController@index');

Route::get('playlist/{playlist}', 'playlistController@show');