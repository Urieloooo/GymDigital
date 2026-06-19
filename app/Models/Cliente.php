<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre_completo',
        'edad',
        'telefono',
        'correo',
        'genero',
        'fecha_inscripcion',
        'fecha_vencimiento',
        'estado',
        'membresia_id'
    ];

    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }
}