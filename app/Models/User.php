<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rut',
        'nombre',
        'apellidoPaterno',
        'telefono',
        'email',
        'direccion',
        'password',
        'rol',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function solicitudesCliente()
    {
        return $this->hasMany(Solicitud::class, "cliente_id");
    }

    public function solicitudesEstilista()
    {
        return $this->hasMany(Solicitud::class, "estilista_id");
    }

    public static function getUserNameById($id)
    {
        return User::where('id', $id)->pluck('nombre')->first();
    }


    public static function getUserApellidoById($id)
    {
        return User::where('id', $id)->pluck('apellidoPaterno')->first();
    }

    public static function getUserRut($id)
    {
        return User::where('id', $id)->pluck('rut')->first();
    }

    public static function getUserEmail($id)
    {
        return User::where('id', $id)->pluck('email')->first();
    }
    public static function getUserDireccion($id)
    {
        return User::where('id', $id)->pluck('direccion')->first();
    }
    public static function getUserTelefono($id)
    {
        return User::where('id', $id)->pluck('telefono')->first();
    }

    public static function getUserDates($id)
    {
        $user = (object)array('nombre'=>User::where('id',$id)->pluck('nombre')->first()  );
        return $user;
    }

    public static function getUserDireccionById($id)
    {
        return User::where('id', $id)->pluck('direccion')->first();
    }

    public static function getUserDates($id)
    {
        $user = (object)array('rut'=>User::where('id', $id)->pluck('rut')->first(),'nombre'=>User::where('id', $id)->pluck('nombre')->first(),'apellidoPaterno'=>User::where('id', $id)->pluck('apellidoPaterno')->first(),'telefono'=>User::where('id', $id)->pluck('telefono')->first(),'email'=>User::where('id', $id)->pluck('email')->first(),'direccion'=>User::where('id', $id)->pluck('direccion')->first());
        return $user;
    }


}
