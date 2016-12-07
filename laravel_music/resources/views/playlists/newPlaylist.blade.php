@extends('layout')

@section('styelize')

.header
{
	color: white;
	width: 65%;
	margin: 0% 23%;
}

@stop

@section('header')

<a href="/library" class="link">Cancel</a>

@stop

@section('content')

<h1 class="header">This May Be The Most Important Decision You Will Ever Make, Choose Your Playlist Name Wisely</h1>

<div class="form">

{!! Form::open(['url' => 'playlists']) !!}
<div class="formVals">
    {!! Form::label('name', 'Name:') !!}
    <div class="textBox">
    {!! Form::text('name', null, ["size" => "40"]) !!}
    </div>
    <br>
    {!! Form::submit('Create Playlist', array('class' => 'btn btn-primary')) !!}
    </div>

{!! Form::close() !!}

   </div>

@stop