<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function NewPassword()
    {
        return view('/auth/passwords/reset');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'confirmed', 'min:10'],
        ]);

        $user           = Auth::user();
        $userId         = $user->id;
        $userEmail      = $user->email;
        $userPassword   = $user->password;

        if ($request->password_actual != "") {
            $NuewPass   = $request->password;
            $confirPass = $request->confirm_password;
            $name       = $request->name;
            if (Hash::check($request->password_actual, $userPassword)) {
                if ($NuewPass == $confirPass) {
                    if (strlen($NuewPass) >= 10) {
                        $user->password = Hash::make($request->password);
                        $sqlBD = DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password], ['name' => $user->name]);

                        return redirect()->back()->with('updateClave', 'La clave fue cambiada correctamente.');
                    } else {
                        return redirect()->back()->with('clavemenor', 'Recuerde la clave debe ser mayor a 6 digitos.');
                    }
                } else {
                    return redirect()->back()->with('claveIncorrecta', 'Por favor verifique las claves no coinciden.');
                }
            } else {
                return back()->withErrors(['password_actual' => 'La Clave no Coinciden']);
            }
        } else {
            $name       = $request->name;
            $sqlBDUpdateName = DB::table('users')
                ->where('id', $user->id)
                ->update(['name' => $name]);
            return redirect()->back()->with('name', 'El nombre fue cambiado correctamente.');;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
