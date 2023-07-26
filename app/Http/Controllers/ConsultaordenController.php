<?php

namespace App\Http\Controllers;

use App\Models\ConsultaOrden;
use Illuminate\Http\Request;

class ConsultaordenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idExaExterno=$request->idExaExterno;
        
        for ($i=0; $i < count($idExaExterno) ; $i++) { 
            $idLlenar=$idExaExterno[$i];
            $exaExter = new ConsultaOrden();
            $exaExter->detalle = "";
            $exaExter->consultas_id = $request->consultas_id;
            $exaExter->ordenexam_id = $idAlergias[$i];
            $exaExter->tipoexamens_id = "";
            $exaExter->save();
            $resultado.='id: '.$idLlenar.' | ';
        }
        
        return response()->json(['resultado'=>$resultado]);

    }
}
