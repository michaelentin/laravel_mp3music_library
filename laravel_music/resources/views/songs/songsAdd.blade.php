@extends('layout')

@section('header')

<a href="/library">Cancel</a>

@stop

@section('content')

<div class="form">

<h1 class="formVals">Add A New Song</h1>
<br>

{!! Form::open(['url' => 'library', 'files' => true]) !!}
    <div class="formVals">
    {!! Form::label('title', 'Title:') !!}
    <div class="textBox">
    {!! Form::text('title', null, ["size" => "47"]) !!}
    </div>
    <hr>
    {!! Form::label('artist', 'Artist:') !!}
    <div class="textBox">
    {!! Form::text('artist', null, ["size" => "47"]) !!}
    </div>
    <hr>
    {!! Form::label('album', 'Album:') !!}
    <div class="textBox">
    {!! Form::text('album', null, ["size" => "47"]) !!}
    </div>
    <hr>
    {!! Form::label('mp3', 'mp3') !!}
    {!! Form::file('mp3') !!}
    <hr>
    {!! Form::submit('Add song', array('class' => 'btn btn-primary')) !!}
    </div>
{!! Form::close() !!}

</div>
@stop