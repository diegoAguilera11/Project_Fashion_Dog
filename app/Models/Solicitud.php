<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'fecha_solicitud',
        'hora_solicitud',
        'estado',
        'comentario',
        'cliente_id',
        'estilista_id',
        'numero_solicitud',
    ];
}
