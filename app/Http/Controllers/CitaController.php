<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cita;
use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\Instruccion;
use App\Models\TipoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $genero = Genero::all();
        $estadocivil = EstadoCivil::all();
        $instruccion = Instruccion::all();
        $pacientes = DB::SELECT('SELECT p.id, CONCAT(pe.nombres, " ", pe.apellidos) AS nombre   
                                 FROM pacientes p, personas pe
                                 WHERE p.personas_id = pe.id');

        $cita = DB::SELECT('SELECT c.id, CONCAT(pe.nombres, " ", pe.apellidos) AS nombres, c.fechaaten , a.nombre  
                             FROM citas c
                             LEFT JOIN pacientes p
                             ON c.pacientes_id = p.id
                             INNER JOIN personas pe
                             ON p.personas_id = pe.id
                             INNER JOIN areas a
                             ON c.areas_id = a.id;');
        
        return view('cita.index', compact('cita','areas','pacientes', 'genero', 'estadocivil', 'instruccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipopago = TipoPago::all();
       
        $dni = $request->get('doc');
        $genero = Genero::all();
        $estadocivil = Estadocivil::all();
        $instruccion = Instruccion::all();
        $especialidad = Area::all();
        $idPersona = DB::SELECT('SELECT (COALESCE( MAX(p.id), 0 ) + 1) as idPer from personas p;');
        $dni2 = DB::SELECT('SELECT pe.doc   
                            FROM pacientes p, personas pe
                            WHERE p.personas_id = pe.id AND pe.doc = "'.$dni.'"');
        $pac = DB::SELECT('SELECT *   
                           FROM pacientes p, personas pe
                           WHERE p.personas_id = pe.id AND pe.doc = "'.$dni.'"');
        
        return view('cita.create', compact('paciente','pac','dni','genero','dni2','estadocivil','instruccion','especialidad','idPersona','tipopago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita = new Cita();
        $cita->fechaexp = $request->get('fechaexp');
        $cita->fechaaten = $request->get('fechaaten');
        $cita->areas_id = $request->get('areas_id');
        $cita->pacientes_id = $request->get('pacientes_id');
        $cita->horatenc = $request->get('horatenc');
        $cita->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tipopago = TipoPago::all();
        $citaDisp = DB::SELECT('SELECT c.id, CONCAT(pe.nombres," ",pe.apellidos) as nombre, pe.edad as edad, a.nombre as especialidad, c.fechaaten as fecAten, c.horatenc as horaAten, CONCAT(c.fechaaten," ",c.horatenc) AS OrdenHora
                                 FROM citas c 
                                 INNER JOIN pacientes p
                                 ON c.pacientes_id = p.id
                                 INNER JOIN areas a
                                 ON c.areas_id = a.id
                                 INNER JOIN personas pe 
                                 ON p.personas_id = pe.id
                                 RIGHT JOIN comprobantes co
                                 ON c.id = co.citas_id
                                 ORDER BY OrdenHora ASC;');
        return view('/cita/show', compact('citaDisp','tipopago'));
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
