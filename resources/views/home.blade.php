@extends('layouts.app')

@section('content')



    <div class="container">

        <body class style="background-color: #ffffff">
            @if (Auth::user()->estado == 'habilitado')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-black" style="background-color: #FFDACC;">
                                {{ __('Inicio sesión correctamente') }}</div>

                            <div class="card-body">
                                @if (Auth::user()->rol == 'cliente')
                                    <a href="/cliente">
                                    </a>
                                    <center>
                                        <h1>Bienvenido Cliente {{ Auth::user()->nombre }}</h1>
                                    </center>
                                @endif
                                @if (Auth::user()->rol == 'estilista')
                                    <a href="/estilista">
                                    </a>
                                    <center>
                                        <h1>Bienvenido Estilista {{ Auth::user()->nombre }}</h1>
                                    </center>
                                @endif
                                @if (Auth::user()->rol == 'administrador')
                                    <center>
                                        <h1>Bienvenido Administrador {{ Auth::user()->nombre }}</h1>

                                        <a href="/administrador" class="btn btn-success">Administrar Estilistas</a>
                                    </center>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-black" style="background-color:#FFDACC;">
                                {{ __('No se pudo iniciar sesión') }}</div>

                            <div class="card-body">
                                <center>
                                    <h1>Usuario deshabilitado. Contacte al administrador</h1>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </body>
    </div>
@endsection
