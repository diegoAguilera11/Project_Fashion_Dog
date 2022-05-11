<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Fashion Dog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fashion Dog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" style="background-color: #ffffff">

        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #FC623B">

            <div style="height: 50px; background-color: #FC623B"></div>
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <img src="images/logo_FashionDog.png" alt="" width="60" height="60"
                            class="d-inline-block align-text-top">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <a class="nav-link" href="/" style="color:#ffffff">Inicio</a>
                                            </div>
                                            <div class="col-sm">
                                                <a class="nav-link" href="/register"
                                                    style="color:#ffffff">Registrar</a>
                                            </div>
                                        </div>
                                    </div>


                                </li>
                            @endif
                        @else

                        <li class="nav-item dropdown">
                            @if (Auth::user()->estado == 'habilitado')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    style="color:#ffffff;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }}
                                    <!-- Muestra rut apartado superior derecho-->
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!-- Cambiar Rutas Para "Cambiar Contraseña"-->
                                    <a class="dropdown-item" href=" {{ route('NewPassword') }} " onclick="event.preventDefault();

                                                    style=" color:#707070">Cambiar Contraseña</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                </div>
                            @else
                                </a>
                                <a class="dropdown-item" style="color:#ffffff" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Cambiar Rutas Para "Cambiar Contraseña"-->
                                <a class="dropdown-item" href="{{-- {{ route('NewPassword') }} --}}" onclick="event.preventDefault();
                                                                    ">
                                    {{ __('Cambiar Contraseña') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
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
