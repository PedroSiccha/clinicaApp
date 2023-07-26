<?php

namespace App\Http\Controllers;

use App\Models\ExaexternoOrdenexam;
use App\Models\Exauxresult;
use App\Models\Ordenexam;
use App\Models\ResultadoExamen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConsultaexamenController extends Controller
{
    public function store(Request $request)
    {
        $users_id = Auth::user()->id;
        $citas_id = $request->citas_id;
        $medico = DB::SELECT('SELECT CONCAT(e.nombre, " ", e.apellido) AS medico FROM users u, empleados e
                               WHERE u.empleados_id = e.id AND u.id = "'.$users_id.'"');

        $ordenExam = new Ordenexam();
        $ordenExam->descripcion = $medico[0]->medico;
        $ordenExam->fecha = $request->fechaOrden;
        $ordenExam->consultas_id = $request->consultas_id;
        $ordenExam->estado = "PENDIENTE";
        if ($ordenExam->save()) {
            $ordenExam_id = DB::SELECT('SELECT MAX(id) AS id FROM ordenexam');
            $idExaExterno=$request->idExaExterno;

            for ($i=0; $i < count($idExaExterno) ; $i++) { 
                $idLlenar=$idExaExterno[$i];
                $ordCons = new ExaexternoOrdenexam();
                $ordCons->ordenexam_id = $ordenExam_id[0]->id;
                $ordCons->examenexterno_id = $idExaExterno[$i];
                $ordCons->estado = "PENDIENTE";
                if ($ordCons->save()) {
                    $resultado = "TOdo Bien";
                }
            }
        }
        $paciente = DB::SELECT('SELECT p.id FROM consultas c, citas ci, pacientes p
                                   WHERE c.citas_id = ci.id AND ci.pacientes_id = p.id AND c.id = "'.$request->consultas_id.'"');
                
        $ordenExamen = DB::SELECT('SELECT o.id AS orden_id, o.descripcion AS medico, o.estado AS estorden, o.fecha AS fechaOrden, re.ruta AS documento
                                    FROM ordenexam o
                                    LEFT JOIN consultas c ON o.consultas_id = c.id 
                                    LEFT JOIN citas ci ON c.citas_id = ci.id 
                                    LEFT JOIN resultadoexamen re ON re.ordenexam_id = o.id
                                    WHERE ci.pacientes_id = "'.$paciente[0]->id.'";');  

        return response()->json(["view"=>view('consulta.tabOrdenExam',compact('ordenExamen'))->render(),'resultado'=>$resultado]);
    }

    public function subirOrdenExamen(Request $request)
    {
       $idOrden = $request->idOrden;
       $pac = DB::SELECT('SELECT p.id, p.nombre, p.apellido 
                                FROM ordenexam oe, consultas c, citas ci, pacientes p
                                WHERE oe.consultas_id = c.id AND c.citas_id = ci.id AND ci.pacientes_id = p.id AND oe.id = "'.$idOrden.'"');
        
        $documento=$request->docOrdExam;
        $paciente = $pac[0]->nombre;
        $subido="";
        $urlGuardar="";

        if ($request->hasFile('docOrdExam')) { 

            $nombre=$documento->getClientOriginalName();
            $extension=$documento->getClientOriginalExtension();
            $nuevoNombre=$paciente.".".$extension;
            $subido = Storage::disk('examenes')->put($nuevoNombre, \File::get($documento));

            if($subido){
                $urlGuardar='images/examenes/'.$nuevoNombre;
            }
        }                        
             
       $orden=Ordenexam::where('id', '=', $idOrden)->first();
       $orden->estado = "FIN";
       if ($orden->save()) {
           $resExam = new ResultadoExamen();
           $resExam->nombre = $request->get('nomDocOrdExam');
           $resExam->estado = "FIN";
           $resExam->descripcion = $request->get('descOrdExam');
           $resExam->laboratorios_id = $request->get('idLabSelect');
           $resExam->ordenexam_id = $idOrden;
           $resExam->ruta = $urlGuardar;
           if ($resExam->save()) {

            $ordenExamen = DB::SELECT('SELECT o.id AS orden_id, o.descripcion AS medico, o.estado AS estorden, o.fecha AS fechaOrden
                                        FROM ordenexam o, consultas c, citas ci
                                        WHERE o.consultas_id = c.id AND c.citas_id = ci.id AND ci.pacientes_id = "'.$pac[0]->id.'"');  

            return response()->json(["view"=>view('consulta.tabOrdenExam',compact('ordenExamen'))->render()]);
           }
       }       
    }

    public function downloadFile($id)
    {
        $dl = ResultadoExamen::find($id);
        return Storage::download($dl->ruta);
    }
    
    public function downloadFileExam($id)
    {
        $dl = Exauxresult::find($id);
        return Storage::download($dl->ruta);
    }

    public function verExam($id)
    {
        $dl = Exauxresult::find($id);
        $filename = $dl->ruta;
        $path = storage_path($filename);
        
        // return Response::make(file_get_contents($path), 200, [
        //  'Content-Type' => 'application/pdf',
        //  'Content-Disposition' => 'inline; filename="'.$filename.'"'
        // ]);
    }
}
