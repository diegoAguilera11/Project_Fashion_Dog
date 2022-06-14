<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;


class BuscarEstudianteController extends Controller
{
    public function devolverSolicitudPorFecha(Request $request){

        //buscar por fecha
        $findSolicitud = Solicitud::where('fecha_solicitud', $request->fecha_solicitud);

        if (isset($findSolicitud)) {
            if ($findSolicitud->estado == "INGRESADA") {
                return redirect(route('mostrarSolicitud',['id' => $findSolicitud->id]));
            }else {
                return redirect('buscar-fecha')->with('error', 'No hay solicitudes para atender.');
            }
        }else {
            return redirect('buscar-fecha')->with('error', 'No hay solicitudes para atender.');
        }
    }

    //mostrar las solicitudes del cliente
    public function mostrarCliente(String $id){
        $user = Solicitud::where('id', $id)->with('user')->with('solicituds')->get();

        return view('ClienteEncontrado.index')->with('user',$user);
    }

}