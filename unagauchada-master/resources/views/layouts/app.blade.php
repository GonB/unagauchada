<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Una gauchada</title>
    <link rel="shortcut icon" href="https://68.media.tumblr.com/avatar_28012e5b8492_128.png">
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="css/cssPrincipal.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Una Gauchada</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    

                    <!-- Branding Image -->
                    <a href="{{ url('/') }}">
                        <img src="https://68.media.tumblr.com/avatar_28012e5b8492_128.png" WIDTH=52 HEIGHT=52>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <form class="navbar-form navbar-left" method="GET" action="{{ route('buscar_perfil_path') }}">
                             <div class="form-group">
                             <input type="text" name="nick" class="form-control" placeholder="Buscar Usuario" aria-describedby="search"></input>
                            <button type="submit" class="btn btn-default">Buscar</button>
                            </div>
                        </form>
       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                          
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Loguearse</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            @if (Auth::user()->admin)
                                <li><a href="{{ route('index_admin_path') }}">Administrar</a></li>
                            @endif
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('indexpublico_gauchada_path') }}">Ver Gauchadas</a></li>

                            @if (Auth::user()->credits > 200)
                                <li><a>Usuario Premium</a></li>
                            @else
                                <li><a>Mis Creditos: {{ Auth::user()->credits }}</a></li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative; padding-left: 50px;">
                                    <img src="/imagenes/usuarios/{{ (Auth::user()->imagen) }}" style="width: 32px;border-radius: 50%;position: absolute; top: 10px; left: 10px;">{{ Auth::user()->nick }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('perfil_index_path') }}"
                                            onclick="event.preventDefault();
                                                    .submit();">
                                            Ver Perfil
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>

                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>