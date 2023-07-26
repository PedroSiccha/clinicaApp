<?php

namespace App\Http\Controllers;

use App\Models\Orina;
use Illuminate\Http\Request;

class OrinaController extends Controller
{
    public function store(Request $request)
    {
        $orina = new Orina();
        $orina->nombre = $request->get('nombre');
        $orina->save();
        return back();
    }
    public function crear(Request $request)
    {
        $orina = new Orina();
        $orina->nombre = $request->nombre;
        if ($orina->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $orina=Orina::get();
        
            return response()->json(["view"=>view('configmedico.orinaTab',compact('orina'))->render(),'resultado'=>$resultado]);
        }   
    }

    public function editar(Request $request)
    {
        $orina = Orina::where('id', '=', $request->id)->first();
        $orina->nombre = $request->nombre;
        if ($orina->save()) {
            $resultado = "Todo Bien";
            $orina=Orina::get();

        return response()->json(["view"=>view('configmedico.orinaTab',compact('orina'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $orina = Orina::where('id', '=', $request->id)->first();
        if ($orina->delete()) {
            $resultado = "Eliminado Correctamente";

           $orina=Orina::get();

            return response()->json(["view"=>view('configmedico.orinaTab',compact('orina'))->render(),'resultado'=>$resultado]);
        }
    }
}
