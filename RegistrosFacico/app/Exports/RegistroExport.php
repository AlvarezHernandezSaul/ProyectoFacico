<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class RegistroExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $registros;

    public function __construct(Collection $registros)
    {
        $this->registros = $registros;
    }

    public function collection()
    {
        // Transformar el campo 'created_at' a solo la fecha en el formato deseado
        $transformedRegistros = $this->registros->map(function ($registro) {
            $registro->created_at = Carbon::parse($registro->created_at)->format('Y-m-d');
            return $registro;
        });

        return $transformedRegistros;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Cuenta',
            'Servicio',
            'Número de Equipo',
            'Licenciaturas',
            'Usuario',
            'Quejas y Sugerencias',
            'Fecha de Creación',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $this->registros->count() + 1;
        $tableRange = 'A1:H' . $lastRow;

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        // Set the background color for the headers (first row)
        $headerStyle = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '545454', // Gray color code
                ],
            ],
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'], // Font color will be white (FFFFFF)
            ],
        ];

        $sheet->getStyle('A1:H1')->applyFromArray($headerStyle); // Apply the style to the headers
        $sheet->getStyle($tableRange)->applyFromArray($styleArray); // Apply borders

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
