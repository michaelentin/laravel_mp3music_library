@extends('layout')

@section('styelize')

.playlists
{
	width: 60%;
    margin: 0% 20%;
    font-size: 40px;
}
a
{
	color: white;
	font-family: playlistsFont;
}
a:hover
{
	color: grey;
}
h1
{
	margin: 0% 33%;
	width: 50%;
}

@stop

@section('header')

<a href="library">Back To Library</a>

@stop

@section('content')

<h1>These Are Your Playlists</h1>

<div class="playlists">

@foreach($playlists as $playlist)
	<div>
		<a href="playlist/{{$playlist->id}}" class="links">{{$playlist->pName}}</a>
	</div>
@endforeach

</div>

@stop