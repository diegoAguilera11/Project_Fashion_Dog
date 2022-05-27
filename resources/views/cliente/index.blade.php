@extends('layouts.plantilla_clientes')


@section('contenido')
    <div class="container">

        <br>
        <br>

        <body style="background-color: #ffffff">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('changePassword') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header text-black" style="background-color:#FFDACC ">
                                <center>
                                <strong>{{ __('Solicitar servicio a domicilio') }}</strong>
                                </center>
                            </div>
                            <br>
                            <div class="row mb-3">
                                    <label for="date"
                                        class="col-md-4 col-form-label text-md-end"><strong>{{ __('Indique fecha:') }}</strong></label>
                                        <form class="row">

                                    <div class="col-md-6">
                                        <div class="col-5">
                                            <div class="input-group date" id="datepicker">
                                                <input type="text" class="form-control" id="date" />
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>

                                    </div>
                                </div>
                            </form>

                                <br>
                                <br>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Enviar') }}
                                        </button>
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
