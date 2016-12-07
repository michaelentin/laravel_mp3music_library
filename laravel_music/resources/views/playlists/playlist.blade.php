@extends('layout')

{{--

TODO: display all songs from this playlist
TODO: write more todo notes

 --}}

 @section('styelize')

 .title
 {
        width: 23%;
        margin: 0% 40%;
        font-size: 40px;
 }

 @stop



@section('header')
<div class="playlistButton">
  <a href="/playlists">View Playlists</a>
</div>
<div class=playlistButton>
    <a href="/library">Back To Library</a>
</div>
<div class="title">
<h1>{{$playlist->pName}} </h1>
</div>

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
        <th>Remove</th>
  	</tr>

    @if ($songs == NULL)

    @else

    	@foreach($songs as $song)
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
                {!! Form::open(['url' => 'removeFromPlaylist']) !!}
                    {!! Form::hidden('s_id', $song->id) !!}
                    {!! Form::hidden('p_id', $playlist->id) !!}
                    {!! Form::submit('Remove', array('class' => 'btn btn-primary')) !!}
                {!! Form::close() !!}
            </td>
      		</tr>
    	@endforeach

    @endif

</table>

@stop
