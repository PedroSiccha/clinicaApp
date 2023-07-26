<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index()
    {
        return view("pdf.listaPacientes");
    }

    public function crearPDF($datos, $vistaurl, $tipo)
    {
        $data = $datos;
        $date = date('Y-m-d'); 
        // $view = \View::make($vistaurl, compact('data', 'date'))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);

        // if($tipo==1){
        //     return $pdf->stream('reporte');
        // }
        // if($tipo==2){
        //     return $pdf->download('reporte.pdf');
        // }
    }

    public function crear_reporte_porpaciente($tipo){
        $vistaurl = "pdf.reporte_por_paciente";
        $pacientes = Paciente::all();
        return $this->crearPDF($pacientes, $vistaurl, $tipo);
    }
}
