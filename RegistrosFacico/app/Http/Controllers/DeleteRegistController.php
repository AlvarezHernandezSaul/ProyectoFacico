<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class DeleteRegistController extends Controller
{
    /**
     * Muestra los registros en la vista.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Obtener todos los registros de la tabla "registros"
        $registros = Registro::all();
        
        // Pasar los registros a la vista "home" utilizando la función compact()
        return view('home', compact('registros'));
    }

    /**
     * Elimina todos los registros de la tabla "registros".
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete()
    {
        // Eliminar todos los registros de la tabla "registros"
        Registro::truncate();

        // Redirigir a la ruta deseada después de eliminar los registros
        return redirect()->route('home')->with('success', 'Registros eliminados exitosamente.');
    }

    /**
     * Elimina un registro individualmente por su ID.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Buscar el registro por su ID
        $registro = Registro::find($id);

        if ($registro) {
            // Eliminar el registro si se encuentra
            $registro->delete();
            return redirect()->route('home')->with('eliminar', 'Ok');
        } else {
            // Redirigir a la ruta "home" si no se encuentra el registro
            return redirect()->route('home');
        }
    }
}
