<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RegistroExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Registro;
use Carbon\Carbon;

class CustomReportController extends Controller
{
    /**
     * Genera y descarga un informe personalizado en formato Excel.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\RedirectResponse
     */
    public function generate(Request $request)
    {
        $semester = $request->input('semester'); // Obtener el valor del semestre del formulario
        $parts = explode('-', $semester); // Dividir el valor en partes

        if (count($parts) === 2) {
            $semesterType = $parts[0]; // A o B
            $semesterRange = $parts[1]; // Febrero a Julio o Agosto a Enero
    
            $currentYear = Carbon::now()->year;
            $startDate = null;
            $endDate = null;
    
            if ($semesterType === 'A') {
                if ($semesterRange === 'Febrero a Julio') {
                    $startDate = Carbon::create($currentYear, 2, 1)->startOfMonth();
                    $endDate = Carbon::create($currentYear, 7, 31)->endOfMonth();
                }
            } elseif ($semesterType === 'B') {
                if ($semesterRange === 'Agosto a Enero') {
                    if (Carbon::now()->month < 8) {
                        $previousYear = $currentYear - 1;
                        $startDate = Carbon::create($previousYear, 8, 1)->startOfMonth();
                        $endDate = Carbon::create($currentYear, 1, 31)->endOfMonth();
                    } else {
                        $startDate = Carbon::create($currentYear, 8, 1)->startOfMonth();
                        $endDate = Carbon::create($currentYear + 1, 1, 31)->endOfMonth();
                    }
                }
            }
    
            if ($startDate && $endDate) {
                // Filtrar registros basados en las fechas y seleccionar las columnas requeridas
                $registros = Registro::where('created_at', '>=', $startDate)
                    ->where('created_at', '<=', $endDate)
                    ->select('created_at', 'nombre', 'cuenta', 'servicio', 'numero_equipo', 'licenciaturas', 'usuario', 'quejas_sugerencias')
                    ->get();
    
                $fechaActual = now()->format('Y-m-d');
                $nombreArchivo = 'Registros_' . $fechaActual . '.xlsx';
    
                // Descargar el archivo Excel usando el exportador 'RegistroExport'
                return Excel::download(new RegistroExport($registros), $nombreArchivo);
            }
        }
    
        // Manejar error si el valor del semestre no es válido
        // ...
    
        return redirect()->back()->with('error', 'Valor de semestre no válido');
    }
}
