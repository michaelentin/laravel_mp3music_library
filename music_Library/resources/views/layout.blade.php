<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!--<link rel="stylesheet" type="text/css" href=" {{ elixir('css/app.css') }}"> -->

        <button id="logout" name="logout" style="float: right;">Logout</button>
        @yield('header')
    </head>
    <body>
        @yield('content')

        @yield('footer')
    </body>
</html>