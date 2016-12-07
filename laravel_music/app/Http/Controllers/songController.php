<?php

namespace App\Http\Controllers;

use App\User;
use App\Song;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Storage;
use File;
use Response;
use App\Playlist;

class songController extends Controller
{
    public function getSongs() 
    {	
    	$songs = Song::all();

        $user = Auth::user();

        // $users[] = null;

        // foreach ($songs as $song) {
        //     $
        // }

    	return view('library/library', compact('songs', 'user'));
    }

    public function listen(Song $song) 
    {
        $path = public_path() . '/mp3s/' . $song->mp3Name;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function showForm() 
    {
        return view('songs/songsAdd');
    }

    public function addToPlaylist(Request $request)
    {
        $song = Song::find($request->id);

        $user = Auth::user();

        $playlists = Playlist::where('user_id', $user->id)->get();

        return view('playlists/editPlaylist', compact('song', 'playlists'));
    }

    public function addSong(Request $request) 
    {

        $id = Auth::id();

        //validate form data
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'artist' => 'required',
            'album' => 'required',
            'mp3' => 'required',
        ]);

        $File = $request->File('mp3');

        $getID3 = new \getID3;

        $ThisFileInfo = $getID3->analyze($File);

        //dd($ThisFileInfo);

        //validate mp3
        if ($validator->fails() || 
            !($ThisFileInfo["mime_type"] == "audio/mpeg" 
                || $ThisFileInfo["mime_type"] == "audio/x-wav"
                || $ThisFileInfo["mime_type"] == "audio/mp4")) {
            return back()->withErrors($validator)->withInput();
        }

        $play_time = $ThisFileInfo['playtime_string'];

        $newSong = new Song;

        //create song in DB
        $newSong->title = $request->title;
        $newSong->artist = $request->artist;
        $newSong->album = $request->album;
        $newSong->user_id = $id;
        $newSong->length = $play_time;
        $newSong->mp3Name = "";
        $newSong->save();

        //Make song have correct mp3 file destination
        Storage::disk('mp3s')->put($newSong->id, $File);
        $newSong->mp3Name = Storage::disk('mp3s')->Files($newSong->id)[0];
        $newSong->save();

        return songController::getSongs();
    }
}
