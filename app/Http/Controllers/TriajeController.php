<?php

namespace App\Http\Controllers;

use App\Models\AlergiaTriaje;
use App\Models\Antecpatologico;
use App\Models\Antecpersonale;
use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Funcvital;
use App\Models\P;
use App\Models\Presarterial;
use App\Models\Triaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TriajeController extends Controller
{
    public function index($id)
    {
        $paciente = DB::SELECT('SELECT c.id AS idCita, p.id AS idPaciente, c.fecaten AS Atencion, c.motivo, c.tiempo, u.id, u.name, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.correo, p.edad 
                                 FROM citas c, pacientes p, users u 
                                 WHERE p.id = c.pacientes_id AND u.id = c.users_id AND c.id = "'.$id.'";');

        $metodo = DB::SELECT('SELECT id, nombre
                               FROM manticonceptivos');

        $apetito = DB::SELECT('SELECT id, nombre
                               FROM apetitos');
                              
        $deposicion = DB::SELECT('SELECT id, nombre
                               FROM deposicions');

        $sed = DB::SELECT('SELECT id, nombre
                               FROM seds');

        $sueño = DB::SELECT('SELECT id, nombre
                               FROM sueños');

        $orina = DB::SELECT('SELECT id, nombre
                               FROM orinas');

        $presarterial = DB::SELECT('SELECT id, sistolica, diastolica
                               FROM presarterials');

        $alergia = DB::SELECT('SELECT id, nombre
                                FROM alergias');

        $num = DB::SELECT('SELECT COUNT(id) as num FROM alergias');
        
        $ultTriaje = DB::SELECT('SELECT MAX(id) AS id FROM triaje WHERE citas_id = "'.$id.'"');
        
        $triaje1 = DB::SELECT('SELECT ap.fecultimregla, ap.cangestaciones, ap.papanicolao, p.valora, p.valorb, p.valorc, p.valord, m.id AS manticonceptivos 
                                FROM triaje t, antecpersonals ap, ps p, manticonceptivos m 
                                WHERE t.antecpersonals_id = ap.id AND ap.ps_id = p.id AND ap.manticonceotivos_id = m.id AND t.citas_id = "'.$id.'" AND t.id = "'.$ultTriaje[0]->id.'"');
                                
        $triaje2 = DB::SELECT('SELECT ap.id, ap.nombre FROM triaje t, antecpatologicos ap WHERE ap.triaje_id = t.id AND t.citas_id = "'.$id.'" AND t.id = "'.$ultTriaje[0]->id.'"');
        
        if($triaje1 == null){
            $triaje1 = DB::SELECT('SELECT "" AS fecultimregla, "" AS cangestaciones, "" AS papanicolao, "" AS valora, "" AS valorb, "" AS valorc, "" AS valord, "" AS manticonceptivos');
        }
        
        if($triaje2 == null){
            $triaje2 = DB::SELECT('SELECT "" AS id, "" AS nombre');
        }
        
        return view('triaje.index', COMPACT('paciente', 'metodo', 'apetito', 'deposicion', 'sed', 'sueño', 'orina', 'pulso', 'temperatura', 'presarterial', 'talla', 'peso', 'alergia', 'num', 'triaje1', 'triaje2'));
    }

    public function store(Request $request)
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $users_id = Auth::user()->id;

        $idAlergias=$request->idAlergias;

        $presArterial = new Presarterial();
        $presArterial->sistolica = $request->presSistolica;
        $presArterial->diastolica = $request->presDiastolica;
        if ($presArterial->save()) {
            $presarterial_id = DB::SELECT('SELECT MAX(id) AS id FROM presarterials');

            $funcVital = new Funcvital();
            $funcVital->presarterials_id = $presarterial_id[0]->id;
            $funcVital->pulso = $request->pulso;
            $funcVital->temperatura = $request->temperatura;
            $funcVital->talla = $request->talla;
            $funcVital->peso = $request->peso;
            if ($funcVital->save()) {
                $funcVital_id = DB::SELECT('SELECT MAX(id) AS id FROM funcvitals');

            $ps = new P();
            $ps->valora = $request->p1;
            $ps->valorb = $request->p2;
            $ps->valorc = $request->p3;
            $ps->valord = $request->p4;
       
        if ($ps->save()) {
            $ps_id = DB::SELECT('SELECT MAX(id) AS id FROM ps');

            $antecP = new Antecpersonale();
            $antecP->fecultimregla = $request->fecRegla;
            $antecP->cangestaciones = $request->cantGesta;
            $antecP->papanicolao = $request->fecNicolao;
            $antecP->ps_id = $ps_id[0]->id;
            $antecP->manticonceotivos_id = $request->metAntic;
            if ($antecP->save()) {
                $antPer_id = DB::SELECT('SELECT MAX(id) AS id FROM antecpersonals');
                $funcVital_id = DB::SELECT('SELECT MAX(id) AS id FROM funcvitals');

                $triaje = new Triaje();
                $triaje->fecha = $fechaActual;
                $triaje->antecpersonals_id = $antPer_id[0]->id;
                $triaje->citas_id = $request->idCita;
                $triaje->users_id = $users_id;
                $triaje->funcvitals_id = $funcVital_id[0]->id;

                if ($triaje->save()) {
                    $triaje_id = DB::SELECT('SELECT MAX(id) AS id FROM triaje');

                    $antPat = new Antecpatologico();
                    $antPat->nombre = $request->detPatologia;
                    $antPat->triaje_id = $triaje_id[0]->id;
                    if ($antPat->save()) {
                        $triaje_id = DB::SELECT('SELECT MAX(id) AS id FROM triaje');

                        $cita = Cita::where('id', '=', $request->idCita)->first();
                        $cita->estado = 'CONSULTA';
                        $cita->save();

                        for ($i=0; $i < count($idAlergias) ; $i++) { 
            
                            $idLlenar=$idAlergias[$i];
                            $aleTri = new AlergiaTriaje();
                            $aleTri->alergias_id = $idAlergias[$i];
                            $aleTri->triaje_id = $triaje_id[0]->id;
                            $aleTri->save();
                        }

                        $consulta = new Consulta();
                        $consulta->fecha = $fechaActual;
                        $consulta->hora = $horaActual;
                        $consulta->estado = 'Por Atender';
                        $consulta->citas_id = $request->idCita;
                        $consulta->save();

                        $resultado = "Triaje Registrado Exitosamente";
                        return response()->json(['resultado'=>$resultado]);
                    }else {
                        $resultado = "Error Antecedentes Patologicos";
                        return response()->json(['resultado'=>$resultado]);
                    }
                }else {
                    $resultado = "Error Antecedentes Triaje";
                    return response()->json(['resultado'=>$resultado]);
                }
                
            }else {
                $resultado = "Error Antecedentes Personales";
                return response()->json(['resultado'=>$resultado]);
            }
        }else {
            $resultado = "Error P";
            return response()->json(['resultado'=>$resultado]);
        }

            }
        }
    }

    public function triajeTemporal(Request $request)
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $users_id = Auth::user()->id;

        $idAlergias=$request->idAlergias;

        $presArterial = new Presarterial();
        $presArterial->sistolica = $request->presSistolica;
        $presArterial->diastolica = $request->presDiastolica;
        if ($presArterial->save()) {
            $presarterial_id = DB::SELECT('SELECT MAX(id) AS id FROM presarterials');

            $funcVital = new Funcvital();
            $funcVital->presarterials_id = $presarterial_id[0]->id;
            $funcVital->pulso = $request->pulso;
            $funcVital->temperatura = $request->temperatura;
            $funcVital->talla = $request->talla;
            $funcVital->peso = $request->peso;
            if ($funcVital->save()) {
                $funcVital_id = DB::SELECT('SELECT MAX(id) AS id FROM funcvitals');

            $ps = new P();
            $ps->valora = $request->p1;
            $ps->valorb = $request->p2;
            $ps->valorc = $request->p3;
            $ps->valord = $request->p4;
       
        if ($ps->save()) {
            $ps_id = DB::SELECT('SELECT MAX(id) AS id FROM ps');

            $antecP = new Antecpersonale();
            $antecP->fecultimregla = $request->fecRegla;
            $antecP->cangestaciones = $request->cantGesta;
            $antecP->papanicolao = $request->fecNicolao;
            $antecP->ps_id = $ps_id[0]->id;
            $antecP->manticonceotivos_id = $request->metAntic;
            if ($antecP->save()) {
                $antPer_id = DB::SELECT('SELECT MAX(id) AS id FROM antecpersonals');
                $funcVital_id = DB::SELECT('SELECT MAX(id) AS id FROM funcvitals');

                $triaje = new Triaje();
                $triaje->fecha = $fechaActual;
                $triaje->antecpersonals_id = $antPer_id[0]->id;
                $triaje->citas_id = $request->idCita;
                $triaje->users_id = $users_id;
                $triaje->funcvitals_id = $funcVital_id[0]->id;

                if ($triaje->save()) {
                    $triaje_id = DB::SELECT('SELECT MAX(id) AS id FROM triaje');

                    $antPat = new Antecpatologico();
                    $antPat->nombre = $request->detPatologia;
                    $antPat->triaje_id = $triaje_id[0]->id;
                    if ($antPat->save()) {
                        $triaje_id = DB::SELECT('SELECT MAX(id) AS id FROM triaje');
                    }else {
                        $resultado = "Error Antecedentes Patologicos";
                        return response()->json(['resultado'=>$resultado]);
                    }
                }else {
                    $resultado = "Error Antecedentes Triaje";
                    return response()->json(['resultado'=>$resultado]);
                }
                
            }else {
                $resultado = "Error Antecedentes Personales";
                return response()->json(['resultado'=>$resultado]);
            }
        }else {
            $resultado = "Error P";
            return response()->json(['resultado'=>$resultado]);
        }

            }
        }
    }

    public function show()
    {
        $metodo = DB::SELECT('SELECT id, nombre
                               FROM manticonceptivos');

        $apetito = DB::SELECT('SELECT id, nombre
                               FROM apetitos');
                              
        $deposicion = DB::SELECT('SELECT id, nombre
                               FROM deposicions');

        $sed = DB::SELECT('SELECT id, nombre
                               FROM seds');

        $sueño = DB::SELECT('SELECT id, nombre
                               FROM sueños');

        $orina = DB::SELECT('SELECT id, nombre
                               FROM orinas');

        $presarterial = DB::SELECT('SELECT id, sistolica, diastolica
                               FROM presarterials');

        $alergia = DB::SELECT('SELECT id, nombre
                                FROM alergias');

        $triaje = DB::SELECT('SELECT t.id AS idTriaje, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, t.created_at AS creacion, u.name AS usuario, c.estado
                               FROM triaje t
                               INNER JOIN users u
                               ON t.users_id = u.id
                               INNER JOIN citas c
                               ON t.citas_id = c.id
                               INNER JOIN pacientes p
                               ON c.pacientes_id = p.id');

        return view('triaje.show', compact('triaje', 'apetito', 'deposicion', 'sed', 'sueño', 'orina', 'pulso', 'temperatura', 'presarterial', 'talla', 'peso', 'metodo'));
    }

    public function ver($id)
    {
        $dni = $_GET["doc"];
        $triaje = DB::SELECT('SELECT t.id AS idTriaje, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, t.created_at AS creacion, u.name AS usuario, c.estado
                               FROM triaje t
                               INNER JOIN users u
                               ON t.users_id = u.id
                               INNER JOIN citas c
                               ON t.citas_id = c.id
                               INNER JOIN pacientes p
                               ON c.pacientes_id = p.id
                               WHERE c.id = "'.$dni.'"');

        return view('triaje.ver', compact('triaje'));
    }

    public function resultadosPDF($id)
    {
        $fechaActual = date('Y-m-d');
        $datosPersonales = DB::SELECT('SELECT CONCAT(p.nombre, " ", p.apellido) AS Nombre, p.dni 
                                        FROM citas c, pacientes p
                                        WHERE c.pacientes_id = p.id AND c.id = "'.$id.'"');

        $paciente = DB::SELECT('SELECT p.id AS idPaciente, CONCAT(p.nombre, " ", p.apellido) AS nombre, p.fecnac, p.edad, p.dni, p.lugarnac, p.lugarproc, p.telefono, p.direccion, p.correo,
                                        ec.id AS idEstadoCivil, ec.nombre AS estadocivil,
                                        i.id AS idInstruccion, i.nombre AS instruccion,
                                        o.id AS idOcupacion, o.nombre AS ocupacion,
                                        g.id AS idGenero, g.nombre AS genero
                                 FROM citas c
                                 INNER JOIN pacientes p
                                 ON c.pacientes_id = p.id
                                 INNER JOIN generos g
                                 ON p.generos_id = g.id
                                 INNER JOIN estadocivils ec
                                 ON p.estadocivils_id = ec.id
                                 INNER JOIN instruccions i
                                 ON p.instruccions_id = i.id
                                 INNER JOIN ocupacions o
                                 ON p.ocupacions_id = o.id
                                 WHERE c.id = "'.$id.'"');

        $acompanate = DB::SELECT('SELECT a.id AS idAcompañantes, CONCAT(a.nombre, " ", a.apellido) AS nombre, a.parentezco, a.dni, a.telefono
                                   FROM citas c
                                   INNER JOIN acompañantes a
                                   ON c.acompañantes_id = a.id
                                   WHERE c.id = "'.$id.'"');

        $historia = DB::SELECT('SELECT tr.id AS idTriaje, tr.fecha AS FechaTriaje,
                                                ap.id AS idAntecPersonales, ap.fecultimregla AS FecUltimaRegla, ap.cangestaciones AS CanGestaciones, ap.paoanicolao AS FecPapaNicolao, 
                                                p.id AS idPs, p.valora AS ValorA, p.valorb AS ValorB, p.valorc AS ValorC, p.valord AS ValorD,
                                                m.id AS idAnticonceptivo, m.nombre AS MetodoAnticonceptivo,
                                                c.id AS idCitas,
                                                u.id AS idUsers, u.name AS Usuario,
                                                apa.id AS idAntecpatologicos, apa.nombre AS Detalle
                                        FROM triaje tr
                                        INNER JOIN antecpersonals ap
                                        ON tr.antecpersonals_id = ap.id
                                        INNER JOIN ps p
                                        ON ap.ps_id = p.id
                                        INNER JOIN manticonceptivos m
                                        ON ap.manticonceotivos_id = m.id
                                        INNER JOIN citas c
                                        ON tr.citas_id = c.id
                                        INNER JOIN users u
                                        ON tr.users_id = u.id
                                        INNER JOIN antecpatologicos apa
                                        ON apa.triaje_id = tr.id 
                                        WHERE tr.citas_id = "'.$id.'"');

        // $pdf = PDF::loadview('historia.pdfHistoriaClinica', compact('historia', 'paciente', 'acompanate'));
        // return $pdf->download('HistoriaClinica-'.$datosPersonales[0]->Nombre.'.pdf');
    }
}
