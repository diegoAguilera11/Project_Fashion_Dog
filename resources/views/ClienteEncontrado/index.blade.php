@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 login-box">
            <div class="login-title">Informacion del Usuario</div>
            <div class="row">
                <div class="col-6">
                    <div class="row-12">
                        <div class="col-lg-12 login-key">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="row-12">
                        <div class="col-lg-12 mt-4 text-light login-title" style="font-size: 15px">
                            Nombre:
                            {{ $user->name }}
                            {{ $user->apellidoPaterno }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <table class="table table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td>Rut:</td>
                                <td>{{ $user->rut }}</td>
                            </tr>
                            <tr>
                                <td>Telefono:</td>
                                <td>{{ $user->telefono}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Direccion:</td>
                                <td>{{ $user->direccion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 mt-3 login-box">
            <div class="col-12">
                <div class="login-title">SOLICITUDES</div>
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                    </thead>
                    <tbody>
                        @forelse ($user->solicituds as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id}</td>
                            <td>{{ $solicitud->fecha_solicitud }} - {{ $solicitud->hora_solicitud }}</td>
                            <td>{{ $solicitud->estado }}</td>


                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <p>Sin Solicitudes</p>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
    </div>


    @endsection
