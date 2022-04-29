@extends('layouts.plantilla_administrador')

@section('contenido')

    <body class style="background-color: #ffffff">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Seleccione una accion:') }}</div>

                    <div class="card-body">
                        <center>

                        <a href="/estilista/create" class="btn btn-success">Registrar Estilistas</a>
                        <a href="/cliente/create" class="btn btn-success">Editar Estilistas</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
