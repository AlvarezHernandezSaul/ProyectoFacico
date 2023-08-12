<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro; // Importa el modelo 'Registro'

class AdminController extends Controller
{
    /**
     * Muestra la vista de administrador con registros de uso de salas de cómputo.
     *
     * @return \Illuminate\View\View
     */
    public function admin()
    {
        // Obtiene todos los registros de la base de datos
        $registro = Registro::all();

        // Retorna la vista 'admin.home' y pasa los registros como variable compacta
        return view('admin.home', compact('registro'));
    }
}
