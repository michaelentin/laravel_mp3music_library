<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Music Library</title>

        <!--<link rel="stylesheet" type="text/css" href=" {{ elixir('css/app.css') }}"> -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="/js/play_music.js"></script>

        <form action="/logout" method="post"><button id="logout" name="logout" type="submit" style="float: right;" class="btn btn-primary" position="fixed top">Logout</button></form>
        
        <style>
        @font-face
        {
            font-family: titleFont;
            src: url('{{asset("fonts/disko/disko.woff")}}');

        }
        @font-face
        {
            font-family: playlistsFont;
            src: url('{{asset("fonts/pokemonfont/PokemonGB.woff")}}');

        }
        #logout
        {
            position: fixed;
            right: 0px;
            top: 0px;
        }
        body
        {
            background-image: url('{{ asset("images/disco.jpg") }}');
            background-color: #cccccc;
            background-position: 30% 0%;
        }
        table, th, td
        {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            font-size: 120%;
            color:white;
        }
        .centered
        {
            width: 50%;
            margin: 0% 40%;
            font-size: 40px;
        }
        .form
        {
            width: 50%;
            margin: 5% 25%;
            color: white;
        }
        .formVals
        {
            width: 50%;
            margin: 0 auto;
            color:white; 
        }
        .textBox
        {
            color:black;
        }

        @yield('styelize')

        </style>

        @yield('header')
    </head>
    <body>
        @yield('content')

        @yield('footer')
    </body>
</html>
