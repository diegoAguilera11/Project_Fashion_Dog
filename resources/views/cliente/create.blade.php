@extends('layouts.plantilla_clientes')


@section('contenido')
    <div class="container">

        <br>
        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #FFDACC;">{{ 'Solicitar Servicio' }}</div>

                        <div class="card-body">

                            <form id="form" method="POST" action="{{ route('crear_solicitud_post') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="fecha_solicitud"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fecha Servicio') }}</label>

                                    <div class="col-md-6">
                                        <input id="fecha_solicitud" type="date" min="1970-01-01" max="9999-12-31"
                                        class="form-control @error('fecha_solicitud') is-invalid @enderror"
                                        name="fecha_solicitud" value="{{ old('fecha_solicitud') }}" required
                                        autocomplete="fecha_solicitud" autofocus>

                                    @error('fecha_solicitud')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hora_solicitud"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Hora Servicio') }}</label>

                                    <div class="col-md-6">
                                        <select id="hora_solicitud" name="hora_solicitud"required
                                            class="form-select @error('hora_solicitud') is-invalid @enderror"
                                            aria-label="Default select example" value="{{ old('hora_solicitud') }}"
                                            required autocomplete="hora_solicitud" autofocus required >
                                            <option selected disabled>Seleccione Hora</option>
                                            <option value="8:00">8:00</option>
                                            <option value="9:00">9:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                            <option value="22:00">22:00</option>

                                        </select>

                                        @error('hora_solicitud')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="row mb-0">


                                    <div class="col-md-8 offset-md-4">

                                        <button id="boton" type="submit" class="btn btn-success">
                                            {{ __('Enviar') }}
                                        </button>
                                        <a href="/home" class="btn btn-return"><span>Volver</span></a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const boton = document.getElementById("boton");
                const form = document.getElementById("form");
                var today = new Date();
                today.setDate(today.getDate() + 1);
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd
                }
                if (mm < 10) {
                    mm = '0' + mm
                }
                today = yyyy + '-' + mm + '-' + dd;



                document.getElementById("fecha_solicitud").setAttribute("min", today);
                boton.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro que deseas solicitar el servicio para esa fecha?',
                        icon: 'warning',
                        showDenyButton: false,
                        showCancelButton: true,
                        confirmButtonText: 'Guardar',
                        denyButtonText: 'No guardar',
                        confirmButtonColor: '#4DD091',
                        cancelButtonColor: '#FF5C77',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            form.submit();
                        } else if (result.isDenied) {
                            Swal.fire('Los cambios no se han guardado', '', 'info')
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
