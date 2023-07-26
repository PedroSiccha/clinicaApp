<?php

namespace App\Http\Controllers;

use App\Models\Ocupacion;
use Illuminate\Http\Request;

class OcupacionController extends Controller
{
    public function store(Request $request)
    { 
        $ocupacionA = new Ocupacion();
        $ocupacionA->nombre = $request->nombre;
        if ($ocupacionA->save()) {
            $resultado = "Ocupación Registrada";
        }else {
            $resultado = "Error en registro";
        }

        $ocupacion=Ocupacion::get();

        return response()->json(["view"=>view('cita.ocupacions',compact('ocupacion'))->render(),'resultado'=>$resultado]);
    }

    public function guardar(Request $request)
    { 

        $ocupacionA = new Ocupacion();
        $ocupacionA->nombre = $request->get('nombre');
        if ($ocupacionA->save()) {
            return back();
        }
    }

    public function editar(Request $request)
    {
        $ocupacion = Ocupacion::where('id', '=', $request->id)->first();
        $ocupacion->nombre = $request->nombre;
        if ($ocupacion->save()) {
            $resultado = "Todo Bien";
            $ocupacion=Ocupacion::get();

        return response()->json(["view"=>view('configuracion.ocuTab',compact('ocupacion'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $ocu = Ocupacion::where('id', '=', $request->id)->first();
        if ($ocu->delete()) {
            $resultado = "Eliminado Correctamente";

           $ocupacion=Ocupacion::get();

            return response()->json(["view"=>view('configuracion.ocuTab',compact('ocupacion'))->render(),'resultado'=>$resultado]);

        }
    }
}
