@extends('layouts.plantilla_administrador')

@section('contenido')

    <body class style="background-color: #ffffff">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Panel de control') }}</div>

                    <div class="card-body">
                        <center>
                        <a href="/create" class="btn btn-success">Registrar Estilistas</a>
                        <a href="adminitrador/create" class="btn btn-success">Editar Estilistas</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
