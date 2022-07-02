@extends('layouts.plantilla_administrador')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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

                            <td>[{{ $solicitud->id }}]</td>

                            <td>{{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}</td>

                            <td>{{ $solicitud->fecha_solicitud }} • {{ $solicitud->hora_solicitud }}</td>

                            <td>{{ $solicitud->estado }}</td>



                            <td>
                                <form class="formulario" method="GET">

                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                        <center><img src="images/search.png" with="20" height="20"
                                                class="d-inline-block align-text-top"> </center>

                                    </button>
                                </form>
                            </td>


                            <td>

                                <body>

                                    @php($variable__7777 = "variable1")
                                    @php
                                    $variable1 = "#miModal";
                                    $variable2 = "miModal";
                                    @endphp

                                    <button data-bs-toggle="modal" data-bs-target="#miModal" type="submit"
                                        class="btn btn-success"><i class="fas fa-check"></i>
                                        <center><img src="images/search.png" with="20" height="20"
                                                class="d-inline-block align-text-top"> </center>

                                    </button>

                                    <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle">Titulasoo</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Rut: {{ App\Models\User::getUserRut($solicitud->cliente_id) }} <br>
                                                        Nombre: {{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                                        {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}<br>

                                                        Estado: {{ $solicitud->estado }} <br>
                                                        Comentario: {{ $solicitud->comentario }} <br> <br>


                                                        Telefono: {{ App\Models\User::  getUserTelefono($solicitud->cliente_id) }} <br>
                                                        Email: {{ App\Models\User::getUserEmail($solicitud->cliente_id) }} <br>
                                                        Dirección: {{ App\Models\User:: getUserDireccion($solicitud->cliente_id) }} <br>


                                                    </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </body>



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


    <script>
        const formularios = document.getElementsByClassName("formulario");

        for (const form of formularios) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: 'Contenido',
                    icon: '',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,

                })
            })
        }
    </script>
@endsection
