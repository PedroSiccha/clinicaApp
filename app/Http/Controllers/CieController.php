<?php

namespace App\Http\Controllers;

use App\Models\Cie;
use Illuminate\Http\Request;

class CieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function crear(Request $request)
    {
        $cie = new Cie();
        $cie->codigo = $request->codigo;
        $cie->descripcion = $request->descripcion;
        $cie->tipocies_id = $request->tipocie;
        if ($cie->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $cie=Cie::get();
        
            return response()->json(["view"=>view('configmedico.cieTab',compact('cie'))->render(),'resultado'=>$resultado]);
        }
    }

    public function editar(Request $request)
    {
        $cie = Cie::where('id', '=', $request->id)->first();
        $cie->codigo = $request->codigo;
        $cie->descripcion = $request->descripcion;
        $cie->tipocies_id = $request->tipocie;
        if ($cie->save()) {
            $resultado = "Todo Bien";
            $cie=Cie::get();

        return response()->json(["view"=>view('configmedico.cieTab',compact('cie'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $cie = Cie::where('id', '=', $request->id)->first();
        if ($cie->delete()) {
            $resultado = "Eliminado Correctamente";

           $cie=Cie::get();

            return response()->json(["view"=>view('configmedico.cieTab',compact('cie'))->render(),'resultado'=>$resultado]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
