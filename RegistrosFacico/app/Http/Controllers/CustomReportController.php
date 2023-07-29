<?php

namespace App\Http\Controllers;

use App\Exports\RegistroExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Registro;

class CustomReportController extends Controller
{
    public function generate()
    {
        $registros = Registro::select('nombre', 'cuenta', 'servicio', 'numero_equipo', 'licenciaturas', 'usuario', 'quejas_sugerencias', 'created_at')
            ->get(); //recopilación de datos 

        $fechaActual = now()->format('Y-m-d'); //fecha según el dia 

        $nombreArchivo = 'Registros_' . $fechaActual . '.xlsx'; //Concatenación nombre-fecha

        return Excel::download(new RegistroExport($registros), $nombreArchivo);
    }
}
