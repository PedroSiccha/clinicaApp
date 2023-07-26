<?php

namespace App\Http\Controllers;

use App\Models\Alergia;
use Illuminate\Http\Request;

class AlergiaController extends Controller
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

        $alergia = new Alergia();
        $alergia->nombre = $request->nomalergia;
        if ($alergia->save()) {
            $resultado = "Grado de Instrucción Registrada";
        }else {
            $resultado = "Error en registro";
        }
        $ale=Alergia::get();
        return response()->json(["view"=>view('triaje.alergia',compact('ale'))->render(),'resultado'=>$resultado]);
    }

    public function crear(Request $request)
    {

        $alergia = new Alergia();
        $alergia->nombre = $request->nombre;
        if ($alergia->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $alergia=Alergia::get();
        
            return response()->json(["view"=>view('configmedico.alergiaTab',compact('alergia'))->render(),'resultado'=>$resultado]);
        }   
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

    public function editar(Request $request)
    {
        $alergia = Alergia::where('id', '=', $request->id)->first();
        $alergia->nombre = $request->nombre;
        if ($alergia->save()) {
            $resultado = "Todo Bien";
            $alergia=Alergia::get();

        return response()->json(["view"=>view('configmedico.alergiaTab',compact('alergia'))->render(),'resultado'=>$resultado]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $alergia = Alergia::where('id', '=', $request->id)->first();
        if ($alergia->delete()) {
            $resultado = "Eliminado Correctamente";

           $alergia=Alergia::get();

            return response()->json(["view"=>view('configmedico.alergiaTab',compact('alergia'))->render(),'resultado'=>$resultado]);

        }
    }
}
