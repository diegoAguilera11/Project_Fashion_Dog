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
                                <input id="fecha_solicitud" type="date" min="1970-01-01" max="9999-12-31"
                                    class="form-control @error('fecha_solicitud') is-invalid @enderror"
                                    name="fecha_solicitud" value="{{ old('fecha_solicitud') }}" required
                                    autocomplete="fecha_solicitud" autofocus>
                                <div class="col-auto my-2">
                                    <input type="submit" class="btn btn-success" value="Buscar">
                                    <a href="home" class="btn btn-return"><span>Volver</span></a>
                                    <a href="/estilista" class="btn btn-warning" data-toggle="tooltip" data-placement="top"
                                        title="Refresca el Listado de Usuarios"><span>
                                            <center><img src="images/refrescar.png" with="20" height="20"
                                                    class="d-inline-block align-text-top"></center>
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
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Ver</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicituds as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($solicitud->fecha_solicitud)) }} -
                                {{ date('H:i', strtotime($solicitud->hora_solicitud)) }}</td>
                            <td>{{ $solicitud->estado }}</td>
                            <td>
                                <form class="formularioAtender" method="GET" data-toggle="tooltip" data-placement="top"
                                    action="{{ route('AceptarServicio', ['id' => $solicitud->id]) }}">

                                    <button  style= "margin-left:0 !important"  type="button" data-backdrop="static" data-toggle="modal"
                                        data-target="#Modal-{{ $solicitud->id }}"><i class="fas fa-check"></i>
                                        <img src="images/search.png" with="20" height="20"
                                                class="align-text-top">
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="Modal-{{ $solicitud->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <form class="formulario" method="GET"
                                                    action="{{ route('AceptarServicio', ['id' => $solicitud->id]) }}">
                                                    <div class="modal-header" style="background-color: #FC623B">
                                                        <h5 class="modal-title " style="color:#ffffff"
                                                            id="exampleModalLongTitle">Detalles de la solicitud
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
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
                                                                                        {{ App\Models\User::getUserDates($solicitud->cliente_id)->nombre }}
                                                                                        {{ App\Models\User::getUserDates($solicitud->cliente_id)->apellidoPaterno }}
                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                        Rut</div>
                                                                                    <div
                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                        {{ App\Models\User::getUserDates($solicitud->cliente_id)->rut }}
                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                        Teléfono</div>
                                                                                    <div
                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                        {{ App\Models\User::getUserDates($solicitud->cliente_id)->telefono }}
                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                        Email</div>
                                                                                    <div
                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                        {{ App\Models\User::getUserDates($solicitud->cliente_id)->email }}
                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-5 col-lg-4">
                                                                                        Dirección</div>
                                                                                    <div
                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-8 offset-lg-0">
                                                                                        {{ App\Models\User::getUserDates($solicitud->cliente_id)->direccion }}
                                                                                    </div>
                                                                                </div>
                                                                        </h6>
                                                                        </p>

                                                                    </div>

                                                                </div>
                                                                <div
                                                                    class="modal-footer justify-content-center align-content-center">
                                                                    <button type="submit" class="btn btn-success">Atender
                                                                        Solicitud
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Cerrar
                                                                        Solicitud</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    @if ($solicituds->links())
        <div class="d-flex justify-content-center">
            {!! $solicituds->links() !!}
        </div>
    @endif

    <script>
        const formulariosAtender = document.getElementsByClassName("formularioAtender");

        for (const form of formulariosAtender) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres atender la solicitud?',
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

