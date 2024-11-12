<?php

namespace App\Services;

use App\Models\Coach;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CoachStatisticsService
{
    public function exportCoachesStatistics()
    {
        // Pobierz wszystkich trenerów z ich przypisanymi szkołami
        $coaches = Coach::with('schools')->get();

        // Utwórz nowy arkusz
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ustaw nagłówki
        $sheet->setCellValue('A1', 'Imię');
        $sheet->setCellValue('B1', 'Nazwisko');
        $sheet->setCellValue('C1', 'PESEL');
        $sheet->setCellValue('D1', 'Licencja');
        $sheet->setCellValue('E1', 'Nazwa szkoły');
        $sheet->setCellValue('F1', 'Adres');
        $sheet->setCellValue('G1', 'Kod');
        $sheet->setCellValue('H1', 'Miejscowość');
        $sheet->setCellValue('I1', 'Województwo');
        $sheet->setCellValue('J1', 'Terminy treningów');

        // Wypełnij danymi
        $row = 2;
        foreach ($coaches as $coach) {
            foreach ($coach->schools as $school) {
                $sheet->setCellValue('A' . $row, $coach->name);
                $sheet->setCellValue('B' . $row, $coach->last_name);
                $sheet->setCellValue('C' . $row, $coach->pesel);
                $sheet->setCellValue('D' . $row, $coach->license);
                $sheet->setCellValue('E' . $row, $school->name);
                $sheet->setCellValue('F' . $row, $school->address);
                $sheet->setCellValue('G' . $row, $school->postal_code);
                $sheet->setCellValue('H' . $row, $school->city);
                $sheet->setCellValue('I' . $row, $coach->voivodeship->name);
                $sheet->setCellValue('J' . $row, $school->schedule);
                $row++;
            }
        }

        // Dostosuj szerokość kolumn
        foreach (range('A', 'J') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Stylizacja nagłówków
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'E0E0E0',
                ],
            ],
        ];
        $sheet->getStyle('A1:I1')->applyFromArray($headerStyle);

        // Przygotuj response
        $fileName = 'zestawienie_trenerów_' . date('Y-m-d') . '.xlsx';

        return new StreamedResponse(
            function () use ($spreadsheet) {
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ]
        );
    }
}
