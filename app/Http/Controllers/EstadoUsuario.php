<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class EstadoUsuario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->texto == null) {
            $usuarios = User::where('rol', "!=", 'administrador')->simplePaginate(5);
            return view('administrador.usuario.index')->with('users', $usuarios);
        } else {
            $usuarios = User::where('rol', "!=", 'administrador')->where('rut', $request->texto)->simplePaginate(5);
            return view('administrador.usuario.index')->with('users', $usuarios);
        }
    }

    public function updateStatus($request)
    {
        $usuario = User::where('id', $request)->get()->first();
        if ($usuario->estado == 'deshabilitado') {
            $usuario->estado = 'habilitado';
            $usuario->save();
            return redirect('/usuario');
        } else {
            $usuario->estado = 'deshabilitado';
            $usuario->save();
            return redirect('/usuario');
        }
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$solicitudes = Solicitud::simplePaginate(5);
        $solicitudes = DB::table('solicituds')->simplePaginate(10);
        /**
         * compact = va acompactar todas las variables que se vayan a enviar en algun momento
         *
         * **/
        return view('administrarSolicitud.index', compact('solicitudes'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
