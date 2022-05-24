@extends('layouts.plantilla_administrador')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <div class="card">

                    <div class="card-header text-black" style="background-color:#FFDACC ">
                        <strong>{{ 'Agregar Estilista' }}</strong>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('crear_estilista_post') }}">
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
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

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
                                    class="col-md-4 col-form-label text-md-end">{{ __('Teléfono Movil') }}</label>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" type="submit" class="btn btn-success">
                                        Agregar Estilista
                                    </button>
                                    <a href="/administrador" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const boton = document.getElementById("boton");
        const form = document.getElementById("form");

        boton.addEventListener('click', (e) => {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro que desea registrar a un estilista con estos datos?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4DD091',
                cancelButtonColor: '#FF5C77',
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        })
    </script>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script src="js/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
@endsection
