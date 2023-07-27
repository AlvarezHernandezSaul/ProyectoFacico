<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cuenta',
        'servicio',
        'numero_equipo', 
        'licenciaturas',
        'usuarios',
        'quejas_sugerencias',
    ];
}
