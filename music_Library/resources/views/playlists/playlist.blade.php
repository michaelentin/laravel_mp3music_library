@extends('layout')

{{-- 	

TODO: display all songs from this playlist
TODO: write more todo notes

 --}}

@section('header')

<h1>This is userPlaylist {{$playlist->id}} it has a user id of {{$playlist->user_id}} and a playlist id of {{$playlist->playlist_id}} </h1>

@stop