<?php

namespace App\Http\Controllers;

use App\User;
use App\userPlaylist;
use Illuminate\Http\Request;

class playlistController extends Controller
{
	//This need to take a playlist ID to decide which playlist to show
    public function index() 
    {
    	$playlists = userPlaylist::all();
	
		return view('playlists/playlist', compact('playlists'));
    }

    public function show(userPlaylist $playlist) 
    {
    	return view('playlists/playlist', compact('playlist'));
    }
}
