@extends('layouts.plantilla_estilistas')

@section('contenido')
<div class="container">
    <div class="table-wrapper">

        <div class="table-title">
            <br>
            <div class="row justify-content-between">
                <div class="col-sm-4">
                    <h2>Atender <b>Solicitudes</b></h2>
                    <form action="{{ route('BuscarPorFecha') }}">
                        <div class="form-row">
                            <input id="fecha_solicitud" type="date" min="1970-01-01" max="9999-12-31" class="form-control @error('fecha_solicitud') is-invalid @enderror" name="fecha_solicitud" value="{{ old('fecha_solicitud') }}" required autocomplete="fecha_solicitud" autofocus>
                            <div class="col-auto my-2">
                                <input type="submit" class="btn btn-success" value="Buscar">
                                <a href="home" class="btn btn-return"><span>Volver</span></a>
                                <a href="/estilista" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Refresca el Listado de Usuarios"><span>
                                    <center><img src="images/refrescar.png" with="20" height="20" class="d-inline-block align-text-top"></center>
                                    </span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>

                    <th>Nº Solicitud</th>
                    <th>Fecha y Hora Solicitud</th>
                    <th>Estado</th>
                    <th>Ver solicitud</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($solicituds as $solicitud)
                <tr>
                    <td>{{ $solicitud->id}}</td>
                    <td>{{ $solicitud->fecha_solicitud }} - {{ $solicitud->hora_solicitud }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>
                        <form class="formulario" method="GET" data-toggle="tooltip" data-placement="top" action="{{ route('AceptarServicio', ['id' => $solicitud->id]) }}">

                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                <center><img src="images/Solicitud.png" with="20" height="20" class="d-inline-block align-text-top"></center>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay solicitudes</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@if ($solicituds->links())
<div class="d-flex justify-content-center">
    {!! $solicituds->links() !!}
</div>
@endif

@endsection