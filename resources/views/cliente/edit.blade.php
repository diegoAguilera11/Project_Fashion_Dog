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
                                        <button type="button" title="Agrega un Comentario" class="btn btn-success"
                                            data-toggle="modal" data-backdrop="static"
                                            data-target="#ModalComentario-{{ $solicitud->id }}">
                                            <center><img src="images/comment.png" with="20" height="20"
                                                    class="d-inline-block align-text-top"></center>
                                        </button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalComentario-{{ $solicitud->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="GET"
                                                    action="{{ route('agregar_comentario', ['id' => $solicitud->id]) }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Comparte tu
                                                            opinión
                                                            sobre el Servicio de
                                                            {{ App\Models\User::getUserDates($solicitud->estilista_id)->nombre }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea name="comentario" class="text" value="" rows="5" cols="50"
                                                            placeholder=" RECUERDA QUE EL COMENTARIO SOLAMENTE SE PUEDE ESCRIBIR UNA VEZ." minlength="1" maxlength="100"></textarea>
                                                    </div>
                                                    <div class="modal-footer justify-content-center align-content-center">
                                                        <button type="submit" class="btn btn-success">
                                                            Publicar
                                                        </button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar
                                                            Comentario</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

    {{-- <script>
        const formularios = document.getElementsByClassName("formulario");
        const estilistas = document.getElementsByClassName("estilista");
        let comentario = "";
        var nombreEstilista = "";

        for (const form of formularios) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: 'Comparte tu opinión sobre el Servicio de ' + nombreEstilista,
                    html: '<textarea rows="4" cols="40" placeholder="Ingrese un comentario." minlength="1" maxlength="100"></textarea>',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Publicar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        comentario = Swal.getHtmlContainer().querySelector('textarea').value;
                        form.firstElementChild.value = comentario;

                        form.submit();
                    }
                })
            })
        }
    </script> --}}


    <script>
        const formulariosPlus = document.getElementsByClassName("formularioAnular");

        for (const form of formulariosPlus) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres Anular la solicitud?',
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
