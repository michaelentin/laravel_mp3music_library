@extends('layout')

{{--

TODO: display all of the songs
TODO: be able to play all of the songs (use html audio to )
TODO: add button to submit which songs will be added to a playlist
TODO: send ids of all songs to a controller which adds those songs to the database

 --}}

@section('styelize')
  h1
  {
      color:white;
      text-align: center;
      font-family: titleFont;
      font-size: 500%;
  }
  body
  {
      background-image: url('{{ asset("images/disco.jpg") }}');
      background-color: #cccccc;
      background-position: 30% 0%;
  }
  .playlistButton
  {
      text-align:center;
      margin:auto;
  }

@stop

@section('header')

<table style="width: 20%">
  <tr>
    <th><a href="newPlaylist">New Playlist</a></th>
  </tr>
  <tr>
    <th><a href="playlists">View Playlists</a></th>
  </tr>
  <tr>
    <th><a href="songs/add">Add A Song</a></th>
  </tr>
</table>


<h1>Welcome, {{$user->username}}, to the world music playing center</h1>

@stop

@section('content')

<div class="centered">
<audio id="music_player" controls>
  <source src="" type="audio/mpeg" id="music_source">
</audio>
</div>

<table style="width: 100%">
	 <tr>
	 	  <th>Play</th>
    	<th>Title</th>
    	<th>Artist</th>
    	<th>Album</th>
    	<th>Length</th>
    	<th>Add to Playlist</th>
  	</tr>

  	@foreach ($songs as $song)
   	<tr>
   		<td>
        <button id="song_{{$song->id}}" class="btn btn-primary">Play</button>
        <script>
          var play = document.getElementById("song_{{$song->id}}");
          play.onclick = function(){
            set_song("/mp3s/{{$song->mp3Name}}");
          };
        </script>
      </td>
    	<td>{{$song->title}}</td>
    	<td>{{$song->artist}}</td>
    	<td>{{$song->album}}</td>
    	<td>{{$song->length}}</td>
    	<td>
      {!! Form::open(['url' => 'addToPlaylist']) !!}
        {!! Form::hidden('id', $song->id) !!}
        {!! Form::submit('Add to playlist', array('class' => 'btn btn-primary')) !!}
      {!! Form::close() !!}
      </td>
  	</tr>
	@endforeach

</table>

@stop
