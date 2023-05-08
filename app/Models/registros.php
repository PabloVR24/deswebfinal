<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros extends Model
{
    use HasFactory;
    public function servicios()
    {
        return $this->belongsTo(servicios::class, 'id_servicio');;
        
    }

    public function cliente()
    {
        return $this->belongsTo(clientes::class, 'id_cliente');
    }
}
