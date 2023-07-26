<?php

namespace App\Http\Controllers;

use App\Models\Acompaniante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcompanianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('personas_id');
        $acompañante = DB::SELECT('SELECT a.id, CONCAT("p.nombres"," ", "p.apellidos" ) as nombre, p.edad, p.doc, p.telefono, p.direccion, a.parentezco  
        FROM personas p, acompañantes a
        WHERE a.personas_id = p.id');
        return view('acompañante.index', compact('acompañante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acompañante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acompañante = new Acompaniante();
        $acompañante->nombre = $request->get('nombre');
        $acompañante->save();
        return redirect('acompañante');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acompañante = Acompaniante::find($id);
        return view('acompañante.edit', compact('acompañante'));
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
