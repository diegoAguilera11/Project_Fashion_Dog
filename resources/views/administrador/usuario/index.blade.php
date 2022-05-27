@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-xl-12">
                        <h2>Estado de <b>Usuarios</b></h2>
                        <form action="{{ route('usuario') }}">
                            <div class="form-row">
                                <div class="col-sm-4 my-1">
                                    <input id="texto" type="text"
                                        oninput="this.value = this.value.replace(/[^0-9\\K\\k]/g, '').replace(/[k]/g, 'K').replace(/(\..*)\./g, '$1');"
                                        class="form-control @error('texto') is-invalid @enderror" name="texto"
                                        value="{{ old('texto') }}" required autocomplete="text" autofocus>
                                </div>
                                <div class="col-auto my-1">
                                    <input type="submit" class="btn btn-success" value="Buscar">
                                    <!--<a href="home" class="btn btn-danger" data-toggle="modal"><span>Volver</span></a>-->
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
                                <td><a class="btn btn-success" type="text" data-toggle="tooltip" data-placement="top"
                                        title="Deshabilita al usuario"
                                        href={{ route('cambiarEstado', ['id' => $user->id]) }}><i
                                            class="fas fa-check"></i>
                                        <center><img src="images/check.png" with="20" height="20"
                                                class="d-inline-block align-text-top"></center>
                                    </a>
                                </td>
                            @else
                                <td><a class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="Habilita al usuario"
                                        href={{ route('cambiarEstado', ['id' => $user->id]) }}><i
                                            class="fas fa-ban"></i>
                                        <center><img src="images/x.png" with="20" height="20"
                                                class="d-inline-block align-text-top"></center>
                                    </a>
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
@endsection
