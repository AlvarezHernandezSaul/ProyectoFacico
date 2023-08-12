<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class UserController extends Controller
{
    /**
     * Muestra la vista del usuario.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function user()
    {
        // Obtener todos los registros de la base de datos
        $registro = Registro::all();

        // Mostrar la vista "user.user" y pasar los registros a la vista
        return view('user.user', compact('registro'));
    }
}
