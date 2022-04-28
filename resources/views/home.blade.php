@extends('layouts.app')

@section('content')

    

    <div class="container">

        <body class style="background-color: #ffffff">
            @if (Auth::user()->estado == 'habilitado')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Panel') }}</div>

                            <div class="card-body">
                                @if (Auth::user()->rol == 'cliente')
                                    @if (Auth::user()->estado == 'habilitado')
                                        <a href="/cliente">
                                            Vista cliente
                                        </a>
                                        <h1>Bienvenido</h1>
                                    @endif
                                   
                                @endif

                                @if (Auth::user()->rol == 'admin')
                                    <center>
                                        <h1>Bienvenido Administrador {{ Auth::user()->nombre }}</h1>
                                        <a href="/administrador" class="btn btn-success">Administrar Estilistas</a>
                                    </center>
                                @endif
                                @if (Auth::user()->rol == 'estilista')
                                    <a href="/estilista">
                                    </a>
                                    <h1>Ingresado Como Estilista</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </body>
    </div>
@endsection
