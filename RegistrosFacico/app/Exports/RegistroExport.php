<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RegistroExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $registros;

    /**
     * Crea una nueva instancia del exportador de registros.
     *
     * @param \Illuminate\Support\Collection $registros
     */
    public function __construct(Collection $registros)
    {
        $this->registros = $registros;
    }

    /**
     * Devuelve la colección de registros para exportar.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->registros;
    }

    /**
     * Define los encabezados de las columnas del archivo exportado.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Fecha de Registro',
            'Hora de Registro', 
            'Nombre',
            'Cuenta',
            'Servicio',
            'Número de Equipo',
            'Licenciaturas',
            'Usuario',
            'Quejas y Sugerencias',
        ];
    }

    /**
     * Aplica estilos al archivo exportado, como bordes y colores de fondo.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        $lastRow = $this->registros->count() + 1;
        $tableRange = 'A1:I' . $lastRow;

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        // Estilo para el fondo y el texto de las cabeceras (primera fila)
        $headerStyle = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '545454', // Código de color gris
                ],
            ],
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'], // El color del texto será blanco (FFFFFF)
            ],
        ];

        $sheet->getStyle('A1:I1')->applyFromArray($headerStyle); // Aplica el estilo a las cabeceras
        $sheet->getStyle($tableRange)->applyFromArray($styleArray); // Aplica los bordes

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
