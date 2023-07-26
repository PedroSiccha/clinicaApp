<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\DiagnosticoCies;
use App\Models\Exaginecologico;
use App\Models\Funcbiologica;
use App\Models\InsgeneralConsulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $datosPersonales = DB::SELECT('SELECT c.id AS idCita, p.id AS idPaciente, CONCAT(p.nombre," ",p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.correo, p.edad 
                                         FROM citas c, pacientes p
                                         WHERE c.pacientes_id = p.id AND c.id ='.$id.';');
                                        
        $idPac = $datosPersonales[0]->idPaciente;

        $ap = DB::SELECT('SELECT id, nombre
                           FROM apetitos');

        $sed = DB::SELECT('SELECT id, nombre
                           FROM seds');

        $sueño = DB::SELECT('SELECT id, nombre
                           FROM sueños');

        $orina = DB::SELECT('SELECT id, nombre 
                           FROM orinas');

        $deposicion = DB::SELECT('SELECT id, nombre
                           FROM deposicions');        
        
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
                                        WHERE tr.citas_id = "'.$id.'"
                                        ORDER BY tr.id DESC LIMIT 1');

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

        $idConsulta = DB::SELECT('SELECT c.id, ci.id as cita_id 
                                   FROM consultas c, citas ci
                                   WHERE  c.citas_id = ci.id AND c.citas_id = "'.$id.'"');

        
        $cie = DB::SELECT('SELECT id, codigo, descripcion
                            FROM cies');

        $laboratorio = DB::SELECT('SELECT id, nombre, ruc, telefono
                                    FROM laboratorios');

        $medicamento = DB::SELECT('SELECT id, nombre
                                    FROM medicamentos');

        DB::statement(DB::raw('SET @rownumTrat = 0'));

        $recetaMedica = DB::SELECT('SELECT t.id AS tratamientos_id, t.indicacion, m.id AS medicamentos_id, m.nombre AS medicamento, @rownumTrat := @rownumTrat+ 1 AS Numeracion  
                                     FROM tratamientos t, medicamentos m
                                     WHERE t.medicamentos_id = m.id AND t.consultas_id = "'.$idConsulta[0]->id.'"');
        DB::statement(DB::raw('SET @rownumDiag = 0'));

        $diagnostico = DB::SELECT('SELECT c.id AS idCies, c.codigo AS Codigo, c.descripcion AS Descripcion, co.id AS idConsultas , dc.id AS idCieConsulta , @rownumDiag := @rownumDiag + 1 AS Numeracion
                                    FROM diagnostico_cies dc, cies c, consultas co
                                    WHERE dc.cies_id = c.id AND dc.consultas_id = co.id AND co.id = "'.$idConsulta[0]->id.'"');
        DB::statement(DB::raw('SET @rownumExa = 0'));

        DB::statement(DB::raw('SET @rownumObs = 0'));

        $observacion = DB::SELECT('SELECT id, nombre , @rownumObs := @rownumObs + 1 AS Numeracion FROM observacions WHERE consultas_id = "'.$idConsulta[0]->id.'"');

        DB::statement(DB::raw('SET @rownumOrd = 0'));

        $alergias = DB::SELECT('SELECT atr.id AS idAlergiaTriaje,
                                        a.id AS idAlergia, a.nombre AS alergia, 
                                        t.id AS idTriaje
                                 FROM alergia_triaje atr, alergias a, triaje t
                                 WHERE atr.alergias_id = a.id AND atr.triaje_id = t.id AND t.citas_id = "'.$id.'"');

        $ListaConsultas = DB::SELECT('SELECT c.fecha AS FechaConsulta, c.hora AS HoraConsulta, c.motivo AS MotivoConsulta, c.tiempo AS TiempoSintomas,
                                              ci.motivo AS TipoCita, c.citas_id AS citas_id
                                       FROM consultas c, citas ci, pacientes p
                                       WHERE c.citas_id = ci.id AND p.id = ci.pacientes_id AND c.estado = "Atendido" AND p.id = "'.$paciente[0]->idPaciente.'"');

        $TipoExamenes = DB::SELECT('SELECT * FROM tipoexamexterno');

        $bioquimica = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "1"');
        $hematologia = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "2"');
        $inmunologia = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "3"');
        $endocrinologia = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "4"');
        $marcatumor = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "5"');
        $microbiologia = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "6"');
        $parasitologia = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "7"');
        $lipidico = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "8"');
        $hepatico = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "9"');
        $reumatologico = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "10"');
        $coronario = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "11"');
        $gestante = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "12"');
        $prequirurgico = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "13"');
        $tiroideo = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "14"');
        $paqueteitu = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "15"');
        $chequegeneral = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "16"');
        $coagulacion = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "17"');
        $genetica = DB::SELECT('SELECT * FROM examenexterno WHERE tipoexamexterno_id = "20"');

        $ordenExamen = DB::SELECT('SELECT o.id AS orden_id, o.descripcion AS medico, o.estado AS estorden, o.fecha AS fechaOrden, re.ruta AS documento
                                    FROM ordenexam o
                                    LEFT JOIN consultas c ON o.consultas_id = c.id 
                                    LEFT JOIN citas ci ON c.citas_id = ci.id 
                                    LEFT JOIN resultadoexamen re ON re.ordenexam_id = o.id
                                    WHERE ci.pacientes_id = "'.$paciente[0]->idPaciente.'";');  

        $exaAux = DB::SELECT('SELECT * FROM tipoexaminters WHERE nombre <> "Consulta"');

        $exaPendientes = DB::SELECT('SELECT c.id, t.nombre, cm.estado FROM citas c, cita_motivo cm, tipoexaminters t
                                      WHERE cm.tipoexaminters_id = t.id AND cm.citas_id = c.id AND c.id = "'.$id.'" AND t.nombre <> "Consulta"');

        $resultOrdenes = DB::SELECT('SELECT r.id, r.nombre AS documento, r.ruta AS dir, r.descripcion AS descripcion, l.nombre AS laboratorio 
                                      FROM ordenexam o, exaexterno_ordenexam eo, resultadoexamen r, laboratorios l
                                      WHERE eo.ordenexam_id = o.id AND r.ordenexam_id = o.id AND r.laboratorios_id = l.id AND o.id = "1"  GROUP BY r.id');

        $resultados = DB::SELECT('SELECT r.id, r.nombre AS documento, r.ruta AS dir, r.descripcion AS descripcion, l.nombre AS laboratorio 
                                    FROM consultas c
                                    INNER JOIN ordenexam o ON o.consultas_id = c.id
                                    LEFT JOIN resultadoexamen r ON r.ordenexam_id = o.id
                                    LEFT JOIN laboratorios l ON r.laboratorios_id = l.id
                                    WHERE  c.citas_id = "'.$id.'" AND r.estado = "FIN"');
                                    
        $resultadoAux = DB::SELECT('SELECT * FROM citas c, cita_motivo cm, exauxresult e WHERE cm.citas_id = c.id AND cm.id = e.cita_motivo_id AND c.id = "'.$id.'"');                            

        $citamotivo = DB::SELECT('SELECT * FROM cita_motivo WHERE citas_id = "'.$id.'"');

        return view('consulta.index', compact('genetica','citamotivo', 'resultados','resultOrdenes', 'exaPendientes','exaAux','coagulacion','chequegeneral','paqueteitu','tiroideo','prequirurgico','gestante','parasitologia','lipidico','hepatico','coronario','reumatologico','microbiologia','marcatumor','bioquimica','hematologia','inmunologia','endocrinologia','TipoExamenes','ap','alergias', 'sueño', 'orina', 'sed',  'deposicion', 'idPac','datosPersonales', 'historiaClinica', 'idConsulta', 'examenes', 'cie', 'laboratorio', 'medicamento', 'recetaMedica', 'diagnostico', 'paciente', 'acompanate', 'observacion', 'ordenExamen', 'historiaConsultas', 'ListaConsultas', 'resultadoAux'));
    }

    public function buscardiagnostico (Request $request)
    {
        $codigo=$request->codigo;
        $resultado=0;
        $selector="search";

        $cie = DB::SELECT("SELECT id, codigo, descripcion
                            FROM cies where codigo='".$codigo."'; " );

        foreach($cie as $datos){
            $diagnostico=$datos->descripcion;
            $resultado=1;
        }

        return response()->json(['codigo'=>$codigo,'resultado'=>$resultado,'selector'=>$selector,'diagnostico'=>$diagnostico]);          
    }

    public function buscarDiagDetCie (Request $request)
    {
        $codigo=$request->codigo;
        $resultado=0;
        $selector="search";
        $cie = "";

        $cie = DB::SELECT("SELECT id, codigo, descripcion
                            FROM cies where descripcion='".$codigo."'; " );

        $codigoCIE = $cie[0]->codigo;
        if ($codigoCIE != '') {
            $resultado = 1;
        }

        return response()->json(['codigo'=>$codigo,'resultado'=>$resultado,'codigoCIE'=>$codigoCIE,'cie'=>$cie]);          
    } 

    public function diagnostico (Request $request){
        $codigo=$request->codigo;
        $resultado=0;
        $selector="search";
        $diagnostico=""; 
        $idCies = "";

        $cie = DB::SELECT("SELECT id, codigo, descripcion
                            FROM cies where codigo='".$codigo."'; " );

        foreach($cie as $datos){
            $diagnostico=$datos->descripcion;
            $idCies = $datos->id;
            $resultado=1;
        }

        return response()->json(['codigo'=>$codigo,'resultado'=>$resultado,'selector'=>$selector,'diagnostico'=>$diagnostico, 'idCies'=>$idCies]);
    }

    public function mantener(Request $request)
    {
        $users_id = Auth::user()->id;
        $fechaActual = date('Y-m-d');
        $estado = "Por Atender";
        $horaActual = date('H:i:s');
        $idConsulta = DB::SELECT('SELECT id FROM consultas WHERE citas_id = "'.$request->idCita.'"');
        $func_id = DB::SELECT('SELECT funcbiologicas_id FROM consultas WHERE citas_id = "'.$request->idCita.'"');
        $funCBiolo = Funcbiologica::where('id', '=', $func_id[0]->funcbiologicas_id)->first();
        $funCBiolo->apetitos_id = $request->ap;
        $funCBiolo->deposicions_id = $request->deposicion;
        $funCBiolo->seds_id = $request->sed;
        $funCBiolo->sueños_id = $request->sueño;
        $funCBiolo->orinas_id = $request->orina;

        if ($funCBiolo->save()) {
            
            $exaGi_id = DB::SELECT('SELECT exaginecologicos_id FROM consultas WHERE citas_id = "'.$request->idCita.'"');
        
            $insConsultaC = InsgeneralConsulta::where('consultas_id', '=', $idConsulta[0]->id)->first();
            $insConsultaC->consultas_id = $idConsulta[0]->id;
            $insConsultaC->insgenerals_id = "1";
            $insConsultaC->resultado = $request->cabeza;
            $insConsultaC->save();
            $insConsultaCu = InsgeneralConsulta::where('consultas_id', '=', $idConsulta[0]->id)->second();
            $insConsultaCu->consultas_id = $idConsulta[0]->id;
            $insConsultaCu->insgenerals_id = "2";
            $insConsultaCu->resultado = $request->cuello;
            $insConsultaCu->save();
            $insConsultaT = InsgeneralConsulta::where('consultas_id', '=', $idConsulta[0]->id)->first();
            $insConsultaT->consultas_id = $idConsulta[0]->id;
            $insConsultaT->insgenerals_id = "3";
            $insConsultaT->resultado = $request->torax;
            $insConsultaT->save();
            $insConsultaM = InsgeneralConsulta::where('consultas_id', '=', $idConsulta[0]->id)->first();
            $insConsultaM->consultas_id = $idConsulta[0]->id;
            $insConsultaM->insgenerals_id = "4";
            $insConsultaM->resultado = $request->mamas;
            $insConsultaM->save();
            $insConsultaP = InsgeneralConsulta::where('consultas_id', '=', $idConsulta[0]->id)->first();
            $insConsultaP->consultas_id = $idConsulta[0]->id;
            $insConsultaP->insgenerals_id = "5";
            $insConsultaP->resultado = $request->pulmoncardio;
            $insConsultaP->save();
            $insConsultaA = InsgeneralConsulta::where('consultas_id', '=', $idConsulta[0]->id)->first();
            $insConsultaA->consultas_id = $idConsulta[0]->id;
            $insConsultaA->insgenerals_id = "6";
            $insConsultaA->resultado = $request->abdomen;
            
            if ($insConsultaA->save()) {    
                $exaGi_id = DB::SELECT('SELECT exaginecologicos_id FROM consultas WHERE citas_id = "'.$request->idCita.'"');
        
                $exaGineco = Exaginecologico::where('id', '=', $exaGi_id[0]->exaginecologicos_id)->first();
                $exaGineco->geybus = $request->gebus;
                $exaGineco->cervix = $request->cervix;
                $exaGineco->ovarios = $request->ovarios;
                $exaGineco->vagina = $request->vagina;
                $exaGineco->utero = $request->utero;
                $exaGineco->fondoseco = $request->fondoseco;

                if($exaGineco->save()){
                    $funcbiologicas_id = DB::SELECT('SELECT MAX(id) AS id FROM funcbiologicas');
                    $inspGeneral_id = DB::SELECT('SELECT MAX(id) AS id FROM insgenerals');
                    $exaGineco_id = DB::SELECT('SELECT MAX(id) AS id FROM exaginecologicos');

                    $consulta=Consulta::where('citas_id', '=', $request->idCita)->first();
                    $consulta->fecha = $fechaActual;
                    $consulta->hora = $horaActual;
                    $consulta->estado = "Por Atender";
                    $consulta->citas_id = $request->idCita;
                    $consulta->funcbiologicas_id = $funcbiologicas_id[0]->id;
                    $consulta->motivo = $request->motivo;
                    $consulta->tiempo = $request->tiempo;
                    $consulta->exaginecologicos_id = $exaGineco_id[0]->id;

                    if ($consulta->save()) {
                        $cita=Cita::where('id', '=', $request->idCita)->first();
                        $cita->estado = "CONSULTA";

                        if ($cita->save()) {
                            $resultado = "guardo bien";
                            return response()->json(['resultado'=>$resultado]);
                        }
                    }
                }
            }
        }        
    }

    public function store(Request $request)
    {
        $users_id = Auth::user()->id;
        $fechaActual = date('Y-m-d');
        $estado = "Atendido";
        $horaActual = date('H:i:s');
        $idConsulta = DB::SELECT('SELECT id FROM consultas WHERE citas_id = "'.$request->idCita.'"');

        $funCBiolo = new Funcbiologica();
        $funCBiolo->apetitos_id = $request->ap;
        $funCBiolo->deposicions_id = $request->deposicion;
        $funCBiolo->seds_id = $request->sed;
        $funCBiolo->sueños_id = $request->sueño;
        $funCBiolo->orinas_id = $request->orina;

        if ($funCBiolo->save()) {

            $insConsultaC = new InsgeneralConsulta();
            $insConsultaC->consultas_id = $idConsulta[0]->id;
            $insConsultaC->insgenerals_id = "1";
            $insConsultaC->resultado = $request->cabeza;
            $insConsultaC->save();
            $insConsultaCu = new InsgeneralConsulta();
            $insConsultaCu->consultas_id = $idConsulta[0]->id;
            $insConsultaCu->insgenerals_id = "2";
            $insConsultaCu->resultado = $request->cuello;
            $insConsultaCu->save();
            $insConsultaT = new InsgeneralConsulta();
            $insConsultaT->consultas_id = $idConsulta[0]->id;
            $insConsultaT->insgenerals_id = "3";
            $insConsultaT->resultado = $request->torax;
            $insConsultaT->save();
            $insConsultaM = new InsgeneralConsulta();
            $insConsultaM->consultas_id = $idConsulta[0]->id;
            $insConsultaM->insgenerals_id = "4";
            $insConsultaM->resultado = $request->mamas;
            $insConsultaM->save();
            $insConsultaP = new InsgeneralConsulta();
            $insConsultaP->consultas_id = $idConsulta[0]->id;
            $insConsultaP->insgenerals_id = "5";
            $insConsultaP->resultado = $request->pulmoncardio;
            $insConsultaP->save();
            $insConsultaA = new InsgeneralConsulta();
            $insConsultaA->consultas_id = $idConsulta[0]->id;
            $insConsultaA->insgenerals_id = "6";
            $insConsultaA->resultado = $request->abdomen;
            
            if ($insConsultaA->save()) {

                $exaGineco = new Exaginecologico();
                $exaGineco->geybus = $request->gebus;
                $exaGineco->cervix = $request->cervix;
                $exaGineco->ovarios = $request->ovarios;
                $exaGineco->vagina = $request->vagina;
                $exaGineco->utero = $request->utero;
                $exaGineco->fondoseco = $request->fondoseco;

                if($exaGineco->save()){
                    
                    $funcbiologicas_id = DB::SELECT('SELECT MAX(id) AS id FROM funcbiologicas');
                    $inspGeneral_id = DB::SELECT('SELECT MAX(id) AS id FROM insgenerals');
                    $exaGineco_id = DB::SELECT('SELECT MAX(id) AS id FROM exaginecologicos');

                    $consulta=Consulta::where('citas_id', '=', $request->idCita)->first();
                    $consulta->fecha = $fechaActual;
                    $consulta->hora = $horaActual;
                    $consulta->estado = "Atendido";
                    $consulta->citas_id = $request->idCita;
                    $consulta->motivo = $request->motivo;
                    $consulta->tiempo = $request->tiempo;
                    $consulta->exaginecologicos_id = $exaGineco_id[0]->id;

                    if ($consulta->save()) {

                        $cita=Cita::where('id', '=', $request->idCita)->first();
                        $cita->estado = "Atendido";

                        if ($cita->save()) {
                            $resultado = "guardo bien";
                            return response()->json(['resultado'=>$resultado]);
                        }
                    }
                }
            }
        }
    }

    public function ConCie(Request $request)
    {
        $resultado = "Inicio";
        $idConsulta = $request->consulta;
        $idCies = $request->idCies;
        $cies_id = DB::SELECT('SELECT id FROM cies WHERE codigo = "'.$idCies.'"');

        $consultaCie = new DiagnosticoCies();
        $consultaCie->cies_id = $cies_id[0]->id;
        $consultaCie->consultas_id = $request->consulta;
        if ($consultaCie->save()) {
            $resultado = "Se grabó";
        }
        DB::statement(DB::raw('SET @rownumDiag = 0'));

        $diagnostico = DB::SELECT('SELECT c.id AS idCies, c.codigo AS Codigo, c.descripcion AS Descripcion, co.id AS idConsultas, dc.id AS idCieConsulta , @rownumDiag := @rownumDiag + 1 AS Numeracion
                                      FROM diagnostico_cies dc, cies c, consultas co
                                      WHERE dc.cies_id = c.id AND dc.consultas_id = co.id AND co.id = "'.$request->consulta.'"');
        
        return response()->json(["view"=>view('consulta.diagcie',compact('diagnostico'))->render(),'resultado'=>$resultado]);
    }

    public function buscardiagnosticocie(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::SELECT('SELECT id, descripcion FROM cies WHERE descripcion LIKE "%'.$query.'%"');
            $output = '<ul class="clearfix">';
                      foreach ($data as $row) {
                          $output .= '<li><a>'.$row->descripcion.'</a></li>';
                      }
                      $output .= '</ul>';
            echo $output;
        }
    }

    public function show(Request $request)
    {
        $fechaActual = date('Y-m-d');

        $time = time();
        $horaActual = date("H:i:s", $time);

        $num = DB::SELECT('SELECT (COALESCE( MAX(eg.id), 0 ) + 1) as num 
                            from exaginecologicos eg');
    
        $consulta = new Consulta();
        $consulta->fecha = $fechaActual;
        $consulta->hora = $horaActual;
        $consulta->Estado = 'Atendido';
        $consulta->exaginecologicos_id = $num[0]->num;
        $consulta->citas_id = $request->get('Dato');
        $consulta->save();

        $cita = Cita::where('id', '=', $request->get('Dato'))->first();
        $cita->estado = 'ATENDIDO';
        $cita->save();

        return redirect('home');        
    }

    public function descarga($file)
    {
        $pathtoFile = '../storage/'.$file;
        return response()->download($pathtoFile);
    }

    public function ver()
    {
        $consultas = DB::SELECT('SELECT ci.id AS citas_id, c.fecha AS FechaConsulta, c.hora AS HoraConsulta, ci.estado AS EstadoCita, ci.motivo AS MotivoCita, CONCAT(p.nombre, " ", p.apellido) AS NombrePaciente, p.dni AS DNI, p.edad AS Edad 
                                  FROM consultas c, citas ci, pacientes p
                                  WHERE c.citas_id = ci.id AND ci.pacientes_id = p.id');

        return view('consulta.ver', compact('consultas'));
    }

    public function detalle($id)
    {
        $aux = DB::SELECT('SELECT estado FROM citas WHERE id = "'.$id.'"');
        
        $triaje = DB::SELECT('SELECT p.id AS pacientes_id, CONCAT(p.nombre, " ", p.apellido) AS pacNombre, p.dni AS pacDNI, p.telefono AS pacTelefono, p.direccion AS pacDireccion, p.lugarnac AS pacLugarNacimiento, p.lugarproc AS pacLugarProcedencia, p.correo AS pacCorreo, p.fecnac AS pacFechaNacimiento, p.edad AS pacEdad,
                                      o.nombre AS ocuNombrepac, i.nombre AS insNombrepac, ec.nombre AS escNombrepac, g.nombre as genNombrepac,
                                      ac.id AS acompanantes_id, CONCAT(ac.nombre, " ", ac.apellido) AS acoNombre, ac.dni AS acoDNI, ac.telefono AS acoTelefono, ac.correo AS acoCorreo, ac.direccion AS acoDireccion, ac.fecnac AS acoFechaNaciemiento, ac.edad AS acoEdad,
                                      c.id AS citas_id, c.fecexp AS citFechaExpedicion, c.estado AS citEstado, c.motivo AS citMorivo, c.horaten AS citHoraAtencion,
                                      ap.id AS antecpersonals_id, ap.fecultimregla AS apeFechaUltimaRegla, ap.cangestaciones AS apeCantidaGestaciones, ap.papanicolao AS apePapaNicolao,
                                      ps.valora AS psValoraap, ps.valorb AS psValorbap, ps.valorc AS psValorcap, ps.valord AS psValordap,
                                      mc.nombre AS mcNombreap,
                                      fv.id AS funcvitals_id, fv.pulso AS fvPulso, fv.temperatura AS fvTemperatura, fv.talla AS fvTalla, fv.peso AS fvPeso,
                                      par.sistolica AS parSistolicafv, par.diastolica AS parDiastolicafv,
                                      a.nombre AS aAlergia
                               FROM triaje t
                               INNER JOIN citas c ON t.citas_id = c.id
                               INNER JOIN pacientes p ON c.pacientes_id = p.id
                               INNER JOIN ocupacions o ON p.ocupacions_id = o.id
                               INNER JOIN instruccions i ON p.instruccions_id = i.id
                               INNER JOIN estadocivils ec ON p.estadocivils_id = ec.id
                               INNER JOIN generos g ON p.generos_id = g.id
                               LEFT JOIN acompañantes ac ON c.acompañantes_id = ac.id
                               INNER JOIN antecpersonals ap ON t.antecpersonals_id = ap.id
                               INNER JOIN ps ON ap.ps_id = ps.id
                               INNER JOIN manticonceptivos mc ON ap.manticonceotivos_id = mc.id
                               INNER JOIN funcvitals fv ON t.funcvitals_id = fv.id
                               INNER JOIN presarterials par ON fv.presarterials_id = par.id
                               INNER JOIN alergia_triaje atr ON atr.triaje_id = t.id
                               INNER JOIN alergias a ON atr.alergias_id = a.id
                               WHERE c.id = "'.$id.'"');

        if ($aux[0]->estado == "ATENDIDO") {
            $consultas = DB::SELECT('SELECT c.id AS consultas_id, c.fecha AS cFecha, c.hora AS cHora, c.estado AS cEstado, c.motivo AS cMotivo, c.tiempo AS cTiempo, -- Datos consulta
                                             a.nombre AS aApetito, d.nombre AS dDeposicion, s.nombre AS sSed, su.nombre AS suSueño, o.nombre AS oOrina, -- Datos Funciones Biologicas
                                             eg.id AS exaginecologicos_id, eg.geybus AS egGeyBus, eg.cervix AS egCervix, eg.ovarios AS egOvarios, eg.vagina AS egVagina, eg.utero AS egUtero, eg.fondoseco AS egFondoSeco -- Datos Exámen Ginecológico
                                      FROM consultas c, funcbiologicas fb, exaginecologicos eg, apetitos a, deposicions d, seds s, sueños su, orinas o
                                      WHERE c.funcbiologicas_id = fb.id AND c.exaginecologicos_id = eg.id AND fb.apetitos_id = a.id AND fb.deposicions_id = d.id AND fb.seds_id = s.id AND fb.sueños_id = su.id AND fb.orinas_id = o.id AND c.citas_id = "'.$id.'"');

            $diagnostico = DB::SELECT('SELECT ci.codigo AS Codigo, ci.descripcion AS Descripcion FROM diagnostico_cies dc, consultas c, cies ci
                                        WHERE dc.consultas_id = c.id AND dc.cies_id = ci.id AND c.citas_id = "'.$id.'"');

            $tratamientos = DB::SELECT('SELECT t.indicacion AS Indicacion, m.nombre AS Medicamento FROM tratamientos t, consultas c, medicamentos m
                                         WHERE t.consultas_id = c.id AND t.medicamentos_id = m.id AND c.citas_id = "'.$id.'"');

            $observacion = DB::SELECT('SELECT o.nombre FROM observacions o, consultas c WHERE o.consultas_id = c.id AND c.citas_id = "'.$id.'"');
        }else {
            $consultas = DB::SELECT('SELECT "Pendiente" AS consultas_id, "Pendiente" AS cFecha, "Pendiente" AS cHora, "Pendiente" AS cEstado, "Pendiente" AS cMotivo, "Pendiente" AS cTiempo, -- Datos consulta
                                             "Pendiente" AS aApetito, "Pendiente" AS dDeposicion, "Pendiente" AS sSed, "Pendiente" AS suSueño, "Pendiente" AS oOrina, -- Datos Funciones Biologicas
                                             "Pendiente" AS insgenerals_id, "Pendiente" AS iCabeza, "Pendiente" AS iCuello, "Pendiente" AS iTorax, "Pendiente" AS iMamas, "Pendiente" AS iPulmonesCardio, "Pendiente" AS iAbdomen, -- Datos de Inspecciones Generales
                                             "Pendiente" AS exaginecologicos_id, "Pendiente" AS egGeyBus, "Pendiente" AS egCervix, "Pendiente" AS egOvarios, "Pendiente" AS egVagina, "Pendiente" AS egUtero, "Pendiente" AS egFondoSeco -- Datos Exámen Ginecológico');

            $diagnostico = DB::SELECT('SELECT "Pendiente" AS Codigo, "Pendiente" AS Descripcion');

            $tratamientos = DB::SELECT('SELECT "Pendiente" AS Indicacion, "Pendiente" AS Medicamento');

            $observacion = DB::SELECT('SELECT "Pendiente" AS nombre');
        }
        
        if($consultas == null ){
            $consultas = DB::SELECT('SELECT "Pendiente" AS consultas_id, "Pendiente" AS cFecha, "Pendiente" AS cHora, "Pendiente" AS cEstado, "Pendiente" AS cMotivo, "Pendiente" AS cTiempo, -- Datos consulta
                                             "Pendiente" AS aApetito, "Pendiente" AS dDeposicion, "Pendiente" AS sSed, "Pendiente" AS suSueño, "Pendiente" AS oOrina, -- Datos Funciones Biologicas
                                             "Pendiente" AS insgenerals_id, "Pendiente" AS iCabeza, "Pendiente" AS iCuello, "Pendiente" AS iTorax, "Pendiente" AS iMamas, "Pendiente" AS iPulmonesCardio, "Pendiente" AS iAbdomen, -- Datos de Inspecciones Generales
                                             "Pendiente" AS exaginecologicos_id, "Pendiente" AS egGeyBus, "Pendiente" AS egCervix, "Pendiente" AS egOvarios, "Pendiente" AS egVagina, "Pendiente" AS egUtero, "Pendiente" AS egFondoSeco -- Datos Exámen Ginecológico');
                                             
            $examenAux = DB::SELECT('SELECT e.* FROM citas c, cita_motivo ct, exauxresult e WHERE c.id = ct.citas_id AND e.cita_motivo_id = ct.id AND c.id = "'.$id.'"');
        


            return view('consulta.detalle', compact('triaje', 'consultas', 'diagnostico', 'tratamientos', 'observacion', 'examenAux'));
        }else{
            $examenAux = DB::SELECT('SELECT e.* FROM citas c, cita_motivo ct, exauxresult e WHERE c.id = ct.citas_id AND e.cita_motivo_id = ct.id AND c.id = "'.$id.'"');
            return view('consulta.detalle', compact('triaje', 'consultas', 'diagnostico', 'tratamientos', 'observacion', 'examenAux')); 
        }
    }

    public function examexterno(Request $request)
    {
        $examenExterno=DB::SELECT('select ee.id, ee.nombre from examenexterno ee, tipoexamexterno et WHERE et.id = ee.tipoexamexterno_id AND et.id = "'.$request->id.'"');
        $resultado = $request->id;
        return response()->json(["view"=>view('consulta.examenxterno',compact('examenExterno'))->render(),'resultado'=>$resultado]);
    }

    public function exportPDF()
    {
        $consultas = DB::SELECT('SELECT c.fecha AS FechaConsulta, c.hora AS HoraConsulta, ci.estado AS EstadoCita, ci.motivo AS MotivoCita, CONCAT(p.nombre, " ", p.apellido) AS NombrePaciente, p.dni AS DNI, p.edad AS Edad 
                                            FROM consultas c, citas ci, pacientes p
                                            WHERE c.citas_id = ci.id AND ci.pacientes_id = p.id');

        // $pdf = PDF::loadview('consulta.pdfcon', compact('consultas'));
        // return $pdf->download('Consultas-Para-'.date('d/m/Y').'.pdf');
    }

    public function recetaPDF($id)
    {
        $receta = DB::SELECT('SELECT c.id AS consultas_id, t.indicacion AS indicaciones, m.nombre AS medicamentos 
                               FROM consultas c, tratamientos t, medicamentos m
                               WHERE t.consultas_id = c.id AND t.medicamentos_id = m.id AND c.citas_id = "'.$id.'"');

        $paciente = DB::SELECT('SELECT CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.edad, p.correo FROM pacientes p, citas c
                                 WHERE c.pacientes_id = p.id AND c.id = "'.$id.'"');

        // $pdf = PDF::loadview('consulta.receta', compact('receta', 'paciente'));
        // return $pdf->download('Receta-de-'.$paciente[0]->nombre.'.pdf');
    }

    public function ordenPDF($id)
    {
        $orden = DB::SELECT('SELECT c.motivo, o.descripcion AS medico, l.nombre AS laboratorio, l.ruc AS ruclab, ee.nombre AS examen  
                               FROM consultas c, ordenexam o, consulta_orden co, examenexterno ee, laboratorios l
                               WHERE co.consultas_id = c.id AND co.ordenexam_id = o.id AND co.examenexterno_id = ee.id AND o.laboratorios_id = l.id AND  c.citas_id = "'.$id.'"');

        $paciente = DB::SELECT('SELECT CONCAT(p.nombre, " ", p.apellido) AS nombre, p.dni, p.telefono, p.direccion, p.edad, p.correo FROM pacientes p, citas c
                                 WHERE c.pacientes_id = p.id AND c.id = "'.$id.'"');

        // $pdf = PDF::loadview('consulta.orden', compact('orden', 'paciente'));
        // return $pdf->download('Orden-de-'.$paciente[0]->nombre.'.pdf');
    }
    
    public function filtrado(Request $request)
    {
        $fechaInicio = $request->fechainicio;
        $fechaFin = $request->fechafin;
        $filtro = $request->filtro;

        $consultas = DB::SELECT('SELECT ci.id AS citas_id, c.fecha AS FechaConsulta, c.hora AS HoraConsulta, ci.estado AS EstadoCita, ci.motivo AS MotivoCita, CONCAT(p.nombre, " ", p.apellido) AS NombrePaciente, p.dni AS DNI, p.edad AS Edad 
                                  FROM consultas c, citas ci, pacientes p
                                  WHERE c.citas_id = ci.id AND ci.pacientes_id = p.id AND (fecha BETWEEN "'.$fechaInicio.'" AND "'.$fechaFin.'") AND CONCAT(p.nombre, " ", p.apellido) LIKE "%'.$filtro.'%"');

        return response()->json(["view"=>view('consulta.listConsultas',compact('consultas'))->render()]);
    }

    
}
