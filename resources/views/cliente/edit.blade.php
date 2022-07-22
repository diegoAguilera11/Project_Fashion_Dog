@extends('layouts.plantilla_clientes')

@section('contenido')
    <div class="container">
        <div class="table-wrapper">

            <div class="table-title">
                <br>
                <div class="row justify-content-between">
                    @if (session('anular'))
                        <div class="text-center">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4>¡La solicitud fue anulada con éxito!</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

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
                        <th>Fecha y Hora Solicitud</th>
                        <th>Estado</th>
                        <th>Estilista</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicituds as $solicitud)
                        <tr>

                            <td>{{ $solicitud->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($solicitud->fecha_solicitud)) }} -
                                {{ date('H:i', strtotime($solicitud->hora_solicitud)) }}</td>
                            <td>{{ $solicitud->estado }}</td>

                            @if ($solicitud->estilista_id)
                                <td class="estilista">{{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                </td>
                            @else
                                <td>-</td>
                            @endif

                            @if ($solicitud->estado == 'INGRESADA')
                                <form class="formularioAnular" method="GET" data-toggle="tooltip" data-placement="top"
                                    title="Anula la Solicitud"
                                    action="{{ route('anularSolicitud', ['id' => $solicitud->id]) }}">
                                    <td>
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Anula la solicitud"><i class="fas fa-check"></i>
                                            <center><img src="images/trash.png" with="20" height="20"
                                                    class="d-inline-block align-text-top"></center>
                                        </button>
                                    </td>
                                </form>
                            @endif
                            @if ($solicitud->estado == 'ATENDIDA A TIEMPO' || $solicitud->estado == 'ATENDIDA CON RETRASO')
                                @if ($solicitud->comentario == '')
                                    <td>
                                        <form method="GET" class="formularioComentario"
                                            action="{{ route('agregar_comentario', ['id' => $solicitud->id]) }}">
                                            <button class="btn btn-success"
                                                data-bs-toggle="modal" data-backdrop="static"
                                                data-bs-target="#ModalComentario-{{ $solicitud->id }}" type="button" data-toggle="tooltip" title="Agrega un comentario a la solicitud."><i></i>
                                                <center><img src="images/comment.png" with="20" height="20"
                                                        class="d-inline-block align-text-top"></center>
                                            </button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalComentario-{{ $solicitud->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Comparte tu
                                                        opinión
                                                        sobre el Servicio de
                                                        <strong
                                                            style="color:#FC623B">{{ App\Models\User::getUserDates($solicitud->estilista_id)->nombre }}</strong>
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea name="comentario" class="text" value="" rows="5" cols="50" minlength="1" maxlength="100"></textarea>
                                                </div>
                                                <div class="modal-footer justify-content-center align-content-center">
                                                    <button type="submit" class="btn btn-success">
                                                        Publicar
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cerrar
                                                        Comentario</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                @else
                                    <td></td>
                                @endif
                            @endif
        </div>
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
    </div>



    </div>

    </div>
    @if ($solicituds->links())
        <div class="d-flex justify-content-center">
            {!! $solicituds->links() !!}
        </div>
    @endif

    <script>
        const formularios = document.getElementsByClassName("formularioComentario");

        for (const form of formularios) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¡RECUERDA QUE SOLO PUEDES COMENTAR UNA VEZ!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        form.submit();
                    }
                })
            })
        }
    </script>



    <script>
        const formulariosPlus = document.getElementsByClassName("formularioAnular");

        for (const form of formulariosPlus) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres anular la solicitud?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        form.submit();
                    }
                })
            })
        }
    </script>
@endsection
