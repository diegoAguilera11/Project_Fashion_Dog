@extends('layouts.plantilla_clientes')
{{-- _-_ Inicio --}}
{{-- _-_ Inicio --}} @extends('layouts.app')
{{-- _-_ Fin --}}

{{-- _-_22 Inicio --}}

{{-- _-_22 Fin --}}


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


                            {{--_-_ []--}}

                            <br>
                            <input id="datetimepicker" type="text" class="form-control"name="published_at" >


                            <link rel="stylesheet" type="text/css" href="/datetimepicker/jquery.datetimepicker.css" >
                            <script src="/datetimepicker/jquery.js"></script>
                            <script src="/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

                            <script>


                                jQuery.datetimepicker.setLocale('es');//Idioma Español

                                jQuery('#datetimepicker').datetimepicker({
                                    i18n:{
                                        es:{
                                            dayOfWeekShort:[" Dom ", " Lun ", " Mar ", " Mie ", " Jue ", " Vie "," Sab ",]
                                        }
                                    },
                                    format: 'd/m/Y H:i',
                                    minDate: '+1970/01/02',  //desde mañana es el dia minimo
                                });

                                $('#input').datetimepicker();
                                $('button.somebutton').on('click', function () {
                                    var d = $('#input').datetimepicker('getValue');
                                    console.log(d.getFullYear());
                                });

                            </script>
                            {{--_-_ []--}}



                            {{--
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
                            </div>--}}
                            {{-- __________________(0)_________________ --}}

                            <br><br>
                            {{--<input id="datetimepicker" type="text" >--}}

                            {{--
                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end"><strong>{{ __('Indique fecha:') }}</strong></label>
                                <form class="row">


                                    <div class="col-md-6">

                                        aquiiii <br>
                                        <input type="text" id="datetimepicke" name="published_at" class="form-control" />





                                        <div class="col-5">
                            --}}
                                            {{--_-_22 --}}
                            {{--
                                            <div class="input-group date datepicker">

                                                <input type="text" id="datetimepicke" name="published_at" class="form-control" />


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
                            --}}
                            {{-- __________________(0)_________________ --}}




                            {{-- __________________(1)_________________ --}}
                            <br>
                            <div class="container">
                                <div id="agenda">
                                </div>
                            </div>

                            {{-- _-_ Inicio - [Cuadro] --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                                Launch
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="cliente" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="">


                                                <div class="form-group">
                                                    <label for="id">ID:</label>
                                                    <input type="text" class="form-control" name="" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                </div>



                                                <div class="form-group">
                                                    <label for="title">Titulooo</label>
                                                    <input type="text" class="form-control" name="" id=""
                                                        aria-describedby="helpId" placeholder="titulasoo del evento">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                </div>

                                                {{-- Descripción del Evento --}}
                                                <div class="form-group">
                                                    <label for="descripcion">Descripción del Evento xd</label>
                                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="start">start</label>
                                                    <input type="text" class="form-control" name="" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                </div>


                                                <div class="form-group">
                                                    <label for="end">end</label>
                                                    <input type="text" class="form-control" name="" id=""
                                                        aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                </div>


                                            </form>

                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                                            <button type="button" class="btn btn-warning"
                                                id="btnModificar">Modificar</button>
                                            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- _-_ Fin [caudro] --}}



                            <br> <br>
                            {{-- __________________(1)_________________ --}}





                        </div>
                </div>
                </form>
            </div>
            <br> <br>
    </div>
    </div>
    </div>
    </body>


@endsection

