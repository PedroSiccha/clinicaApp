<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use App\Models\Instruccion;
use App\Models\Paciente;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente = DB::SELECT('SELECT p.id, CONCAT("pe.nombres", " ", "pe.apellidos") AS nombre, pe.doc, pe.telefono, p.email, pe.direccion   
                                 FROM pacientes p, personas pe, estadocivils e, instruccions i
                                 WHERE p.personas_id = pe.id AND p.estadocivils_id = e.id AND p.instruccions_id = i.id');
        
        return view('paciente.index', compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estCivil = EstadoCivil::all();
        $instruccion = Instruccion::all();
        $persona = DB::SELECT('SELECT MAX(id) AS id   
                               FROM personas');
        
        return view('paciente.create', compact('estCivil','instruccion','persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente();
        $paciente->lugarnac = $request->get('lugarnac');
        $paciente->lugarproc = $request->get('lugarproc');
        $paciente->email = $request->get('email');
        $paciente->personas_id = $request->get('personas_id');
        $paciente->estadocivils_id = $request->get('estadocivils_id');
        $paciente->instruccions_id = $request->get('instruccions_id');
        $paciente->save();

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
        return redirect('cita/create?doc='.$persona->doc.'');
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
