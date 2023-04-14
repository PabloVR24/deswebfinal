<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros extends Model
{
    use HasFactory;
    public function servicios()
    {
        return $this->hasMany(servicios::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
