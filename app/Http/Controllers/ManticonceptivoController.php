<?php

namespace App\Http\Controllers;

use App\Models\Manticonceptivo;
use Illuminate\Http\Request;

class ManticonceptivoController extends Controller
{
    public function store(Request $request)
    {
        $metodo = new Manticonceptivo();
        $metodo->nombre = $request->get('nombre');
        $metodo->save();
        return back();
    }

    public function crear(Request $request)
    {

        $metAnticonceptivo = new Manticonceptivo();
        $metAnticonceptivo->nombre = $request->nombre;
        if ($metAnticonceptivo->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $metodoanticonceptivo=Manticonceptivo::get();
        
            return response()->json(["view"=>view('configmedico.metAntiTab',compact('metodoanticonceptivo'))->render(),'resultado'=>$resultado]);
        }
    }

    public function editar(Request $request)
    {
        $metAnticonceptivo = Manticonceptivo::where('id', '=', $request->id)->first();
        $metAnticonceptivo->nombre = $request->nombre;
        if ($metAnticonceptivo->save()) {
            $resultado = "Todo Bien";
            $metodoanticonceptivo=Manticonceptivo::get();

        return response()->json(["view"=>view('configmedico.metAntiTab',compact('metodoanticonceptivo'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $metAnticonceptivo = Manticonceptivo::where('id', '=', $request->id)->first();
        if ($metAnticonceptivo->delete()) {
            $resultado = "Eliminado Correctamente";

           $metodoanticonceptivo=Manticonceptivo::get();

            return response()->json(["view"=>view('configmedico.metAntiTab',compact('metodoanticonceptivo'))->render(),'resultado'=>$resultado]);
        }
    }
}
