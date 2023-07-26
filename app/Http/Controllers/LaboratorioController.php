<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lab = new Laboratorio();
        $lab->nombre = $request->get('nombre');
        $lab->direccion = $request->get('direccion');
        $lab->telefono = $request->get('telefono');
        $lab->correo = $request->get('correo');
        $lab->ruc = $request->get('ruc');
        $lab->save();
        return back();
    }
    
    public function crear(Request $request)
    {
        $laboratorio = new Laboratorio();
        $laboratorio->nombre = $request->nombre;
        $laboratorio->ruc = $request->ruc;
        $laboratorio->direccion = $request->direccion;
        $laboratorio->telefono = $request->telefono;
        $laboratorio->correo = $request->correo;
        if ($laboratorio->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $laboratorio=Laboratorio::get();
        
            return response()->json(["view"=>view('configmedico.laboratorioTab',compact('laboratorio'))->render(),'resultado'=>$resultado]);
        }
    }

    public function editar(Request $request)
    {
        $laboratorio = Laboratorio::where('id', '=', $request->id)->first();
        $laboratorio->nombre = $request->nombre;
        $laboratorio->ruc = $request->ruc;
        $laboratorio->direccion = $request->dir;
        $laboratorio->telefono = $request->tel;
        $laboratorio->correo = $request->cor;
        if ($laboratorio->save()) {
            $resultado = "Todo Bien";
            $laboratorio=Laboratorio::get();

        return response()->json(["view"=>view('configmedico.laboratorioTab',compact('laboratorio'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $laboratorio = Laboratorio::where('id', '=', $request->id)->first();
        if ($laboratorio->delete()) {
            $resultado = "Eliminado Correctamente";

           $laboratorio=Laboratorio::get();

            return response()->json(["view"=>view('configmedico.laboratorioTab',compact('laboratorio'))->render(),'resultado'=>$resultado]);
        }
    }
}
