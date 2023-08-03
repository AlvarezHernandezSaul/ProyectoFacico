<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class DeleteRegistController extends Controller
{
    public function index()
    {
        // Aquí puedes agregar la lógica para mostrar los registros en la vista
        $registros = Registro::all();
        return view('home', compact('registros'));
    }

    public function delete()
    {
        // Lógica para eliminar todos los registros de la tabla "registros"
        Registro::truncate();

        // Redirige a la ruta deseada después de eliminar los registros
        return redirect()->route('home')->with('success', 'Registros eliminados exitosamente.');
    }


    // forma para eliminar registros de forma idividual
    public function destroy($id)
    {
        
        $registros = Registro::find($id);

        if ($registros) {
            $registros->delete();
            return redirect()->route('home')->with('eliminar','Ok');
        } else {
            return redirect()->route('home');
        }
    }
}
