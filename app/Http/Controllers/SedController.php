<?php

namespace App\Http\Controllers;

use App\Models\Sed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SedController extends Controller
{
    public function store(Request $request)
    {
        $sed = new Sed();
        $sed->nombre = $request->get('nombre');
        $sed->save();
        return back();
    }

    public function crear(Request $request)
    {
        $sed_id = DB::SELECT('SELECT (MAX(id) +1) AS id FROM seds');

        $sed = new Sed();
        $sed->id = $sed_id[0]->id;
        $sed->nombre = $request->nombre;
        if ($sed->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $sed=Sed::get();
        
            return response()->json(["view"=>view('configmedico.sedTab',compact('sed'))->render(),'resultado'=>$resultado]);
        }
    }

    public function editar(Request $request)
    {
        $sed = Sed::where('id', '=', $request->id)->first();
        $sed->nombre = $request->nombre;
        if ($sed->save()) {
            $resultado = "Todo Bien";
            $sed=Sed::get();

        return response()->json(["view"=>view('configmedico.sedTab',compact('sed'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $sed = Sed::where('id', '=', $request->id)->first();
        if ($sed->delete()) {
            $resultado = "Eliminado Correctamente";

           $sed=Sed::get();

            return response()->json(["view"=>view('configmedico.sedTab',compact('sed'))->render(),'resultado'=>$resultado]);
        }
    }
}
