<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro');
    }   

    public function store(Request $request){
    $request->validate([
        'nombre' => 'required',
        'cuenta' => 'required',
        'servicio' => 'required',
        'numero_equipo' => 'nullable',
        'licenciaturas' => 'required',
        'usuarios' => 'required',
        'quejas_sugerencias' => 'nullable',
    ]);

    Registro::create([
        'nombre' => $request->nombre,
        'cuenta' => $request->cuenta,
        'servicio' => $request->servicio,
        'numero_equipo' => $request->numero_equipo, 
        'licenciaturas' => $request->licenciaturas,
        'usuarios' => $request->usuarios,
        'quejas_sugerencias' => $request->quejas_sugerencias,
    ]);

    return redirect()->route('registro')->with('success', 'Los datos se han guardado correctamente.');}
}
