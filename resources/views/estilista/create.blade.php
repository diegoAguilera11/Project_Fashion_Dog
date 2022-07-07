@extends('layouts.plantilla_estilistas')

@section('contenido')
<div class="container">
    <div class="table-wrapper">

        <div class="table-title">

            <br>
            <div class="row justify-content-between">

                <div class="col-sm-4">
                    <h2>Administrar <b>Solicitudes</b></h2>
                </div>


                <div class="col-sm-1">
                    <a href="/home" class="btn btn-danger" data-toggle="modal"><span>Volver</span></a>
                </div>

            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nº Solicitud</th>
                    <th>Fecha y Hora Solicitud</th>
                    <th>Estado</th>
                    <th>Ver Cliente</th>
                    <th>Atender Solicitud</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
