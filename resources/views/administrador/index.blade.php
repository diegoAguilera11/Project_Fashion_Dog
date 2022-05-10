@extends('layouts.plantilla_administrador')

@section('contenido')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <br>
                        <h2><b>Administrar Estilistas</b></h2>
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <a href="administrador/create" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Agregar estilista</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($estilistas as $estilista)
                        <tr>
                            <td>{{ $estilista->rut }}</td>
                            <td>{{ $estilista->nombre }}</td>
                            <td>{{ $estilista->apellidoPaterno }}</td>
                            <td>{{ $estilista->telefono }}</td>
                            <td>{{ $estilista->email }}</td>
                            <td>
                                <a href={{ route('editar_estilista', ['id' => $estilista->id]) }} class="edit"
                                    data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                        title="Edit">&#xE254;</i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay estilistas en la base de datos</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
    @if ($estilistas->links())
        <div class="d-flex justify-content-center">
            {!! $estilistas->links() !!}
        </div>
    @endif
@endsection
