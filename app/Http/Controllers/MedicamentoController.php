<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function crear(Request $request)
    {
        $med = new Medicamento();
        $med->nombre = $request->nombre;
        $med->concentracion = $request->concentracion;
        $med->presentacion = $request->presentacion;
        if ($med->save()) {
            $resultado = "Medicamento Registrado";
            $medicamentos = Medicamento::get();
        
            return response()->json(["view"=>view('configmedico.medicamentoTab',compact('medicamentos'))->render(),'resultado'=>$resultado]);
        }
    }

    public function editar(Request $request)
    {
        $med = Medicamento::where('id', '=', $request->id)->first();
        $med->nombre = $request->nombre;
        $med->concentracion = $request->concentracion;
        $med->presentacion = $request->presentacion;
        if ($med->save()) {
            $resultado = "Todo Bien";
            $medicamentos = Medicamento::get();

        return response()->json(["view"=>view('configmedico.medicamentoTab',compact('medicamentos'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $medicamento = Medicamento::where('id', '=', $request->id)->first();
        if ($medicamento->delete()) {
            $resultado = "Eliminado Correctamente";

           $medicamentos = Medicamento::get();

            return response()->json(["view"=>view('configmedico.medicamentoTab',compact('medicamentos'))->render(),'resultado'=>$resultado]);
        }
    }
}
