@extends('layouts.plantilla_clientes')


@section('contenido')
    <div class="container">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ 'Solicitar Servicio' }}</div>

                        <div class="card-body">
                            <form id="form" method="POST" action="{{ route('crear_solicitud_post') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="fecha_solicitud"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fecha Servicio') }}</label>

                                    <div class="col-md-6">
                                        <input id="fecha_solicitud" type="date"
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
                                        <select id="hora_solicitud" name="hora_solicitud"
                                            class="form-select @error('hora_solicitud') is-invalid @enderror"
                                            aria-label="Default select example" value="{{ old('hora_solicitud') }}" required
                                            autocomplete="hora_solicitud" autofocus>
                                            <option selected disabled>Seleccione Hora</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
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
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Enviar') }}
                                        </button>
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
                    title: 'Do you want to save the changes?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            })
        </script>

@endsection
