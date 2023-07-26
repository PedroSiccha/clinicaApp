<?php

namespace App\Http\Controllers;

use App\Models\ConsultaOrden;
use App\Models\Ordenexam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    public function store(Request $request)
    {
        $resultado = "";
        $idorden = "";
       
        $orden = new Ordenexam();
        $orden->descripcion = $request->descripcion;
        $orden->fecha = $request->fecha;
        $orden->laboratorios_id = $request->laboratorios_id;

        if ($orden->save()) {
            $ordenExam = DB::SELECT('SELECT MAX(id) AS id FROM ordenexam');
            $idorden = $ordenExam[0]->id;

            $consultaOrden = new ConsultaOrden();
            $consultaOrden->detalle = $request->medico;
            $consultaOrden->consultas_id = $request->idconsultas;
            $consultaOrden->ordenexam_id = $idorden;
            $consultaOrden->tipoexamens_id = $request->idtipoexamen;
            if ($consultaOrden->save()) {
                $resultado = "Orden de Consulta Emitida Satisfactoriamente";
                return response()->json(['resultado'=>$resultado, 'idorden'=>$idorden]);
            }else{
                $resultado = "Sin detalle de Orden";
                return response()->json(['resultado'=>$resultado, 'idorden'=>$idorden]);
            }

        }else {
            $resultado = "Error en registro";
            return response()->json(['resultado'=>$resultado, 'idorden'=>$idorden]);
        }
    }

    public function emitirPDF()
    {
        $idOrden = DB::SELECT('SELECT MAX(id) AS id FROM ordenexam');
        $orden = DB::SELECT('SELECT p.id, p.nombre, p.apellido, p.edad, o.id AS ordenId, o.descripcion, e.nombre AS examen 
                              FROM pacientes p, citas c, consultas co, ordenexam o, exaexterno_ordenexam eo, examenexterno e
                              WHERE c.pacientes_id = p.id AND co.citas_id = c.id AND o.consultas_id = co.id AND eo.ordenexam_id = o.id AND eo.examenexterno_id = e.id AND o.id = "'.$idOrden[0]->id.'"');

        // $pdf = PDF::loadview('orden.pdfemitir', compact('orden'));
        // return $pdf->download('OrdenExamen-'.$orden[0]->nombre.'.pdf');
    }

    public function ticket($id){

        $idOrden = DB::SELECT('SELECT MAX(id) AS id FROM ordenexam');
        $orden = DB::SELECT('SELECT p.id, p.nombre, p.apellido, p.edad, o.id AS ordenId, o.descripcion, e.nombre AS examen 
                              FROM pacientes p, citas c, consultas co, ordenexam o, exaexterno_ordenexam eo, examenexterno e
                              WHERE c.pacientes_id = p.id AND co.citas_id = c.id AND o.consultas_id = co.id AND eo.ordenexam_id = o.id AND eo.examenexterno_id = e.id AND o.id = "'.$idOrden[0]->id.'"');

        return view('reporte.ticketLaboratorio', compact('orden'));
    }
}
