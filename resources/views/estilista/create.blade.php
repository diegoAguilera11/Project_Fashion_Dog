@extends('layouts.plantilla_estilistas')

@section('contenido')

    <body class style="background-color: #ffffff">
        <center>
        <h2>RELLENE LOS CAMPOS</h2>
        </center>
        <form action="/estilistas" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">RUT</label>
                <input id="rut" name="rut" type="text" class="form-control" tabindex="1">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Apellido Paterno</label>
                <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" tabindex="3">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Telefono Movil</label>
                <input id="telefono" name="telefono" type="number" class="form-control" tabindex="4">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Correo Electronico</label>
                <input id="email" name="emai" type="text" class="form-control" tabindex="5">
            </div>
            <a href="/estilistas" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        </form>
    </body>
@endsection
