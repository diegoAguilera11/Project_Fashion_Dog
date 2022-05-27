@extends('layouts.app')

@section('content')
    <div class="container">

        <body style="background-color: #ffffff">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <center>
                            <div class="card-header text-black" style="background-color:#FFDACC ">
                                <strong>{{ __('Rellene los campos') }}</strong>
                            </div>
                        </center>

                        <div class="card-body">
                            <form id="form" method="POST" action="{{ route('register') }}">
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
                                                {{ $message }}
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
                                                {{ $message }}
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
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="telefono"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Teléfono Móvil') }}</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text" id="telefono" name="telefono"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                            class="form-control @error('telefono') is-invalid @enderror"
                                            value="{{ old('telefono') }}" required autocomplete="telefono">

                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="direccion"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                    <div class="col-md-6">
                                        <input id="direccion" type="direccion"
                                            class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                            value="{{ old('direccion') }}" required autocomplete="direccion">

                                        @error('direccion')
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
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ 'El largo de la contraseña debe estar entre 10 y 15 caracteres, asegúrese que ambas contraseñas sean iguales.' }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                {{ 'Las contraseñas no coinciden' }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button id="boton" type="button" class="btn btn-success">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <script>
            const boton = document.getElementById("boton");
            const form = document.getElementById("form");

            boton.addEventListener('click', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres enviar estos datos?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Enviar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            })
        </script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>
    </div>
@endsection
