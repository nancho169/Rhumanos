<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Fichada;
class ExcelController extends Controller
{

    public function exportar(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hola');
        $sheet->setCellValue('B1', 'Mundo!');

        $writer = new Xlsx($spreadsheet);
        
        $fileName = 'hola_mundo.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return Response::download($temp_file, $fileName);
    }

    public function relog(){
        return view('relog.index');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();
        /*foreach ($data as $row) {
            // Ajusta los índices de acuerdo a la estructura de tu archivo Excel
            Fichada::create([
                'id_usuario' => $row[0],
                'nombre' => $row[1],
                'fichada' => $row[2],
                'entrada' => $row[3],
                'salida' => $row[4],
                'descripcion' => $row[5]

            ]);
        }*/
        return view('relog.migra_archivo', compact('data'));
    }
}