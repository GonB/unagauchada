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
                    @else
                        <a href="{{ url('/login') }}">Loguearse</a>
                        <a href="{{ url('/register') }}">Registrarse</a>
                    @endif
                </div>
            @endif

            <div class="content">
            <!--    <div class="title m-b-md verde">UNA GAUCHADA</div>   -->
                <img src="images/imágen_de_fondo.png" alt="Una Gauchada">
          
            </div>
        </div>
             <?php 
               // include "C:/xampp/htdocs/unagauchada/unagauchada-master/resources/views/gauchadas.blade.php";
            ?>

    </body>

</html>
