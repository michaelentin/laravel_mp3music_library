@extends ('loginLayout')

@section('header')

<h1>An mp3 sharing experience</h1>

<meta name="csrf-token" content="{{ csrf_token() }}">

@stop

@section('content')

<form id="loginForm" name="loginForm" style="width: 250px" method="POST" action="login" value="{{ csrf_token() }}">
{{ csrf_field() }}
    <fieldset>
        <legend>Login</legend>
        <p>
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control">
        </p>
        <hr>
        <p>
            <input type="submit" value="Submit" class="btn btn-primary">
            <input type="reset" id="reset" class="btn" value="Reset">
            <a href="register" class="btn btn-default" role="button">Register</a>
        </p>
    </fieldset>
</form>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@stop
