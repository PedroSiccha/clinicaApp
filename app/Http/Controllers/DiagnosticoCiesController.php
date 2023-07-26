<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticoCie;
use App\Models\DiagnosticoCies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosticoCiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codigo=$request->codigo;
        DB::statement(DB::raw('SET @rownumDiag = 0'));
        $cie = DB::SELECT("SELECT id, codigo, descripcion, @rownumDiag := @rownumDiag + 1 AS Numeracion
                            FROM cies where codigo='".$codigo."'; " );
        $diagnostico = new DiagnosticoCie();
        $diagnostico->cies_id = $cie[0]->id;
        $diagnostico->consultas_id = $request->consulta;
        
        if($diagnostico->save()){
            $resultado = 'Diagnostico Guardado';
            return response()->json(['codigo'=>$codigo,'resultado'=>$resultado]);
        }else{
            $resultado = 'Sin Diagnostico';
            return response()->json(['codigo'=>$codigo,'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $ciecon=DiagnosticoCies::where('id', '=', $request->idDia)->first();
        if ($ciecon->delete()) {
            $resultado = "Eliminado Correctamente";
            DB::statement(DB::raw('SET @rownumDiag = 0'));

            $diagnostico=DB::SELECT('SELECT c.id AS idCies, c.codigo AS Codigo, c.descripcion AS Descripcion, co.id AS idConsultas, dc.id AS idCieConsulta , @rownumDiag := @rownumDiag + 1 AS Numeracion
            FROM diagnostico_cies dc, cies c, consultas co
            WHERE dc.cies_id = c.id AND dc.consultas_id = co.id AND co.id = "'.$request->consulta.'"');

            return response()->json(["view"=>view('consulta.diagcie',compact('diagnostico'))->render(),'resultado'=>$resultado]);
        }
    }
}
