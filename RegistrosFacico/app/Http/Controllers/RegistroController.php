<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    /**
     * Muestra todos los registros en la vista de administrador.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {   
        // Obtener todos los registros utilizando el modelo "Registro"
        $registro = Registro::all();

        // Mostrar la vista "admin.home" y pasar los registros como variable "registro"
        return view('admin.home', compact('registro'));
    }

    /**
     * Muestra el formulario para crear un nuevo registro.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Mostrar la vista "registro" para el formulario de creación de registro
        return view('registro');
    }   

    /**
     * Almacena un nuevo registro en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los campos del formulario de registro
        $request->validate([
            'nombre' => 'required',
            'cuenta' => 'required',
            'servicio' => 'required',
            'numero_equipo' => 'nullable',
            'licenciaturas' => 'required',
            'usuario' => 'required', 
            'quejas_sugerencias' => 'nullable',
        ]);

        try {
            // Crear un nuevo registro en la base de datos utilizando el modelo "Registro"
            Registro::create([
                'nombre' => $request->nombre,
                'cuenta' => $request->cuenta,
                'servicio' => $request->servicio,
                'numero_equipo' => $request->numero_equipo, 
                'licenciaturas' => $request->licenciaturas,
                'usuario' => $request->usuario, 
                'quejas_sugerencias' => $request->quejas_sugerencias,
            ]);

            // Redirigir a la ruta 'registroreg' con un mensaje de éxito
            return redirect()->route('registroreg')->with('success', 'Los datos se han guardado correctamente.');
        } catch (\Exception $e) {
            // En caso de error, redirigir a la ruta 'registroreg' con un mensaje de error y detalles
            $errorMessage = 'Ha ocurrido un error al guardar los datos. Detalles: ' . $e->getMessage();
            return redirect()->route('registroreg')->with('error', $errorMessage);
        }
    }
}
