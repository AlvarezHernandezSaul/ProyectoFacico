<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $table = 'registros'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Nombre de la clave primaria de la tabla

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<string, mixed>
     */
    protected $fillable = [
        'nombre',
        'cuenta',
        'servicio',
        'numero_equipo', 
        'licenciaturas',
        'usuario',
        'quejas_sugerencias',
        'hora_registro',
        
    ];
}
