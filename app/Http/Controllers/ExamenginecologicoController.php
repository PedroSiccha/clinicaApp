<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\CitaMotivo;
use App\Models\Consulta;
use App\Models\Exauxresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamenginecologicoController extends Controller
{
    public function index($id)
    {
        dd('Index');
    }

    public function store(Request $request)
    {
        $idMotivo=$request->idExaAuxiliar;

        for ($i=0; $i < count($idMotivo) ; $i++) { 
            $citaMotivo = new CitaMotivo();
            $citaMotivo->citas_id = $request->citas_id;
            $citaMotivo->tipoexaminters_id = $idMotivo[$i];
            $citaMotivo->save();
        }

        $exaPendientes = DB::SELECT('SELECT c.id, t.nombre, cm.estado FROM citas c, cita_motivo cm, tipoexaminters t
                                      WHERE cm.tipoexaminters_id = t.id AND cm.citas_id = c.id AND c.id = "'.$request->citas_id.'" AND t.nombre <> "Consulta"');  

        return response()->json(["view"=>view('consulta.exaAux',compact('exaPendientes'))->render()]);
    }

    public function Guardar(Request $request)
    {
       $idPaciente = $request->idpaciente;
       $idCitas = $request->idCitas;
       $idcitamotivo = $request->idcitamotivo;
       $url = $request->file('documento')->store('public/examenAux/'.$idPaciente);
       
        $exam = new Exauxresult();
        $exam->nombre = $request->nomExam;
        $exam->detalle = $request->textResultado;
        $exam->ruta = $url;
        $exam->cita_motivo_id = $idcitamotivo;

        if ($exam->save()) {

            $consulta=Consulta::where('citas_id', '=', $request->idCitas)->first();
            $consulta->estado = "Atendido";

            if ($consulta->save()) {
                $cita=Cita::where('id', '=', $request->idCitas)->first();
                $cita->estado = "ATENDIDO";
                if ($cita->save()) { 
                    return redirect('home');
                }
            }
        }
    }

    public function GuardarMotConsul(Request $request)
    {
        $documento=$request->documento;
        $idPaciente = $request->idpaciente;
        $idCitas = $request->idCitas;
        $idcitamotivo = $request->idcitamotivo;
        $subido="";
        $urlGuardar="";

        if ($request->hasFile('documento')) { 

            $nombre=$documento->getClientOriginalName();
            $extension=$documento->getClientOriginalExtension();
            $nuevoNombre=$nombre.".".$extension;
            $subido = Storage::disk('examenAux')->put($nuevoNombre, \File::get($documento));

            if($subido){
                $urlGuardar='images/examenAux/'.$nuevoNombre;
            }
        }

        $exam = new Exauxresult();
        $exam->nombre = $request->nomExam;
        $exam->detalle = $request->textResultado;
        $exam->ruta = $urlGuardar;
        $exam->cita_motivo_id = $idcitamotivo;
        if ($exam->save()) {
            $resultado = "Todo bien";
            $resultadoAux = DB::SELECT('SELECT * FROM citas c, cita_motivo cm, exauxresult e WHERE cm.citas_id = c.id AND cm.id = e.cita_motivo_id AND c.id = "'.$idCitas.'"'); 
            return response()->json(["view"=>view('consulta.modalResultAuxiliar',compact('resultadoAux'))->render()]);
        }
    }

    public function show($id)
    {
        $tipoExamen = DB::SELECT('SELECT c.id AS idCitas, c.motivo AS motivo, p.id AS idPacientes, CONCAT(p.apellido, " ",p.nombre) AS nombre 
                                   FROM citas c, pacientes p
                                   WHERE c.pacientes_id = p.id AND c.estado = "CONSULTA" AND c.id = "'.$id.'"');

        $laboratorio = DB::SELECT('SELECT id, nombre, ruc 
                                    FROM laboratorios');

        $paciente = DB::SELECT('SELECT p.nombre, p.dni FROM citas c, pacientes p WHERE c.pacientes_id = p.id AND c.id = "'.$id.'"');

        $acoId = DB::SELECT('SELECT a.id AS id FROM acompañantes a, citas c
                              WHERE c.acompañantes_id = a.id AND c.id ="'.$id.'"');

        if ($acoId == null) {
            $acompanate = DB::SELECT('SELECT "No Disponible" AS idAcompañantes, "No Disponible" AS nombre, "No Disponible" AS parentezco, "No Disponible" AS dni, "No Disponible" AS telefono');
        }else{
            $acompanate = DB::SELECT('SELECT a.id AS idAcompañantes, CONCAT(a.nombre, " ", a.apellido) AS nombre, a.parentezco, a.dni, a.telefono
                                   FROM citas c
                                   INNER JOIN acompañantes a
                                   ON c.acompañantes_id = a.id 
                                   WHERE c.id = "'.$id.'"');
        }

        $historiaClinica = DB::SELECT('SELECT tr.id AS idTriaje, tr.fecha AS FechaTriaje,
                                                ap.id AS idAntecPersonales, ap.fecultimregla AS FecUltimaRegla, ap.cangestaciones AS CanGestaciones, ap.papanicolao AS FecPapaNicolao, 
                                                p.id AS idPs, p.valora AS ValorA, p.valorb AS ValorB, p.valorc AS ValorC, p.valord AS ValorD,
                                                m.id AS idAnticonceptivo, m.nombre AS MetodoAnticonceptivo,
                                                c.id AS idCitas,
                                                u.id AS idUsers, u.name AS Usuario,
                                                apa.id AS idAntecpatologicos, apa.nombre AS Detalle,
                                                f.id AS idFuncVitales, f.pulso, f.temperatura, f.talla, f.peso,
                                                pa.id AS idPresArterial, pa.sistolica, pa.diastolica
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
                                        INNER JOIN funcvitals f
                                        ON tr.funcvitals_id = f.id
                                        INNER JOIN presarterials pa
                                        ON pa.id = f.presarterials_id
                                        WHERE tr.citas_id = "'.$id.'"');

        $alergias = DB::SELECT('SELECT atr.id AS idAlergiaTriaje,
                                a.id AS idAlergia, a.nombre AS alergia, 
                                t.id AS idTriaje
                                FROM alergia_triaje atr, alergias a, triaje t
                                WHERE atr.alergias_id = a.id AND atr.triaje_id = t.id AND t.citas_id = "'.$id.'"'); 

        $cita = DB::SELECT('SELECT cm.id, t.nombre 
                             FROM cita_motivo cm, citas c, tipoexaminters t
                             WHERE cm.citas_id = c.id AND cm.tipoexaminters_id = t.id AND c.id = "'.$id.'"');

        return view('examen.index', compact('tipoExamen', 'laboratorio', 'paciente', 'acompanate' ,'historiaClinica', 'alergias' ,'cita'));
    }
}
