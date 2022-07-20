@extends('layouts.plantilla_estilistas')

@section('contenido')

    <style>

        .break-all {
            word-break: break-all;
        }
        </style>

    <div class="container">

        <div class="table-wrapper">

            <div class="table-title">
                <br>
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h2>Administrar <b>Solicitudes</b>
                            <a href="/home" class="btn btn-return"><span>Volver</span></a>
                        </h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nº Solicitud</th>
                        <th>Fecha y hora solicitud</th>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Comentario</th>
                        <th>Ver comentario</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($solicituds as $solicitud)
                        <tr>

                            <td>{{ $solicitud->id }}</td>
                            <td>{{ date('d-m-Y', strtotime($solicitud->fecha_solicitud)) }} -
                                {{ date('H:i', strtotime($solicitud->hora_solicitud)) }}</td>

                            @if ($solicitud->cliente_id)
                                <td>{{ App\Models\User::getUserNameById($solicitud->cliente_id) }}</td>

                                <td>{{ App\Models\User::getUserDireccionById($solicitud->cliente_id) }}</td>

                                @if (strlen($solicitud->comentario) > 30)
                                    <td>{{ Str::substr($solicitud->comentario, 0, 30) }}...</td>
                                    <td> <button type="button"
                                        class=" ml-1 btn btn-success"
                                        data-bs-toggle="modal" data-backdrop="static"
                                        data-bs-target="#Modal-{{ $solicitud->id }}" data-toggle="tooltip" title="Ver comentario completo del cliente.">
                                        <center><img src="images/comment.png" with="20" height="20"
                                                class="d-inline-block align-text-top" tool ></center>
                                    </button></td>
                                @else
                                    <td>{{ Str::substr($solicitud->comentario, 0, 30) }}
                                    </td>
                                    <td> </td>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="Modal-{{ $solicitud->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Comentario del cliente
                                                    <strong
                                                        style="color:#FC623B">{{ App\Models\User::getUserDates($solicitud->cliente_id)->nombre }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="break-all">
                                                {{ $solicitud->comentario }}
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center align-content-center">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar
                                                    comentario</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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

    </div>
    @if ($solicituds->links())
        <div class="d-flex justify-content-center">
            {!! $solicituds->links() !!}
        </div>
    @endif
@endsection
