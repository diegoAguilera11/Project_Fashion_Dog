@extends('layouts.plantilla_clientes')


@section('contenido')
    <div class="container">

        <br>
        <br>

        <body style="background-color: #ffffff">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('requestService') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header text-black" style="background-color:#FFDACC ">
                                <center>
                                    <strong>{{ __('Solicitar servicio a domicilio') }}</strong>
                                </center>
                            </div>
                            <br>
                            <div class="row mb-3">
                            <form>

                                    <label for="date" class="col-sm-1 col-form-label">Indique fecha</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                            </form>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                </div>
                </form>
            </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
    </body>
@endsection
