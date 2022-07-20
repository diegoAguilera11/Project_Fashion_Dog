@extends('layouts.app')

@section('content')
    <div class="container">

        <body class style="background-color: #ffffff">
            <div class="row justify-content-center ">
                @if (session('exito'))
                    <div class="col-md-8 col-centered">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="text-center">
                                <h4>¡La solicitud fue ingresada con éxito!</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('atender'))
                    <div class="col-md-8 col-centered">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="text-center">
                                <h4> ¡La solicitud fue atendida con éxito!</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
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


                                    <a href="/cliente/create" style="margin-right: 20px" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="En esta opción puedes solicitar un servicio a domicilio en la fecha que estimes conveniente.">Solicitar servicio a domicilio</a>
                                    <a href="/cliente" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="En esta opción puedes ver el estado de todas tus solicitudes realizadas en Fashion Dog.">Administrar solicitud/es</a>
                                </center>
                            @endif
                            @if (Auth::user()->rol == 'estilista')
                                <a href="/estilista">
                                </a>
                                <center>
                                    <h1>Bienvenido Estilista {{ Auth::user()->nombre }}</h1>


                                    <a href="/estilista" style="margin-right: 20px" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="En esta opción puedes ver las solicitudes ingresadas por los clientes de Fashion Dog.">Ver
                                        solicitudes</a>
                                    <a href="/estilista-administrar-solicitudes" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="En esta opción puedes ver el detalle de todas tus solicitudes atendidas.">Administrar
                                        solicitud/es</a>

                                </center>
                            @endif
                            @if (Auth::user()->rol == 'administrador')
                                <center>
                                    <h1>Bienvenido Administrador {{ Auth::user()->nombre }}</h1>
                                    <br>

                                    <a href="/administrador" style="margin-right: 20px" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="En esta opción puedes registrar y editar los datos de los estilistas de Fashion Dog.">Administrar estilistas</a>
                                    <a href="/usuario" style="margin-right: 20px" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="En esta opción puedes habilitar/deshabilitar a los clientes y estilistas registrados en Fashion Dog.">Deshabilitar y/o habilitar usuario</a>
                                    <a href="/administrarSolicitud"  class="btn btn-success" data-toggle="tooltip"
                                    data-placement="top" title="En esta opción puedes administrar todas las solicitudes realizadas en Fashion Dog.">Administrar solicitud/es</a>

                                <center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
@endsection
