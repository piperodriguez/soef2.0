<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOEF') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/librerias/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/librerias/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/librerias/webfonts/fontawesome.min.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/librerias/jquery-3.4.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/librerias/toastr.min.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bgSoefNav shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <span style="font-size: 35px;">{{ config('app.name', 'SOEF') }}</span>
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li lass="nav-item">
                                <a class="nav-link" href="#feature">¿Que somos?</a>
                            </li>
                            <li lass="nav-item">
                                <a class="nav-link" href="#portfolio">Servicios</a>
                            </li>
                            <li lass="nav-item">
                                <a class="nav-link" href="#contact">Contáctenos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            @switch(Auth::user()->roles[0]["name"] )
                                @case('admin')
                                    <li class="nav-itme dropdown">
                                        <a  class="nav-link" href="{{ route('servicios') }}"><i class="fas fa-cogs"></i> Mantenimiento</a>
                                    </li>
                                    @break
                                @case('user')

                                    @break
                            @endswitch
                            <li class="nav-itme dropdown">
                                <a  class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="rounded-circle" style="width: 35px; height: 35px;" src="/storage/avatars/{{ Auth::user()->avatar }}"/>
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        Mi Cuenta
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>
</html>
