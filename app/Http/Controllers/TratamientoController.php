<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TratamientoController extends Controller
{
    public function store(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->indicacion = $request->indicaciones;
        $tratamiento->consultas_id = $request->consultas_id;
        $tratamiento->medicamentos_id = $request->medicamentos_id;
        $tratamiento->cantidad = $request->cantidad;
        $tratamiento->dosis = $request->dosis;
        $tratamiento->via = $request->via;
        $tratamiento->frecuencia = $request->frecuencia;
        $tratamiento->duracion = $request->duracion;
        
        if ($tratamiento->save()) {
            $resultado = "Tratamiento registrado";
        }else {
            $resultado = "Error en registro";
        }
 
        DB::statement(DB::raw('SET @rownumTrat = 0'));

        $recetaMedica = DB::SELECT('SELECT t.id AS tratamientos_id, t.indicacion, m.id AS medicamentos_id, m.nombre AS medicamento, @rownumTrat := @rownumTrat+ 1 AS Numeracion    
                                     FROM tratamientos t, medicamentos m
                                     WHERE t.medicamentos_id = m.id AND t.consultas_id = "'.$request->consultas_id.'"');
        
        return response()->json(["view"=>view('consulta.tratamiento',compact('recetaMedica'))->render(),'resultado'=>$resultado]);
    }

    public function eliminar(Request $request)
    {
        $trata=Tratamiento::where('id', '=', $request->idTra)->first();
        if ($trata->delete()) {
            $resultado = "Eliminado Correctamente";
            DB::statement(DB::raw('SET @rownumDiag = 0'));

            $recetaMedica = DB::SELECT('SELECT t.id AS tratamientos_id, t.indicacion, m.id AS medicamentos_id, m.nombre AS medicamento, @rownumTrat := @rownumTrat+ 1 AS Numeracion    
                                         FROM tratamientos t, medicamentos m
                                         WHERE t.medicamentos_id = m.id AND t.consultas_id = "'.$request->consultas_id.'"');

            return response()->json(["view"=>view('consulta.tratamiento',compact('recetaMedica'))->render(),'resultado'=>$resultado]);
        }
    }

    public function recetaPDF($id)
    {
        $fechaActual = date('Y-m-d');
        $receta = DB::SELECT('SELECT p.id AS pacientes_id, CONCAT(p.nombre, " ", p.apellido) AS Nombre, p.dni AS DNI, p.telefono AS Telefono, p.edad AS Edad,
                                      g.id AS generos_id, g.nombre AS Genero,
                                      co.id AS consultas_id, co.fecha AS FechaConsulta, co.hora AS HoraConsulta, co.estado AS EstadoConsulta, 
                                      t.id AS tratamientos_id, t.indicacion AS Indicacion,
                                      m.id AS medicamentos_id, m.nombre AS Medicamento
                               FROM tratamientos t
                               INNER JOIN medicamentos m
                               ON t.medicamentos_id = m.id
                               INNER JOIN consultas co
                               ON t.consultas_id = co.id
                               INNER JOIN citas c
                               ON co.citas_id = c.id
                               INNER JOIN pacientes p
                               ON c.pacientes_id = p.id
                               INNER JOIN generos g
                               ON p.generos_id = g.id
                               WHERE co.id = "'.$id.'"');
        // $pdf = PDF::loadview('tratamiento.pdfRecetaMedica', compact('receta'));
        // return $pdf->download('Receta-'.$receta[0]->Nombre.'.pdf');
    }
}
