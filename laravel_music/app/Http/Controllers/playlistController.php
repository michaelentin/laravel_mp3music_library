<?php

namespace App\Http\Controllers;

use App\User;
use App\Song;
use App\Psong;
use App\Playlist;
use Illuminate\Http\Request;
use Auth;

class playlistController extends Controller
{
    //used to show a user's playlists
    public function index() 
    {
        $user = Auth::user();

    	$playlists = Playlist::where('user_id', $user->id)->get();
	
		return view('playlists/playlists', compact('playlists'));
    }

    //used to show songs in a user's playlist
    public function show(Playlist $playlist) 
    {
    	$playlistSongs = Playlist::find($playlist->id)->psongs;
        $songs = null;
    	foreach ($playlistSongs as $psong) {
    		$songs[] = Song::find($psong->song_id);
    		$addedOn[] = $psong->created_at;
    	}
    	return view('playlists/playlist', compact(['playlist', 'songs', 'addedOn']));
    }

    public function create() 
    {
        return view('playlists/newPlaylist');
    }

    public function addPlaylist(Request $request) 
    {
        $playlist = new Playlist;

        $user = Auth::user();

        $playlist->pName = $request->name;
        $playlist->user_id = $user->id;
        $playlist->psong_id = 0;
        $playlist->save();

        return playlistController::show($playlist);
    }

    public function removeFromPlaylist(Request $request) 
    {
        $psongs = Psong::where('playlist_id', $request->p_id);
        $psong = $psongs->where('song_id', $request->s_id);

        $psong->delete();

        $playlist = Playlist::find($request->p_id);

        return playlistController::show($playlist);
    }

    public function addToPlaylist(Request $request) 
    {
        $psong = new Psong;
        $psong->playlist_id = $request->p_id;
        $psong->song_id = $request->s_id;
        $psong->save();

        $playlist = Playlist::find($request->p_id);

        return playlistController::show($playlist);
    }
}
