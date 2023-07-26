<?php

namespace App\Http\Controllers;

use App\Models\Instruccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstruccionController extends Controller
{
    public function store(Request $request)
    {
        $instruccions = new Instruccion();
        $instruccions->nombre = $request->nombre;
        if ($instruccions->save()) {
            $resultado = "Grado de Instrucción Registrada";
        }else {
            $resultado = "Error en registro";
        }

        $instruccion=Instruccion::get();

        return response()->json(["view"=>view('cita.instruccions',compact('instruccion'))->render(),'resultado'=>$resultado]);
    }

    public function guardar(Request $request)
    {
        $instruccions = new Instruccion();
        $instruccions->nombre = $request->get('nombre');
        if ($instruccions->save()) {
            return back();
        }
    }

    public function editar(Request $request)
    {
        $instruccion = Instruccion::where('id', '=', $request->id)->first();
        $instruccion->nombre = $request->nombre;
        if ($instruccion->save()) {
            $resultado = "Todo Bien";
            $instruccion=Instruccion::get();

        return response()->json(["view"=>view('configuracion.instTab',compact('instruccion'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $inst = Instruccion::where('id', '=', $request->id)->first();
        if ($inst->delete()) {
            $resultado = "Eliminado Correctamente";

           $instruccion=Instruccion::get();

            return response()->json(["view"=>view('configuracion.instTab',compact('instruccion'))->render(),'resultado'=>$resultado]);

        }
    }
}
