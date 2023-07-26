<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cita;
use App\Models\CitaMotivo;
use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\Instruccion;
use App\Models\Ocupacion;
use App\Models\Parentezco;
use App\Models\TipoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        
        $genero = Genero::all();
        $estadocivil = Estadocivil::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
        $dni = $request->get('doc');
        $idPaciente = DB::SELECT('SELECT (COALESCE( MAX(p.id), 0 ) + 1) as idPac from pacientes p;');
        $idCita = DB::SELECT('SELECT (COALESCE( MAX(c.id), 0 ) + 1) as idCita from citas c;');
        $paciente = DB::SELECT('SELECT * from pacientes p WHERE p.dni = "'.$dni.'";');
        $estado = DB::SELECT('SELECT p.dni   
                              FROM pacientes p
                              WHERE p.dni = "'.$dni.'"');
        $tipoexamen = DB::SELECT('SELECT id, nombre FROM tipoexaminters');
        if ($estado == null) {
            return view('cita.createN', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion'));
        }else{
            return view('cita.createE', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'paciente', 'idCita', 'tipoexamen', 'fechaActual1'));
        }
    }

    public function examen(Request $request)
    {
        $genero = Genero::all();
        $parentezco = Parentezco::all();
        $estadocivil = Estadocivil::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
        $dni = $request->get('doc');
        $idPaciente = DB::SELECT('SELECT (COALESCE( MAX(p.id), 0 ) + 1) as idPac from pacientes p;');
        $idCita = DB::SELECT('SELECT (COALESCE( MAX(c.id), 0 ) + 1) as idCita from citas c;');
        $paciente  = DB::SELECT('SELECT * from pacientes p WHERE p.dni = "'.$dni.'";');
        $estado = DB::SELECT('SELECT p.dni   
                              FROM pacientes p
                              WHERE p.dni = "'.$dni.'"');
        $examInterno = DB::SELECT('SELECT id, nombre
                                    FROM tipoexaminters');
        if ($estado == null) {
            return view('cita.examenN', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco'));
        }else{
            return view('cita.examenE', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco', 'paciente', 'idCita', 'examInterno'));
        }
    }

    public function inicio(Request $request) 
    {   
        $genero = Genero::all();
        $parentezco = Parentezco::all();
        $estadocivil = Estadocivil::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
        $dni = $request->get('doc');
        $dato = $request->get('dato');
        $idPaciente = DB::SELECT('SELECT (COALESCE( MAX(p.id), 0 ) + 1) as idPac from pacientes p;');
        $idCita = DB::SELECT('SELECT (COALESCE( MAX(c.id), 0 ) + 1) as idCita from citas c;');
        $paciente  = DB::SELECT('SELECT * from pacientes p WHERE p.dni = "'.$dni.'";');
        $estado = DB::SELECT('SELECT p.dni, p.nombre, p.apellido   
                              FROM pacientes p
                              WHERE p.dni = "'.$dni.'" OR CONCAT(p.nombre, " ",p.apellido) = "'.$dato.'"');
        if ($estado == null) {
            return view('cita.createN', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco'));
        }else{
            return view('cita.createE', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco', 'paciente', 'idCita', 'estado'));
        }
    }

    public function comparar(Request $request)
    {
        $dni = $request->nombre;   
        $estado = DB::SELECT('SELECT p.dni, p.nombre, p.apellido   
                              FROM pacientes p
                              WHERE p.dni = "'.$dni.'" OR CONCAT(p.nombre, " ",p.apellido) = "'.$dni.'"');
        if ($estado == null) {
            $auxiliar = "0";
            return response()->json(['dni'=>$dni, 'auxiliar'=>$auxiliar]);
        }else{
            $auxiliar = "1";
            return response()->json(['dni'=>$dni, 'auxiliar'=>$auxiliar]);
        }
    }

    public function create(Request $request)
    {
        return view('cita.create');
    }

    public function createExiste($dato)
    {   
        $genero = Genero::all();
        $parentezco = Parentezco::all();
        $estadocivil = Estadocivil::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
        $idPaciente = DB::SELECT('SELECT (COALESCE( MAX(p.id), 0 ) + 1) as idPac from pacientes p;');
        $idCita = DB::SELECT('SELECT (COALESCE( MAX(c.id), 0 ) + 1) as idCita from citas c;');
        $paciente  = DB::SELECT('SELECT * from pacientes p WHERE p.dni = "'.$dato.'" OR CONCAT(p.nombre, " ",p.apellido) = "'.$dato.'"');
        $tipoexamen = DB::SELECT('SELECT id, nombre
                                  FROM tipoexaminters');
        return view('cita.createE', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco', 'paciente', 'idCita', 'tipoexamen'));
    }

    public function createnoExiste($dato)
    {
        $genero = Genero::all();
        $parentezco = Parentezco::all();
        $estadocivil = Estadocivil::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
     
        if(is_numeric($dato)) {
            $aux = "numero";
            return view('cita.createN', compact('genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco' , 'aux' ,'dato'));
        } else {
            $aux = "letra";
            $nombres = explode(" ", $dato);
            $cantPalabras = str_word_count($dato, 0);
            $apellido1 = $nombres[$cantPalabras-1];
            $apellido2 = $nombres[$cantPalabras-2];
            return view('cita.createN', compact('genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco' , 'aux' ,'dato', 'apellido1', 'apellido2'));
        }
    }

    public function store(Request $request)
    {
        $users_id = Auth::user()->id;
        $fechaActual = date('Y-m-d');
        $idMotivo=$request->idMotivo;

        if ($request->acompanante == null) {
            $idAcomp = null;
        }else{
            $acomid = DB::SELECT('SELECT id FROM acompañantes WHERE dni = "'.$request->acompanante.'"');
            $idAcomp = $acomid[0]->id;
        }

        $cita = new Cita();
        $cita->fecexp = $fechaActual;
        $cita->fecaten = $request->fecaten;
        $cita->estado = 'TRIAJE';
        $cita->motivo = "";
        $cita->tiempo = "00";
        $cita->horaten = $request->horaten;
        $cita->pacientes_id = $request->pacientes_id;
        $cita->acompañantes_id = $idAcomp;
        $cita->users_id = $users_id;
        if ($cita->save()) {
            $resultado = "Cita Creada";
            $cita_id = DB::SELECT('SELECT MAX(id) AS id FROM citas');
            for ($i=0; $i < count($idMotivo) ; $i++) { 
                $idLlenar=$idMotivo[$i];
                $citaMotivo = new CitaMotivo();
                $citaMotivo->citas_id = $cita_id[0]->id;
                $citaMotivo->tipoexaminters_id = $idMotivo[$i];
                $citaMotivo->save();
            }
        }else {
            $resultado = "Error en la Cita";
        }
       
      return response()->json(['resultado'=>$resultado]);
    }

    public function storeExamen(Request $request)
    {
        $users_id = Auth::user()->id;
        $fechaActual = date('Y-m-d');
    }

    public function show()
    {
        $cita = DB::SELECT('SELECT p.id AS pacientes_id, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.correo,
                                    c.id AS citas_id, c.fecaten, c.horaten, c.motivo, (LEFT(horaten,2) - DATE_FORMAT(NOW( ), "%h" )) AS difhora, c.tiempo 
                             FROM pacientes p
                             INNER JOIN citas c
                             ON c.pacientes_id = p.id
                             WHERE c.estado = "TRIAJE" OR c.estado = "CONSULTA"
                             ORDER BY CONCAT(c.horaten, " ", c.fecaten) 
                             DESC');
        return view('cita.show', compact('cita'));
    }

    public function update(Request $request)
    {
        $fechaActual = date('Y-m-d');
        $users_id = Auth::user()->id;
        $cita = Cita::where('id', '=', $request->get('idCitas'))->first();
        $cita->fecexp = $fechaActual;
        $cita->fecaten = $request->get('fechaActualizacion');
        $cita->estado = 'TRIAJE';
        $cita->motivo = $request->get('motivoActualizacion');
        $cita->tiempo = $request->get('tiempoActualizacion');
        $cita->horaten = $request->get('horaActualizacion');
        $cita->pacientes_id = $request->get('idPacientes');
        $cita->users_id = $users_id;
        $cita->save();
        return back();
    }

    public function exportPDF()
    {
        $citasPendientes = DB::SELECT('SELECT p.id as idPaciente, CONCAT(p.nombre, " ", p.apellido) as nombre, p.dni, p.telefono,
                                               c.id as idCita, c.fecaten, c.horaten, c.motivo
                                        FROM pacientes p, citas c
                                        WHERE c.pacientes_id = p.id AND c.estado = "CONSULTA"');
        // $pdf = PDF::loadview('cita.pdflit', compact('citasPendientes'));
        // return $pdf->download('Citas-Para-'.date('d/m/Y').'.pdf');
    }

    public function ticketPDF($id)
    {
        $fechaActual = date('Y-m-d');
        $idCitas = DB::SELECT('SELECT MAX(id) AS idCita FROM citas');
        $ticket = DB::SELECT('SELECT p.id as idPaciente, CONCAT(p.nombre, " ", p.apellido) as nombre, p.dni, p.telefono, p.lugarproc, p.direccion, p.telefono, p.correo, p.edad, p.lugarnac, 
                                      CONCAT(a.nombre," ",a.apellido) AS nomAco, a.dni AS dniAco, a.telefono AS telAco,
                                      c.id as idCita, c.fecaten, c.horaten, c.motivo
                               FROM pacientes p, citas c, acompañantes a
                               WHERE c.pacientes_id = p.id AND c.acompañantes_id = a.id AND (c.estado = "TRIAJE" OR c.estado = "EXAMEN") AND c.id = "'.$idCitas[0]->idCita.'"');
        // $pdf = PDF::loadview('cita.pdfTicketCita', compact('ticket')); 
        // return $pdf->download('Paciente-'.$ticket[0]->nombre.'.pdf');
    }

    public function ticket($id){
        $fechaActual = date('Y-m-d');
        $idCitas = DB::SELECT('SELECT MAX(id) AS idCita FROM citas');
        $ticket = DB::SELECT('SELECT p.id, p.apellido, p.nombre FROM pacientes p
                               INNER JOIN citas c ON c.pacientes_id = p.id
                               WHERE c.id  = "'.$idCitas[0]->idCita.'"');
                               
        $cita = DB::SELECT('SELECT c.fecaten, c.horaten, t.nombre AS motivo 
                             FROM citas c, cita_motivo cm, tipoexaminters t 
                             WHERE cm.citas_id = c.id AND cm.tipoexaminters_id = t.id AND c.id = "'.$idCitas[0]->idCita.'"');

        return view('reporte.ticketCita', compact('ticket', 'cita'));
    }

    public function acompanante (Request $request)
    {
        $codigo=$request->codigo;
        $resultado=0;
        $selector="search";
        $acompanante="";
        $telefonos = "";
        $id = "";
        
        $acom = DB::SELECT('SELECT id, CONCAT(nombre, " ", apellido) AS nombre, dni, telefono 
                             FROM acompañantes 
                             WHERE dni = "'.$codigo.'"');
        foreach($acom as $datos){
            $acompanante=$datos->nombre;
            $telefonos=$datos->telefono;
            $id=$datos->id;
            $resultado=1;
        }
        
        return response()->json(['codigo'=>$codigo,'resultado'=>$resultado,'selector'=>$selector,'acompanante'=>$acompanante, 'telefonos'=>$telefonos, 'id'=>$id]);         
    }

    public function Graficacantidad ()
    {
        return view('cita.cantidadcita');
    }

    public function verificarDNI(Request $request)
    {
        $dni = $request->dni;
        $pac = DB::SELECT('SELECT * FROM pacientes WHERE dni = "'.$dni.'"');
        
        if($pac == null)
        {
            $resp = 0;
        }else{
            $resp = 1;    
        }
        
        return response()->json(['resp'=>$resp]);
    }
}
