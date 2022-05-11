<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;
use Freshwork\ChileanBundle\Rut;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rut' => ['required', 'string', 'unique:users', 'cl_rut'],
            'nombre' => ['required', 'string', 'min:2'],
            'apellidoPaterno' =>['required', 'string', 'min:2'],
            'telefono' =>['required', 'string','unique:users', 'min:10','max:15'],
            'direccion' =>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)@(.*)\.(.*)/i'],
            'password' => ['required', 'string', 'confirmed', 'min:10', 'max:15'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);// // Datos que se estan guardando.....
        return User::create([
            'rut' => $data['rut'],
            'nombre' => $data['nombre'],
            'apellidoPaterno' => $data['apellidoPaterno'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'direccion' => $data['direccion'],
            'password' => Hash::make($data['password']),
            'rol' => "cliente",
            'estado' => "habilitado",
        ]);
    }
}
