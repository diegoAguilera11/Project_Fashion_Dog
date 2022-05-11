@extends('layouts.app')

@section('content')
    <div class="container">

        <body style="background-color: #ffffff">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('changePassword') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header text-black" style="background-color:#FFDACC ">
                                <strong>{{ __('Cambiar Contraseña') }}</strong>
                            </div>

                            <div class="card-body">


                                <div class="row mb-3">
                                    <label for="rut" class="col-md-4 col-form-label text-md-end"> <strong>
                                            {{ __('RUT') }} </strong></label>

                                    <div class="col-md-6">
                                        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                            name="rut" required autocomplete="rut" value={{ Auth::user()->rut }} autofocus
                                            disabled>

                                        @error('rut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="new_password "
                                        class="col-md-4 col-form-label text-md-end"><strong>{{ __('Nueva Contraseña') }}</strong></label>
                                    <div class="col-md-6">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" required
                                            autocomplete="password" autofocus>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ 'El largo de la contraseña debe estar entre 10 y 15 caracteres, asegúrese que ambas contraseñas sean iguales ' }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="confirm_password"
                                        class="col-md-4 col-form-label text-md-end"><strong>{{ __('Confirmar Nueva Contraseña') }}</strong></label>
                                    <div class="col-md-6">
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('confirm_password') is-invalid @enderror" required
                                            autocomplete="confirm_password" autofocus>
                                        @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Cambiar') }}
                                        </button>
                                    </button>
                                    <a href="/home" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
    </div>
    </div>
    </div>
    </body>
@endsection
