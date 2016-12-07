<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!--<link rel="stylesheet" type="text/css" href=" {{ elixir('css/app.css') }}"> -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>
            @font-face
            {
                font-family: titleFont;
                src: url('{{asset("fonts/alphabeta/alphbeta.woff")}}');

            }
            body
            {
                background-image: url('{{ asset("images/musicbars.jpg") }}');
                background-color: #cccccc;
                background-position: 30% 0%;
            }
            legend
            {
                color: white;
                font-family: titleFont;
            }
            label
            {
                color: white;
                font-family: titleFont;
            }
            h1
            {
                color:white;
                text-align: center;
                font-family: titleFont;
                font-size: 500%;
            }
            input
            {
                font-family: titleFont;
            }
            a
            {
                font-family: titleFont;
            }
            .btn-default, .btn-default:hover, .btn-default:focus, .btn-default:active{
              background-color: #c0c0c0;
              border-color: #c0c0c0;
            }

        </style>



        @yield('header')
    </head>
    <body>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-5">
                @yield('content')
            </div>
        </div>

        @yield('footer')
    </body>
</html>
