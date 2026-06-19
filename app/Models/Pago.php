<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'cliente_id',
        'user_id',
        'membresia_id',
        'monto',
        'metodo_pago',
        'fecha_pago'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}