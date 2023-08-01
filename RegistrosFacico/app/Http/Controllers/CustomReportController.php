<?php

namespace App\Http\Controllers;

use App\Exports\RegistroExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Registro;

class CustomReportController extends Controller
{
    public function generate()
    {
        $registros = Registro::select('created_at','nombre', 'cuenta', 'servicio', 'numero_equipo', 'licenciaturas', 'usuario', 'quejas_sugerencias')
            ->get(); // Recopilación de datos

        $fechaActual = now()->format('Y-m-d'); // Fecha según el día

        $nombreArchivo = 'Registros_' . $fechaActual . '.xlsx'; // Concatenación nombre-fecha

        return Excel::download(new RegistroExport($registros), $nombreArchivo);
    }
}
