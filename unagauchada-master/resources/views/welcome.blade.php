<!doctype html>
<html lang="{{ config('app.locale') }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Una Gauchada</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="css/cssPrueba.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: black;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 300;
            }

            .full-height {
                height: 35vh;
            }

            .flex-center {
               
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 300px;
                margin-bottom: 30px;
            }

            .contenedor-gauchadas{
                margin: auto;
                border-color: black;
                border-radius: 2px;
                text-align: center;

            }



        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Perfil</a>
                        <a href="{{ route('indexpublico_gauchada_path') }}">Ver Gauchadas</a>
                    @else
                        <a href="{{ url('/login') }}">Loguearse</a>
                        <a href="{{ url('/register') }}">Registrarse</a>
                           <a href="{{ route('indexpublico_gauchada_path') }}">Ver Gauchadas</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <img src="https://static.tumblr.com/9817bfb93e61ddc7d59e3edfa53f38d7/vhrhomj/Gqbocuj67/tumblr_static_cxyqhzp2ceg44css0kswkckgw_2048_v2.png" alt="Una Gauchada">
                 <form class="navbar-form navbar-left" role="search" action="{{ route('buscar_perfil_path') }}">
                            <input type="text" class="form-control" name='search' placeholder="Buscar usuario" />
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </form>

            </div>
        </div>

    </body>

</html>
