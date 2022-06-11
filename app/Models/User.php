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


    public function solicitudes()
    {

        return $this->hasMany(Solicitud::class);
    }


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
}
