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
                                <a href="/administrarSolicitud" class="btn btn-warning" data-toggle="tooltip" data-placement="top"
                                    title="Refresca el Listado de los clientes"><span>
                                        <center><img src="images/refrescar.png" with="20" height="20"
                                                class="d-inline-block align-text-top"></center>
                                    </span></a>

                            </h2>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ______________________________________________________________Tabla___________________________________________________________ --}}

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th>Nº Solicitud</th>
                        <th>Fecha y Hora Solicitud</th>
                        <th>Estado</th>
                        <th>Estilista</th>
                        <th>Acciones</th> --}}

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
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ $solicitud->fecha_solicitud }} - {{ $solicitud->hora_solicitud }}</td>
                            <td>{{ $solicitud->estado }}</td>

                            @if ($solicitud->estilista_id)
                                <td>{{ App\Models\User::getUserNameById($solicitud->estilista_id) }}</td>
                                <td>

                                </td>
                            @else
                                <td>-</td>
                            @endif

                            @if ($solicitud->estado == 'INGRESADA')
                                <form class="formularioAnular" method="GET" data-toggle="tooltip" data-placement="top"
                                    title="Anula la Solicitud"
                                    action="{{ route('anularSolicitud', ['id' => $solicitud->id]) }}">
                                    <td>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i>
                                            <center><img src="images/trash.png" with="20" height="20"
                                                    class="d-inline-block align-text-top"></center>
                                        </button>
                                    </td>
                                </form>
                            @endif
                            @if ($solicitud->estado == 'ATENDIDA A TIEMPO' || $solicitud->estado == 'ATENDIDA CON RETRASO')
                                @if ($solicitud->comentario == '')
                                    <td>

                                        <form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                            title="Agrega un Comentario"
                                            action="{{ route('agregar_comentario', ['id' => $solicitud->id]) }}">
                                            <input id="comentario" class="comentario" name="comentario" hidden />
                                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                                <center><img src="images/comment.png" with="20" height="20"
                                                        class="d-inline-block align-text-top"></center>
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            @endif
                            @if ($solicitud->estado == 'ANULADA')
                                <td></td>
                            @endif



                        </tr>
                    @empty

                        <tr>
                            <td colspan="6" class="text-center">No hay solicitudes por mostrar</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{-- ______________________________________________________________Tabla___________________________________________________________ --}}
        </div>



    </div>
@endsection
