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

Route::get('/', 'HomeController@show_login');

Route::get('library', 'songController@getSongs')->middleware('auth');

/*
TODO: make controllers, pass in as second parameter to function
TODO: make a playlist/{{playlistid}} route
*/
Route::get('songs/add', 'songController@showForm')->middleware('auth');

Route::post('library', 'songController@addSong')->middleware('auth');

Route::post('playlists', 'playlistController@addPlaylist')->middleware('auth');

Route::post('addToPlaylist', 'songController@addToPlaylist')->middleware('auth');

Route::post('addedToPlaylist', 'playlistController@addToPlaylist')->middleware('auth');

Route::post('removeFromPlaylist', 'playlistController@removeFromPlaylist')->middleware('auth');

Route::get('playlists', 'playlistController@index')->middleware('auth');

Route::get('newPlaylist', 'playlistController@create')->middleware('auth');

Route::get('playlist/{playlist}', 'playlistController@show')->middleware('auth');

Route::get('songs/{song}', 'songController@listen')->middleware('auth');

//login stuff
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('register', 'HomeController@show_register');
Route::post('register', 'Auth\RegisterController@register');
