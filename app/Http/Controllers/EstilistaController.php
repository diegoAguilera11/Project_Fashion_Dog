<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;

class EstilistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estilistas = User::where('rol', 'estilista')->simplePaginate(5);
        return view("administrador.index")->with("estilistas",$estilistas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("administrador.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:2'],
            'apellidoPaterno' => ['required', 'string', 'min:2'],
            'telefono' => ['required', 'string', 'min:10','max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)@(.*)\.(.*)/i'],
            'rut' => ['required', 'string', 'unique:users','cl_rut'],
        ]);

        //crear contraseña aleatoria
        $aleatorio = $request['rut'];

        User::create([
            'nombre' => $request['nombre'],
            'apellidoPaterno' => $request['apellidoPaterno'],
            'telefono' => $request['telefono'],
            'direccion' => "0",
            'rut' => $request['rut'],
            'email' => $request['email'],
            'password' => Hash::make($aleatorio),
            'rol' => "estilista",
            'estado' =>"habilitado",
        ]);

        $estilistas = User::where('rol', 'estilista')->paginate(5);

        return redirect(route('estilista'))->with("estilistaCreado",true)->with("estilistas",$estilistas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->FirstOrFail();
        return view('administrador.edit')->with('estilista',$user);
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


        $user = User::where('id', $id)->FirstOrFail();


        $request->validate([
            'nombre' => ['required', 'string', 'min:2'],
            'apellidoPaterno' => ['required', 'string', 'min:2'],
            'telefono' => ['required', 'string', 'min:10','max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/(.*)@(.*)\.(.*)/i'],

        ]);

        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->apellidoPaterno = $request->apellidoPaterno;
        $user->telefono = $request->telefono;

        $user->save();

        $estilistas = User::where('rol', 'estilista')->get();
        return redirect(route('estilista'))->with("estilistaEditado",true)->with("estilistas",$estilistas);

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
