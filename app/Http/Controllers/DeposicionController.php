<?php

namespace App\Http\Controllers;

use App\Models\Deposicion;
use Illuminate\Http\Request;

class DeposicionController extends Controller
{
    public function store(Request $request)
    {
        $deposicion = new Deposicion();
        $deposicion->nombre = $request->get('nombre');
        $deposicion->save();
        return back();
    }

    public function crear(Request $request)
    {
        $deposicion = new Deposicion();
        $deposicion->nombre = $request->nombre;
        if ($deposicion->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $deposicion=Deposicion::get();
        
            return response()->json(["view"=>view('configmedico.deposicionTab',compact('deposicion'))->render(),'resultado'=>$resultado]);
        }   
    }

    public function editar(Request $request)
    {
        $deposicion = Deposicion::where('id', '=', $request->id)->first();
        $deposicion->nombre = $request->nombre;
        if ($deposicion->save()) {
            $resultado = "Todo Bien";
            $deposicion=Deposicion::get();

        return response()->json(["view"=>view('configmedico.deposicionTab',compact('deposicion'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $deposicion = Deposicion::where('id', '=', $request->id)->first();
        if ($deposicion->delete()) {
            $resultado = "Eliminado Correctamente";

           $deposicion=Deposicion::get();

            return response()->json(["view"=>view('configmedico.deposicionTab',compact('deposicion'))->render(),'resultado'=>$resultado]);
        }
    }
}
