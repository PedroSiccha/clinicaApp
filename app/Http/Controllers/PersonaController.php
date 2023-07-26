<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = DB::SELECT('SELECT p.apellidos, p.nombres, p.fecnac, p.edad, p.tipodoc, p.doc, p.telefono, p.direccion, g.nombre   
                                FROM personas p, generos g
                                WHERE p.generos_id = g.id');
        
        return view('persona.index', compact('persona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genero::all();
        $dni = DB::SELECT('SELECT MAX(id)   
                           FROM personas');
        
        return view('persona.create', compact('genero'));
    }

    public function createAcom()
    {
        $genero = Genero::all();   
        return view('persona.crearAcompañante',compact('genero'));
    }

    public function createEmp()
    {
        $genero = Genero::all();
        return view('persona.create', compact('genero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $dni = DB::SELECT('SELECT MAX(id)   
                          FROM personas');
        
        $persona = new Persona();
        $persona->apellidos = $request->get('apellidos');
        $persona->nombres = $request->get('nombres');
        $persona->fecnac = $request->get('fecnac');
        $persona->edad = $request->get('edad');
        $persona->tipodoc = $request->get('tipodoc');
        $persona->doc = $request->get('doc');
        $persona->telefono = $request->get('telefono');
        $persona->direccion = $request->get('direccion');
        $persona->generos_id = $request->get('generos_id');
        $persona->save();
        return view('cita/create');
    }

    public function storeAcompaniante(Request $request)
    {
        $persona = new Persona();
        $persona->apellidos = $request->get('apellidos');
        $persona->nombres = $request->get('nombres');
        $persona->fecnac = $request->get('fecnac');
        $persona->edad = $request->get('edad');
        $persona->tipodoc = $request->get('tipodoc');
        $persona->doc = $request->get('doc');
        $persona->telefono = $request->get('telefono');
        $persona->direccion = $request->get('direccion');
        $persona->generos_id = $request->get('generos_id');
        $persona->save();
        return redirect('acompañante/create');
    }

    public function storeEmpleado(Request $request)
    {   
        $persona = new Persona();
        $persona->apellidos = $request->get('apellidos');
        $persona->nombres = $request->get('nombres');
        $persona->fecnac = $request->get('fecnac');
        $persona->edad = $request->get('edad');
        $persona->tipodoc = $request->get('tipodoc');
        $persona->doc = $request->get('doc');
        $persona->telefono = $request->get('telefono');
        $persona->direccion = $request->get('direccion');
        $persona->generos_id = $request->get('generos_id');
        $persona->save();
        return redirect('empleado/create');
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
