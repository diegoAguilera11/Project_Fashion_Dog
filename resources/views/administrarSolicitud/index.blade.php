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
                                    data-placement="top" title="Refresca el listado de solicitudes."><span>
                                        <center><img src="images/refrescar.png" with="20" height="20"
                                                class="d-inline-block align-text-top"></center>
                                    </span></a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ______________________________________________________________[Tabla]___________________________________________________________ --}}

            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Nº Solicitud</th>
                        <th>Nombre del cliente</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Ver</th>

                    </tr>
                </thead>
                <tbody>

                    @forelse ($solicitudes as $solicitud)
                        <tr>

                            <td>{{ $solicitud->id }}</td>

                            <td>{{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}</td>

                            <td>{{ date('d/m/Y', strtotime($solicitud->fecha_solicitud)) }} -
                                {{ date('H:i', strtotime($solicitud->hora_solicitud)) }}</td>

                            <td>{{ $solicitud->estado }}</td>

                            <!-- MODAL: Ver detalles del cliente y del Estilista -->
                            <!--Para el boton se omiti el color verde: class="btn btn-success"-->

                            <td>


                                <button style="margin-left:0 !important" data-bs-toggle="modal"
                                    data-bs-target="#Modal-{{ $solicitud->id }}" type="submit" data-toggle="tooltip" title="Ver detalle de la solicitud." style="background-color: #000000"><i
                                        ></i>
                                    <center><img src="images/search.png" with="20" height="20"
                                            class="d-inline-block align-text-top"> </center>
                                </button>

                                <div class="modal fade" id="Modal-{{ $solicitud->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header" style="background-color: #FC623B">

                                                <strong>
                                                    <h5 class="modal-title " style="color:rgb(255, 255, 255)"
                                                        id="exampleModalLongTitle">Detalles de la solicitud
                                                    </h5>
                                                </strong>

                                            </div>
                                            <div class="modal-body" style="background-color: #FFDACC">
                                                <div class="card mb-3" style="max-width: 600px;">

                                                    <!-- _____________________CUADRO - Inicio _____________________ -->
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="/images/logo_FashionDog.png"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Datos del cliente</h5>
                                                                <p class="card-text">

                                                                <h6>
                                                                    <!-- Getbootstrap: Columnas de compensación -->

                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                Nombre</div>
                                                                            <div
                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                {{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                                                                {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-5 col-lg-4">Rut
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                {{ App\Models\User::getUserRut($solicitud->cliente_id) }}
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                Teléfono</div>
                                                                            <div
                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                {{ App\Models\User::getUserTelefono($solicitud->cliente_id) }}
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                Email</div>
                                                                            <div
                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                {{ App\Models\User::getUserEmail($solicitud->cliente_id) }}
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                Dirección</div>
                                                                            <div
                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                {{ App\Models\User::getUserDireccion($solicitud->cliente_id) }}
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                Estado</div>
                                                                            <div
                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                {{ $solicitud->estado }}</div>




                                                                            @if ($solicitud->estado == 'ATENDIDA A TIEMPO' || $solicitud->estado == 'ATENDIDA CON RETRASO')
                                                                                @if ($solicitud->comentario == '')
                                                                                    <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                        Comentario</div>
                                                                                    <div
                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                        Sin comentarios</div>

                                                                                    <div class="accordion accordion-flush"
                                                                                        id="accordionFlushExample">
                                                                                        <div class="accordion-item">
                                                                                            <h2 class="accordion-header"
                                                                                                id="flush-headingOne">

                                                                                                <button
                                                                                                    class="accordion-button collapsed"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="collapse"
                                                                                                    data-bs-target="#flush-collapseOne"
                                                                                                    aria-expanded="false"
                                                                                                    aria-controls="flush-collapseOne">

                                                                                                    Estilista:
                                                                                                    {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                    {{ App\Models\User::getUserApellidoById($solicitud->estilista_id) }}

                                                                                                </button>
                                                                                            </h2>
                                                                                            <div id="flush-collapseOne"
                                                                                                class="accordion-collapse collapse"
                                                                                                aria-labelledby="flush-headingOne"
                                                                                                data-bs-parent="#accordionFlushExample">
                                                                                                <div class="accordion-body">

                                                                                                    <div class="container">
                                                                                                        <div class="row">

                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                Nombre
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                Rut
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                {{ App\Models\User::getUserRut($solicitud->estilista_id) }}
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                Teléfono
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                {{ App\Models\User::getUserTelefono($solicitud->estilista_id) }}
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                Email
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                {{ App\Models\User::getUserEmail($solicitud->estilista_id) }}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @else
                                                                                        <div
                                                                                            class="col-sm-6 col-md-5 col-lg-4">
                                                                                            Comentario</div>
                                                                                        <div
                                                                                            class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                            {{ $solicitud->comentario }}
                                                                                        </div>
                                                                                        <div class="accordion accordion-flush"
                                                                                            id="accordionFlushExample">
                                                                                            <div class="accordion-item">
                                                                                                <h2 class="accordion-header"
                                                                                                    id="flush-headingOne">
                                                                                                    <button
                                                                                                        class="accordion-button collapsed"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="collapse"
                                                                                                        data-bs-target="#flush-collapseOne"
                                                                                                        aria-expanded="false"
                                                                                                        aria-controls="flush-collapseOne">
                                                                                                        Estilista:
                                                                                                        {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                        {{ App\Models\User::getUserApellidoById($solicitud->estilista_id) }}
                                                                                                    </button>
                                                                                                </h2>

                                                                                                <div id="flush-collapseOne"
                                                                                                    class="accordion-collapse collapse"
                                                                                                    aria-labelledby="flush-headingOne"
                                                                                                    data-bs-parent="#accordionFlushExample">
                                                                                                    <div
                                                                                                        class="accordion-body">

                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row">

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                    Nombre
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                    Rut
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserRut($solicitud->estilista_id) }}
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                    Teléfono
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserTelefono($solicitud->estilista_id) }}
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-4">
                                                                                                                    Email
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserEmail($solicitud->estilista_id) }}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                @endif
                                                                            @else
                                                                                @if ($solicitud->estado == 'ANULADA')
                                                                                @else
                                                                                    @if ($solicitud->estado == 'INGRESADA')
                                                                                        <footer class="text-muted"><br>
                                                                                            <li>Estilista por asignar
                                                                                            </li>
                                                                                        </footer>
                                                                                    @endif
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </h6>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty

                        <tr>
                            <td colspan="6" class="text-center">No hay solicitudes por mostrar</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            @if ($solicitudes->links())
                <div class="d-flex justify-content-center">
                    {!! $solicitudes->links() !!}
                </div>
            @endif
        </div>

    </div>
@endsection
