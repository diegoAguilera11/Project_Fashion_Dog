@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-xl-12">
                        <h2>Listado de <b>Usuarios</b></h2>
                        <form action="{{ route('usuario') }}">
                            <div class="form-row">
                                <div class="col-sm-4 my-1">
                                    <input id="texto" type="text"
                                        oninput="this.value = this.value.replace(/[^0-9\\K\\k]/g, '').replace(/[k]/g, 'K').replace(/(\..*)\./g, '$1');"
                                        class="form-control @error('texto') is-invalid @enderror" name="texto"
                                        value="{{ old('texto') }}" required autocomplete="text" autofocus
                                        placeholder="Ingresa el RUT a buscar">
                                </div>
                                <div class="col-auto my-1">
                                    <input type="submit" class="btn btn-success" value="Buscar">

                                    <a href="home" class="btn btn-return"><span>Volver</span></a>
                                    <a href="/usuario" class="btn btn-warning" data-toggle="tooltip" data-placement="top"
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

                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->rut }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellidoPaterno }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>


                            @if ($user->estado == 'habilitado')
                                <td>
                                    <form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                        title="Deshabilita al usuario"
                                        action="{{ route('cambiarEstado', ['id' => $user->id]) }}">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                            <center><img src="images/check.png" with="20" height="20"
                                                    class="d-inline-block align-text-top"></center>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                        title="Habilita al usuario"
                                        action="{{ route('cambiarEstado', ['id' => $user->id]) }}">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-ban"></i>
                                            <center><img src="images/x.png" with="20" height="20"
                                                    class="d-inline-block align-text-top"></center>
                                        </button>

                                    </form>
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">El RUT ingresado no existe en sistema o no es un cliente
                                o estilista</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>
    @if ($users->links())
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    @endif
    <script>
        const formularios = document.getElementsByClassName("formulario");

        for (const form of formularios) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres habilitar/deshabilitar a este usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'La acción se ha realizado con exito!',
                            showConfirmButton: false,
                            timer: 5000
                        })
                    }
                })
            })
        }
    </script>
@endsection
