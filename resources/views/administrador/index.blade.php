@extends('layouts.plantilla_administrador')

@section("contenido")
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
						<h2>Administrar <b>Estilistas</b></h2>
					</div>
					<div class="col-sm-3">
						<a href="administrador/create" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar estilista</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Rut</th>
                        <th>Nombre</th>
						<th>Apellido P.</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($estilistas as $estilista)
                        <tr>
                        <td>{{$estilista->rut}}</td>
                        <td>{{$estilista->nombre}}</td>
						<td>{{$estilista->apellidoPaterno}}</td>
                        <td>{{$estilista->telefono}}</td>
                        <td>{{$estilista->email}}</td>
                        <td>
                            <a href={{ route('editar_estilista', ['id'=>$estilista->id]) }} class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
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


@endsection
