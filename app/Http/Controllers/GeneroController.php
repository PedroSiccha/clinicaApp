<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneroController extends Controller
{
    public function store(Request $request)
    {
        $genero = new Genero();
        $genero->nombre = $request->nombre;
        if($genero->save()){
            $resultado = "Tratamiento registrado";
        }else{
            $resultado = "Error en registro";
        }
        return response()->json(['resultado'=>$resultado]);
    }

    public function guardar(Request $request)
    {
        $genero = new Genero();
        $genero->nombre = $request->get('nombre');
        if($genero->save()){
            return back();
        }
        
    }

    public function editar(Request $request)
    {
        $genero = Genero::where('id', '=', $request->id)->first();
        $genero->nombre = $request->nombre;
        if ($genero->save()) {
            $resultado = "Todo Bien";
            $genero=Genero::get();

        return response()->json(["view"=>view('configuracion.genTab',compact('genero'))->render(),'resultado'=>$resultado]);
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $genero = Genero::findorfail($id);
        $updateNow = $genero->update($input);
        return back();
    }

    public function eliminar(Request $request)
    {
        $gen = Genero::where('id', '=', $request->id)->first();
        if ($gen->delete()) {
            $resultado = "Eliminado Correctamente";

           $genero=Genero::get();

            return response()->json(["view"=>view('configuracion.genTab',compact('genero'))->render(),'resultado'=>$resultado]);
        }
    }
}
