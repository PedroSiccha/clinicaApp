<?php

namespace App\Http\Controllers;

use App\Models\Apetito;
use Illuminate\Http\Request;

class ApetitoController extends Controller
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
        $apetito = new Apetito();
        $apetito->nombre = $request->get('nombre');
        $apetito->save();
        return back();
    }

    public function crear(Request $request)
    {
        $apetito = new Apetito();
        $apetito->nombre = $request->nombre;
        if ($apetito->save()) {
            $resultado = "Grado de Instrucción Registrada";
            $apetito=Apetito::get();
        
            return response()->json(["view"=>view('configmedico.apetitoTab',compact('apetito'))->render(),'resultado'=>$resultado]);
        }   
    }

    public function editar(Request $request)
    {
        $apetito = Apetito::where('id', '=', $request->id)->first();
        $apetito->nombre = $request->nombre;
        if ($apetito->save()) {
            $resultado = "Todo Bien";
            $apetito=Apetito::get();

        return response()->json(["view"=>view('configmedico.apetitoTab',compact('apetito'))->render(),'resultado'=>$resultado]);
        }
    }

    public function eliminar(Request $request)
    {
        $apetito = Apetito::where('id', '=', $request->id)->first();
        if ($apetito->delete()) {
            $resultado = "Eliminado Correctamente";

           $apetito=Apetito::get();

            return response()->json(["view"=>view('configmedico.apetitoTab',compact('apetito'))->render(),'resultado'=>$resultado]);

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
