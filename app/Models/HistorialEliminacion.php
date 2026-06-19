<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialEliminacion extends Model
{
    protected $fillable = [
        'cliente_id',
        'motivo',
        'fecha_eliminacion',
        'eliminado_por'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'eliminado_por');
    }
}