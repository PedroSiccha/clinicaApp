<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\Instruccion;
use App\Models\Ocupacion;
use App\Models\Paciente;
use App\Models\Parentezco;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index()
    {
        $ocupacion = DB::SELECT('SELECT id, nombre FROM ocupacions');
        $instruccion = DB::SELECT('SELECT id, nombre FROM instruccions');
        $estadocivil = DB::SELECT('SELECT id, nombre FROM estadocivils');
        $genero = DB::SELECT('SELECT id, nombre FROM generos');
        $paciente = DB::SELECT('SELECT p.id AS id, p.nombre AS nom, p.apellido AS ape, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.lugarnac, p.lugarproc, p.correo, p.fecnac, p.edad, 
                                        o.id AS ocupacions_id, o.nombre AS ocupacion,
                                        i.id AS instruccions_id, i.nombre AS instruccion,
                                        ec.id AS estadocivils_id, ec.nombre AS estadocivil,
                                        g.id AS generos_id, g.nombre AS genero
                                 FROM pacientes p
                                 INNER JOIN ocupacions o
                                 ON p.ocupacions_id = o.id
                                 INNER JOIN instruccions i
                                 ON p.instruccions_id = i.id
                                 INNER JOIN estadocivils ec
                                 ON p.estadocivils_id = ec.id
                                 INNER JOIN generos g
                                 ON p.generos_id = g.id
                                 ORDER BY p.id');
        return view('paciente.index', compact('paciente', 'ocupacion', 'instruccion', 'estadocivil', 'genero'));
    }

    public function store(Request $request)
    {
        $fechaInicial = $request->get('fecnac');
        $fechaActual = date('Y-m-d'); // la fecha del ordenador
        $diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
        $anio = floor($diff / (365*60*60*24));
        $edad = intval($anio*1);

        $paciente = new Paciente();
        $paciente->nombre = $request->get('nombres');
        $paciente->apellido = $request->get('apellidos');
        $paciente->dni = $request->get('doc');
        $paciente->telefono = $request->get('telefono');
        $paciente->lugarnac = $request->get('lugarnac');
        $paciente->lugarproc = $request->get('lugarproc');
        $paciente->correo = $request->get('email');
        $paciente->fecnac = $request->get('fecnac');
        $paciente->direccion = $request->get('direccion');
        $paciente->edad = $edad;
        $paciente->ocupacions_id = $request->get('ocupacions_id');
        $paciente->instruccions_id = $request->get('instruccions_id');
        $paciente->estadocivils_id = $request->get('estadocivils_id');
        $paciente->generos_id = $request->get('generos_id');
        if ($paciente->save()) {
            $paciente_id = DB::SELECT('SELECT MAX(id) AS id FROM pacientes');

            $genero = Genero::all();
            $parentezco = Parentezco::all();
            $estadocivil = Estadocivil::all();
            $instruccion = Instruccion::all();
            $ocupacion = Ocupacion::all();
    
            $idPaciente = DB::SELECT('SELECT (COALESCE( MAX(p.id), 0 ) + 1) as idPac from pacientes p;');
            $idCita = DB::SELECT('SELECT (COALESCE( MAX(c.id), 0 ) + 1) as idCita from citas c;');
            $paciente  = DB::SELECT('SELECT * from pacientes p WHERE p.id = "'.$paciente_id[0]->id.'"');
            $tipoexamen = DB::SELECT('SELECT id, nombre
                                        FROM tipoexaminters');
            
            return view('cita.createE', compact('idPaciente', 'genero', 'estadocivil', 'instruccion', 'ocupacion', 'parentezco', 'paciente', 'idCita', 'tipoexamen'));
        }
        return back();
    }

    public function show($id)
    {
        $datosPersonales = DB::SELECT('SELECT CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.lugarnac, p.lugarproc, p.correo, p.fecnac, p.edad, o.nombre AS ocupacion, i.nombre AS instruccion, ec.nombre AS estadocivil, g.nombre AS genero 
                                        FROM pacientes p, ocupacions o, instruccions i, estadocivils ec, generos g
                                        WHERE p.ocupacions_id = o.id AND p.instruccions_id = i.id AND p.estadocivils_id = ec.id AND p.generos_id = g.id AND p.id = "'.$id.'"');

        $datosAcompanante = DB::SELECT('SELECT CONCAT(a.nombre, " ", a.apellido) AS nombre, a.dni, a.telefono, a.correo, a.direccion, a.fecnac, a.edad, a.parentezco, g.nombre AS genero 
                                         FROM citas c, pacientes p, acompañantes a, generos g
                                         WHERE a.generos_id = g.id AND c.pacientes_id = p.id AND c.acompañantes_id = a.id AND p.id = "'.$id.'" group by a.id');

        $resumenConsulta = DB::SELECT('SELECT c.fecha AS FechaConsulta, cie.descripcion AS Diagnostico, c.estado FROM consultas c INNER JOIN citas ci ON c.citas_id = ci.id INNER JOIN pacientes p ON ci.pacientes_id = p.id LEFT JOIN diagnostico_cies dc ON dc.consultas_id = c.id LEFT JOIN cies cie ON dc.cies_id = cie.id
                                        WHERE p.id = "'.$id.'"');

        $resumenExamen = DB::SELECT('SELECT co.fecha AS FechaConsulta, o.descripcion AS Medico, r.nombre AS Resultado, r.ruta AS Documento 
                                      FROM citas c, consultas co, ordenexam o, resultadoexamen r
                                      WHERE co.citas_id = c.id AND o.consultas_id = co.id AND r.ordenexam_id = o.id AND c.pacientes_id ="'.$id.'"');

        return view('paciente.show', compact('datosPersonales', 'datosAcompanante', 'resumenConsulta', 'resumenExamen'));
    }

    public function edit(Request $request)
    {
        $fechaInicial = $request->fecnac;
        $fechaActual = date('Y-m-d'); // la fecha del ordenador
        $diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
        $anio = floor($diff / (365*60*60*24));
        $edad = intval($anio*1);

        $pac=Paciente::where('id', '=', $request->idPaciente)->first();
        
        $pac->nombre = $request->nombre;
        $pac->apellido = $request->apellido;
        $pac->dni = $request->dni;
        $pac->telefono = $request->telefono;
        $pac->direccion = $request->direccion;
        $pac->lugarnac = $request->lugarnac;
        $pac->lugarproc = $request->lugarproc;
        $pac->correo = $request->correo;
        $pac->fecnac = $request->fecnac;
        $pac->edad = $edad;
        $pac->ocupacions_id = $request->ocu;
        $pac->instruccions_id = $request->inst;
        $pac->estadocivils_id = $request->eci;
        $pac->generos_id = $request->gnero;
        if ($pac->save()) {
            $resultado = "TOdo Bien";
        }

        $paciente = DB::SELECT('SELECT p.id AS id, p.nombre AS nom, p.apellido AS ape, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.lugarnac, p.lugarproc, p.correo, p.fecnac, p.edad, 
                                        o.id AS ocupacions_id, o.nombre AS ocupacion,
                                        i.id AS instruccions_id, i.nombre AS instruccion,
                                        ec.id AS estadocivils_id, ec.nombre AS estadocivil,
                                        g.id AS generos_id, g.nombre AS genero
                                 FROM pacientes p
                                 INNER JOIN ocupacions o
                                 ON p.ocupacions_id = o.id
                                 INNER JOIN instruccions i
                                 ON p.instruccions_id = i.id
                                 INNER JOIN estadocivils ec
                                 ON p.estadocivils_id = ec.id
                                 INNER JOIN generos g
                                 ON p.generos_id = g.id
                                 ORDER BY p.id');

        return response()->json(["view"=>view('paciente.listPaciente',compact('paciente'))->render(),'resultado'=>$resultado]);
    }

    public function eliminar(Request $request)
    {
        $pac=Paciente::where('id', '=', $request->idPac)->first();
        if ($pac->delete()) {
            $resultado = "Eliminado Correctamente";
            DB::statement(DB::raw('SET @rownumDiag = 0'));

            $paciente = DB::SELECT('SELECT p.id AS id, p.nombre AS nom, p.apellido AS ape, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.lugarnac, p.lugarproc, p.correo, p.fecnac, p.edad, 
                                        o.id AS ocupacions_id, o.nombre AS ocupacion,
                                        i.id AS instruccions_id, i.nombre AS instruccion,
                                        ec.id AS estadocivils_id, ec.nombre AS estadocivil,
                                        g.id AS generos_id, g.nombre AS genero
                                 FROM pacientes p
                                 INNER JOIN ocupacions o
                                 ON p.ocupacions_id = o.id
                                 INNER JOIN instruccions i
                                 ON p.instruccions_id = i.id
                                 INNER JOIN estadocivils ec
                                 ON p.estadocivils_id = ec.id
                                 INNER JOIN generos g
                                 ON p.generos_id = g.id
                                 ORDER BY p.id');

            return response()->json(["view"=>view('paciente.listPaciente',compact('paciente'))->render(),'resultado'=>$resultado]);
        }
    }

    public function pdf()
    {
        return view("paciente.pdf");
    }

    public function crearPDF($datos, $vistaurl, $tipo)
    {
        $data = $datos;
        $date = date('Y-m-d'); 
        // $view = \View::make($vistaurl, compact('data', 'date'))->render();
        // $pdf = \ClinicaSystem::make('dompdf.wrapper');
        // $pdf->loadHTML($view);

        // if($tipo==1){
        //     return $pdf->stream('reporte');
        // }
        // if($tipo==2){
        //     return $pdf->download('reporte.pdf');
        // }
    }

    public function crear_reporte_porpaciente(){
        $vistaurl = "pdf.reporte_por_paciente";
        $pacientes = Paciente::all();
        // return $this->crearPDF($pacientes, $vistaurl);
    }

    public function historiaClinica($id)
    {
        $paciente = DB::SELECT('SELECT p.id, p.nombre, p.apellido, p.fecnac, p.edad, g.nombre AS genero, p.dni, p.lugarnac, p.lugarproc, ec.nombre AS estadocivil, i.nombre AS instruccion, o.nombre AS ocupacion, p.telefono, p.direccion, p.correo
                                 FROM pacientes p, generos g, estadocivils ec, instruccions i, ocupacions o
                                 WHERE p.generos_id = g.id AND p.estadocivils_id = ec.id AND p.instruccions_id = i.id AND p.ocupacions_id = o.id AND p.id = "'.$id.'"');
                                 
        $acompanate = DB::SELECT('SELECT a.nombre, a.apellido, a.parentezco, a.dni, a.telefono 
                                    FROM citas c, acompañantes a 
                                    WHERE c.acompañantes_id = a.id AND pacientes_id = "'.$id.'"');

        if ($acompanate == null) {
            $acompanate = DB::SELECT('SELECT "___" AS nombre, "___" AS apellido, "___" AS parentezco, "___" AS dni, "___" AS telefono');
        }

        $historia = DB::SELECT('SELECT ap.fecultimregla AS FecUltimaRegla, ap.cangestaciones AS CanGestaciones, p.valora AS ValorA, p.valorb AS ValorB, p.valorc AS ValorC, p.valord AS ValorD, ap.papanicolao AS FecPapaNicolao, ma.nombre AS MetodoAnticonceptivo, f.pulso, f.temperatura, f.talla, f.peso, pa.sistolica, pa.diastolica, apa.nombre AS antecPatologico, a.nombre AS alergias
                                 FROM triaje t, antecpersonals ap, ps p, manticonceptivos ma, citas c, funcvitals f, presarterials pa, antecpatologicos apa, alergia_triaje atr, alergias a
                                 WHERE t.citas_id = c.id AND t.antecpersonals_id = ap.id AND ap.ps_id = p.id AND ap.manticonceotivos_id = ma.id AND t.funcvitals_id = f.id AND f.presarterials_id = pa.id AND apa.triaje_id = t.id AND atr.triaje_id = t.id AND atr.alergias_id = a.id AND c.pacientes_id = "'.$id.'"');

        $consulta = DB::SELECT('SELECT c.id, c.motivo, c.tiempo, a.nombre AS apetito, d.nombre AS deposicion, s.nombre AS sed, su.nombre AS suenio, o.nombre AS orina, cies.codigo, cies.descripcion, t.indicacion, m.nombre AS medicamento, ob.nombre AS observacion 
                                 FROM consultas c
                                 INNER JOIN citas ci ON c.citas_id = ci.id
                                 LEFT JOIN funcbiologicas fb ON c.funcbiologicas_id = fb.id
                                 LEFT JOIN apetitos a ON fb.apetitos_id = a.id
                                 LEFT JOIN deposicions d ON fb.deposicions_id = d.id
                                 LEFT JOIN seds s ON fb.seds_id = s.id
                                 LEFT JOIN sueños su ON fb.sueños_id = su.id
                                 LEFT JOIN orinas o ON fb.orinas_id = o.id
                                 LEFT JOIN diagnostico_cies dc ON dc.consultas_id = c.id
                                 LEFT JOIN cies ON dc.cies_id = cies.id
                                 LEFT JOIN tratamientos t ON t.consultas_id = c.id
                                 LEFT JOIN medicamentos m ON t.medicamentos_id = m.id
                                 LEFT JOIN observacions ob ON ob.consultas_id = c.id
                                 WHERE ci.pacientes_id = "'.$id.'"');

        $insGenerales = DB::SELECT('SELECT ic.resultado, i.nombre 
                                     FROM consultas c, citas ci, insgeneral_consulta ic, insgenerals i
                                     WHERE c.citas_id = ci.id AND ic.insgenerals_id = i.id AND ic.consultas_id = c.id AND ci.pacientes_id = "'.$id.'"');

        return view('historia.pdfHistoriaClinica', compact('paciente', 'acompanate', 'historia' , 'consulta', 'insGenerales'));
    }

    public function receta($id){

        $paciente = DB::SELECT('SELECT p.nombre, p.apellido, p.edad
                                 FROM citas c, pacientes p
                                 WHERE c.pacientes_id = p.id AND c.id = "'.$id.'"');

        $diagnostico = DB::SELECT('SELECT cies.codigo, cies.descripcion
                                    FROM consultas c, diagnostico_cies dc, cies
                                    WHERE dc.consultas_id = c.id AND dc.cies_id = cies.id AND c.citas_id = "'.$id.'"');
        
        $receta = DB::SELECT('SELECT m.nombre as medicamento, t.indicacion, t.cantidad, t.dosis, t.via, t.frecuencia, t.duracion , m.concentracion, m.presentacion
                               FROM consultas c, tratamientos t, medicamentos m
                               WHERE t.consultas_id = c.id AND t.medicamentos_id = m.id AND c.citas_id = "'.$id.'"');

        return view('historia.receta', compact('paciente', 'diagnostico', 'receta'));
    }

    public function viewPdf(){
        $url = "https://www.facebook.com/";
        // return redirect::away($url);
    }
}
