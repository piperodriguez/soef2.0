<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="Infinitude Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <title>{{ config('app.name', 'SOEF') }}</title>
      <script>
         addEventListener("load", function() {
             setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
             window.scrollTo(0, 1);
         }
      </script>
      <link rel="stylesheet" type="text/css" href="{{ asset('css/template/bootstrap.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/librerias/toastr.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/librerias/webfonts/fontawesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/template/style.css') }}" type="text/css" media="all" />
      <script src="{{ asset('js/librerias/jquery-3.4.1.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/librerias/toastr.min.js') }}"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
   </head>
   <body>
      <div id="home">
         <!--/top-nav -->
         <div class="top_w3pvt_main container">
            <!--/header -->
            <header class="nav_w3pvt text-center ">
               <!-- nav -->
               <nav class="wthree-w3ls">
                  <div id="logo">
                     <h1>
                        <a class="navbar-brand px-0 mx-0" href="{{ url('/') }}">
                            <span style="font-size: 35px;">{{ config('app.name', 'SOEF') }}</span>
                        </a>
                     </h1>
                  </div>
                  <label for="drop" class="toggle">Menu</label>
                  <input type="checkbox" id="drop" />
                  <ul class="menu mr-auto">
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
                     <li class="nav-itme">
                        <a  class="nav-link" href="{{ route('home') }}"><i class="fas fa-briefcase"></i> Publica tu Oferta</a>
                     </li>
                     <li class="nav-itme">
                        <a  class="nav-link" href="{{ route('hj') }}"><i class="fas fa-address-card"></i> Hoja de Vida </a>
                     </li>
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
                        <a  class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
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
               </nav>
               <!-- //nav -->
            </header>
            <!--//header -->
         </div>
         <!-- //top-nav -->
      </div>
      <!-- //banner -->
      <!-- //home -->
      <main class="py-4">
         @yield('content')
      </main>

      <div class="copy_right p-3 d-flex">
         <div class="container">
            <div class="row d-flex">
               <div class="col-lg-9 copy_w3pvt">
                  <p class="text-lg-left text-center">© 2019 Infinitude. All rights reserved | Design by
                     <a href="http://w3layouts.com/" target="_blank">Frodrigues Developer WEB</a>
                  </p>
               </div>
               <!-- move top -->
               <div class="col-lg-3 move-top text-lg-right text-center">
                  <a href="#home" class="move-top">
                  <span class="fa fa-angle-double-up mt-3" aria-hidden="true"></span>
                  </a>
               </div>
               <!-- move top -->
            </div>
         </div>
      </div>
      <!-- //copyright -->
   </body>
</html>
