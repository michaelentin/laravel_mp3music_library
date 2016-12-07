@extends('layout')

@section('content')

	<a href="library">Cancel</a> 

   @foreach ($playlists as $playlist)
      {!! Form::open(['url' => 'addedToPlaylist']) !!}
        {!! Form::hidden('p_id', $playlist->id) !!}
        {!! Form::hidden('s_id', $song->id) !!}
        {!! Form::submit($playlist->pName, array('class' => 'btn btn-primary')) !!}
      {!! Form::close() !!}
   @endforeach

@stop