<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $observacion = new Observacion();
        $observacion->nombre = $request->nombre;
        $observacion->consultas_id = $request->consultas_id;
        
        if ($observacion->save()) {
            $resultado = "Observacion registrado";
        }else {
            $resultado = "Error en registro";
        }
        DB::statement(DB::raw('SET @rownumObs = 0'));

        $observacion = DB::SELECT('SELECT id, nombre, @rownumObs := @rownumObs + 1 AS Numeracion FROM observacions WHERE consultas_id = "'.$request->consultas_id.'"');
        
        return response()->json(["view"=>view('consulta.obs',compact('observacion'))->render(),'resultado'=>$resultado]);
    }

    public function eliminar(Request $request)
    {
        $obs=Observacion::where('id', '=', $request->idObs)->first();
        if ($obs->delete()) {
            $resultado = "Eliminado Correctamente";
            DB::statement(DB::raw('SET @rownumDiag = 0'));

            $observacion = DB::SELECT('SELECT nombre, @rownumObs := @rownumObs + 1 AS Numeracion FROM observacions WHERE consultas_id = "'.$request->consultas_id.'"');

            return response()->json(["view"=>view('consulta.obs',compact('observacion'))->render(),'resultado'=>$resultado]);
        }
    }
}
