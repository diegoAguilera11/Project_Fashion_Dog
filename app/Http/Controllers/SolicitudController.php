<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        /** _-_ Inicio*/
        /**return view('cliente.index');*/
        /** _-_ Fin*/

        $solicitudes = Auth::user()->solicitudesCliente()->orderBy('fecha_solicitud')->orderBy('hora_solicitud')->simplePaginate(10);
        return view('cliente.index')->with('solicitudes', $solicitudes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.servicio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $date = date($request->fecha_solicitud);
        $time = date($request->hora_solicitud);
        $solicituds = Auth::user()->solicitudesCliente()->get('fecha_solicitud');
        $numero_solicitud = rand(100000, 999999);


        foreach ($solicitudes as $solicitud) {
            if ($solicitud->fecha_solicitud == $date) {
                throw ValidationException::withMessages(['fecha_solicitud' => 'Ya existe solicitud para la fecha ' . $date]);
            }
        }

        Solicitud::create([
            'fecha_solicitud' => $date,
            'hora_solicitud' => $time,
            'estado' => "INGRESADA",
            'cliente_id' => Auth::user()->id,
        ]);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
