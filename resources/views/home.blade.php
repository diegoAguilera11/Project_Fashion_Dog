@extends('layouts.app')

@section('content')
    <div class="container">

        <body class style="background-color: #ffffff">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-black" style="background-color: #FFDACC;">
                            <strong>{{ __('Inicio sesión correctamente') }}</strong>
                        </div>

                        <div class="card-body">
                            @if (Auth::user()->rol == 'cliente')
                                <a href="/cliente">
                                </a>
                                <center>
                                    <h1>Bienvenido Cliente {{ Auth::user()->nombre }}</h1>


                                    <a href="/cliente/create" class="btn btn-success">Solicitar servicio a domicilio</a>
                                    <a href="/cliente" class="btn btn-success">Administrar solicitud/es</a>
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
                                    <br>

                                    <a href="/administrador" style="margin-right: 20px" class="btn btn-success">Administrar Estilistas</a>
                                    <a href="/usuario" class="btn btn-success">Deshabilitar y/o Habilitar Usuario</a>

                                    <a href="/administrarSolicitud"  class="btn btn-success">Administrar solicitud/es</a>

                                <center>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
@endsection
