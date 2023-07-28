<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function index()
    {   
        $registro=Registro::all();
        return view('admin.home', compact('registro'));

    }

    public function create()
    {
        return view('registro');
    }   

    public function store(Request $request)
    {
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
            Registro::create([
                'nombre' => $request->nombre,
                'cuenta' => $request->cuenta,
                'servicio' => $request->servicio,
                'numero_equipo' => $request->numero_equipo, 
                'licenciaturas' => $request->licenciaturas,
                'usuario' => $request->usuario, 
                'quejas_sugerencias' => $request->quejas_sugerencias,
            ]);

            return redirect()->route('registro')->with('success', 'Los datos se han guardado correctamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Ha ocurrido un error al guardar los datos. Detalles: ' . $e->getMessage();
            return redirect()->route('registro')->with('error', $errorMessage);
        }
        
    }
}
