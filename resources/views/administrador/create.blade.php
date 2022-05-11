@extends('layouts.plantilla_administrador')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <div class="card">
                    <strong>
                        <div class="card-header text-black" style="background-color:#FFDACC ">{{ 'Agregar Estilista' }}
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('crear_estilista_post') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                                    <div class="col-md-6">
                                        <input id="rut" type="text"
                                            oninput="this.value = this.value.replace(/[^0-9\\K\\k]/g, '').replace(/[k]/g, 'K').replace(/(\..*)\./g, '$1');"
                                            class="form-control @error('rut') is-invalid @enderror" name="rut"
                                            value="{{ old('rut') }}" required autocomplete="rut" autofocus>

                                        @error('rut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nombre"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="nombre" type="text"
                                            oninput="this.value = this.value.replace(/[^A-Z\\a-z]/g, '').replace(/(\..*)\./g, '$1');"
                                            class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                            value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="apellidoPaterno"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                                    <div class="col-md-6">
                                        <input id="apellidoPaterno" type="text"
                                            oninput="this.value = this.value.replace(/[^A-Z\\a-z]/g, '').replace(/(\..*)\./g, '$1');"
                                            class="form-control @error('apellidoPaterno') is-invalid @enderror"
                                            name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" required
                                            autocomplete="apellidoPaterno" autofocus>

                                        @error('apellidoPaterno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="telefono"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Teléfono Movil') }}</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text" id="telefono" name="telefono"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                            / class="form-control @error('telefono') is-invalid @enderror"
                                            value="{{ old('telefono') }}" required autocomplete="telefono">

                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Agregar Estilista') }}
                                        </button>
                                        <a href="/administrador" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </strong>
                </div>
            </div>
        </div>
    </div>
@endsection
