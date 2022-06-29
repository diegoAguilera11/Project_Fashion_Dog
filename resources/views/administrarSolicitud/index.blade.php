@extends('layouts.plantilla_administrador')


@section('contenido')
    <div class="container">
        <div class="table-wrapper">

            <div class="table-title">
                <br>
                <div class="row justify-content-between">

                    <div class="form-row">
                        <div class="col-auto my-1">
                            <h2>Administrar <b>Solicitudes</b>

                                <a href="home" class="btn btn-return"><span>Volver</span></a>
                                <a href="/administrarSolicitud" class="btn btn-warning" data-toggle="tooltip"
                                    data-placement="top" title="Refresca el Listado de los clientes"><span>
                                        <center><img src="images/refrescar.png" with="20" height="20"
                                                class="d-inline-block align-text-top"></center>
                                    </span></a>

                            </h2>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ______________________________________________________________Tabla1___________________________________________________________ --}}

            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Nº Solicitud</th>
                        <th>Nombre del cliente</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>ver</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitudes as $solicitud)
                        <tr>
                            {{-- Borrar --}}
                            {{-- @if ($solicitud->id == 0)
                            <td colspan="6" class="text-center">No hay solicitudes por mostrar</td>
                            @endif --}}

                            <td>{{ $solicitud->id }}</td>

                            <td>{{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}</td>

                            <td>{{ $solicitud->fecha_solicitud }} • {{ $solicitud->hora_solicitud }}</td>

                            <td>{{ $solicitud->estado }}</td>

                            {{-- Nombre del Estilista --}}
                            {{-- @if ($solicitud->estilista_id)
                                <td>{{ App\Models\User::getUserNameById($solicitud->estilista_id) }}</td>
                            @else
                                <td>-</td>
                            @endif --}}


                            <td>
                                <form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                    title="Desplegar todos los campos de la solicitud"
                                    {{--action="{{ route('desplegar_Contenido', ['id' => $solicitud->id]) }}">--}}
                                    action="{{ route('agregar_comentario', ['id' => $solicitud->id]) }}">

                                    <input id="comentario" class="comentario" name="comentario" hidden />

                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                        <center><img src="images/search.png" with="20" height="20"
                                                class="d-inline-block align-text-top"> </center>

                                    </button>
                                </form>
                            </td>

                            <td>



                            </td>


                        </tr>
                    @empty

                        <tr>
                            <td colspan="6" class="text-center">No hay solicitudes por mostrar</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>


        </div>



    </div>
@endsection
