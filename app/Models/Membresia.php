<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $fillable = [
        'nombre',
        'duracion_dias',
        'precio',
        'descripcion'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}