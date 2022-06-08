<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $filliable = [
        'fecha_solicitud',
        'fecha_solicitud',
        'hora_solicitud',
        'estado',
        'comentario',
        'cliente_id',
        'estatilista_id'

    ];
}
