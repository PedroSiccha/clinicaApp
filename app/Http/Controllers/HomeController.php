<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $user = Auth::user();
        $rol = $user->roles->implode('name', ',');
        $fecha = date('Y-m-d');

        $dni = $request->get('doc');

        DB::statement(DB::raw('SET @rownumcita = 0'));
        DB::statement(DB::raw('SET @rownumexamen = 0'));
        DB::statement(DB::raw('SET @rownumconsulta = 0'));
        
        $cita = DB::SELECT('SELECT idPacientes, nombrePac, dni, fecaten, idCita, motivo,horaten, hActual, difhora, difmin, Estado, Numeracion
                            FROM(
                            (SELECT p.id AS idPacientes, CONCAT(p.nombre, " ", p.apellido) AS nombrePac , p.dni, c.fecaten, c.id AS idCita, t.nombre AS motivo,c.horaten AS horaten , (DATE_FORMAT(NOW( ), "%h:%i %p" )) AS hActual,(horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" ))) AS difhora ,(SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) AS difmin, IF((horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0,"Tiempo","Noesta") AS Estado, @rownumcita := @rownumcita + 1 AS Numeracion
                                                                FROM citas c, pacientes p, cita_motivo cm, tipoexaminters t
                                                                where p.id = c.pacientes_id AND cm.citas_id = c.id AND cm.tipoexaminters_id = t.id AND (horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0  AND c.estado = "TRIAJE"  ORDER BY (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" ))) UNION
                            (SELECT p.id AS idPacientes, CONCAT(p.nombre, " ", p.apellido) AS nombrePac , p.dni, c.fecaten, c.id AS idCita, t.nombre AS motivo,c.horaten AS horaten , (DATE_FORMAT(NOW( ), "%h:%i %p" )) AS hActual,(horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" ))) AS difhora , (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) AS difmin,IF((horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0,"Tiempo","Noesta") AS Estado, @rownumcita := @rownumcita + 1 AS Numeracion
                                                                FROM citas c, pacientes p, cita_motivo cm, tipoexaminters t
                                                                where p.id = c.pacientes_id AND cm.citas_id = c.id AND cm.tipoexaminters_id = t.id AND  (horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))>0 AND c.estado = "TRIAJE"  ORDER BY (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" ))) UNION
                            (SELECT p.id AS idPacientes, CONCAT(p.nombre, " ", p.apellido) AS nombrePac , p.dni, c.fecaten, c.id AS idCita, t.nombre AS motivo,c.horaten AS horaten , (DATE_FORMAT(NOW( ), "%h:%i %p" )) AS hActual,(horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" ))) AS difhora , (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) AS difmin,IF((horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0,"Tiempo","Noesta") AS Estado, @rownumcita := @rownumcita + 1 AS Numeracion
                                                                FROM citas c, pacientes p, cita_motivo cm, tipoexaminters t
                                                                where p.id = c.pacientes_id AND cm.citas_id = c.id AND cm.tipoexaminters_id = t.id AND  (horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))<0 AND c.estado = "TRIAJE"  ORDER BY (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )))) citas
                                                                GROUP BY idCita
                                                                ORDER BY horaten');
        
        $examen = DB::SELECT('(SELECT p.id AS idPacientes, CONCAT(p.nombre, " ", p.apellido) AS nombrePac , p.dni, c.fecaten, c.id AS idCita, c.motivo,c.horaten AS horaten , (DATE_FORMAT(NOW( ), "%h:%i %p" )) AS hActual,(horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" ))) AS difhora ,(SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) AS difmin, IF((horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0,"Tiempo","Noesta") AS Estado, @rownumexamen := @rownumexamen + 1 AS Numeracion
                              FROM citas c, pacientes p
                              where p.id = c.pacientes_id AND (horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0  AND c.estado = "EXAMEN"  ORDER BY (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) ) UNION
                              (SELECT p.id AS idPacientes, CONCAT(p.nombre, " ", p.apellido) AS nombrePac , p.dni, c.fecaten, c.id AS idCita, c.motivo,c.horaten AS horaten , (DATE_FORMAT(NOW( ), "%h:%i %p" )) AS hActual,(horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" ))) AS difhora , (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) AS difmin,IF((horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0,"Tiempo","Noesta") AS Estado, @rownumexamen := @rownumexamen + 1 AS Numeracion
                              FROM citas c, pacientes p
                              where p.id = c.pacientes_id AND  (horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))>0 AND c.estado = "EXAMEN"  ORDER BY (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) ) UNION
                              (SELECT p.id AS idPacientes, CONCAT(p.nombre, " ", p.apellido) AS nombrePac , p.dni, c.fecaten, c.id AS idCita, c.motivo,c.horaten AS horaten , (DATE_FORMAT(NOW( ), "%h:%i %p" )) AS hActual,(horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" ))) AS difhora , (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) AS difmin,IF((horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))=0,"Tiempo","Noesta") AS Estado, @rownumexamen := @rownumexamen + 1 AS Numeracion
                              FROM citas c, pacientes p
                              where p.id = c.pacientes_id AND  (horaten-(DATE_FORMAT(NOW( ), "%h:%i %p" )))<0 AND c.estado = "EXAMEN"  ORDER BY (SUBSTRING(horaten, 4, 2) - DATE_FORMAT(NOW( ), "%i" )) )
                              ORDER BY horaten');
 
        $consulta = DB::SELECT('SELECT ci.pacientes_id AS idPaciente, ci.comprobante_id AS idComprobante, ci.acompañantes_id AS idAcompañantes, ci.users_id AS idUser, ci.id AS idCita, t.nombre AS motivo, ci.tiempo, ci.horaten, CONCAT(p.nombre, " ", p.apellido) AS nombrePac, @rownumconsulta := @rownumconsulta + 1 AS Numeracion FROM consultas c
                                 INNER JOIN citas ci ON c.citas_id = ci.id
                                 INNER JOIN pacientes p ON ci.pacientes_id = p.id
                                 LEFT JOIN cita_motivo ct ON ct.citas_id = ci.id
                                 LEFT JOIN tipoexaminters t ON ct.tipoexaminters_id = t.id
                                 WHERE c.estado = "POR ATENDER"
                                 GROUP BY ci.id');
        

        $cantCitas = DB::SELECT('SELECT COUNT(id) AS cantidad FROM citas;');
 
        $cantTriaje = DB::SELECT('SELECT COUNT(id) AS cantidad FROM citas WHERE estado = "TRIAJE"');
 
        $cantConsulta = DB::SELECT('SELECT COUNT(id) AS cantidad FROM citas WHERE estado = "CONSULTA"');

        $cantExamen = DB::SELECT('SELECT COUNT(id) AS cantidad FROM citas WHERE estado = "EXAMEN"');

        return view('home', compact('dni', 'cita', 'consulta', 'cantCitas', 'cantTriaje', 'cantConsulta', 'saludo', 'examen', 'cantExamen'));
    }
}
