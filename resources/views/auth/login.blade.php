@extends('layouts.app')

@section('content')
    <div class="container">

        <body style="background-color: #ffffff">
            <div class="row justify-content-center">
                <center>
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}
                        </div>
                    @endif
                </center>
                <div class="col-md-8">
                    <div class="card">

                            <div class="card-header text-black" style="background-color:#FFDACC ">
                                <strong>{{ __('Iniciar Sesión') }}</strong>
                            </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                                    <div class="col-md-6">
                                        <input id="rut" type="rut"
                                            oninput="this.value = this.value.replace(/[^0-9\\K\\k]/g, '').replace(/[k]/g, 'K').replace(/(\..*)\./g, '$1');"
                                            class="form-control @error('rut') is-invalid @enderror" name="rut"
                                            value="{{ old('rut') }}" required autocomplete="rut" autofocus>

                                        @error('rut')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Ingresar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>

    </div>
@endsection
