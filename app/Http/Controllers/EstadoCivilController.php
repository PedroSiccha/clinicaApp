<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoCivilController extends Controller
{
    public function index()
    {
        $estadocivil = DB::SELECT('SELECT e.id, e.nombre FROM estadocivils e');
        return view('estadocivil.index', compact('estadocivil'));
    }

    public function store(Request $request)
    {
        $estadocivils = new Estadocivil();
        $estadocivils->nombre = $request->nombre;
        if($estadocivils->save()){
            $resultado = "Tratamiento registrado";
        }else{
            $resultado = "Error en registro";
        }
        $estadocivil=Estadocivil::get();
        return response()->json(["view"=>view('cita.estadocivils',compact('estadocivil'))->render(),'resultado'=>$resultado]);
    }

    public function guardar(Request $request)
    {
        $estadocivils = new Estadocivil();
        $estadocivils->nombre = $request->get('nombre');
        if($estadocivils->save()){
            return back();
        }
    }

    public function editar(Request $request)
    {
        $estCivil = Estadocivil::where('id', '=', $request->id)->first();
        $estCivil->nombre = $request->nombre;
        if ($estCivil->save()) {
            $resultado = "Todo Bien";
            $estadocivil=Estadocivil::get();

        return response()->json(["view"=>view('configuracion.estCivilTabla',compact('estadocivil'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $estCivil = Estadocivil::where('id', '=', $request->id)->first();
        if ($estCivil->delete()) {
            $resultado = "Eliminado Correctamente";

           $estadocivil=Estadocivil::get();

            return response()->json(["view"=>view('configuracion.estCivilTabla',compact('estadocivil'))->render(),'resultado'=>$resultado]);
        }
    }
}
