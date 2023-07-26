<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadocivil = DB::SELECT('SELECT *
                                   FROM estadocivils');

        $genero = DB::SELECT('SELECT * 
                              FROM generos;'); 

       $instruccion = DB::SELECT('SELECT *
                                  FROM instruccions;');

       $ocupacion = DB::SELECT('SELECT * 
                                FROM ocupacions;');
        return view('configuracion.index', compact('estadocivil','genero','instruccion', 'ocupacion'));
    }

    public function destroy()
    { 
        if ($parentezco = DB::table('parentezcos')->delete()) {
            $sumPar = 1;
        }else {
            $resultado = "Tabla Vacia: Parentezcos";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($acompañantes = DB::table('acompañantes')->delete()) {
            $sumAco = 1;
        }else {
            $resultado = "Tabla Vacia: Acompañantes";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($alergia_triaje = DB::table('alergia_triaje')->delete()) {
            $sumATr = 1;
        }else {
            $resultado = "Tabla Vacia: Alergia de Triaje";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($antecpatologicos = DB::table('antecpatologicos')->delete()) {
            $sumAPa = 1;
        }else {
            $resultado = "Tabla Vacia: Antecedentes Patológicos";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($antecpersonals = DB::table('antecpersonals')->delete()) {
            $sumAPe = 1;
        }else {
            $resultado = "Tabla Vacia: Antecedentes Personales";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($cita_exaginecologicos = DB::table('cita_exaginecologicos')->delete()) {
            $sumCEx = 1;
        }else {
            $resultado = "Tabla Vacia: Cita de Exámen Ginecológicos";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($citas = DB::table('citas')->delete()) {
            $sumCit = 1;
        }else {
            $resultado = "Tabla Vacia: Citas";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($comprobantes = DB::table('comprobantes')->delete()) {
            $sumCom = 1;
        }else {
            $resultado = "Tabla Vacia: Comprobantes";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($consulta_diagnostico = DB::table('consulta_diagnostico')->delete()) {
            $sumCDi = 1;
        }else {
            $resultado = "Tabla Vacia: Consulta Diagnóstico";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($consulta_orden = DB::table('consulta_orden')->delete()) {
            $sumCOr = 1;
        }else {
            $resultado = "Tabla Vacia: Consulta Orden";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($consultas = DB::table('consultas')->delete()) {
            $sumCon = 1;
        }else {
            $resultado = "Tabla Vacia: Consultas";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($diagnostico_cies = DB::table('diagnostico_cies')->delete()) {
            $sumDCi = 1;
        }else {
            $resultado = "Tabla Vacia: Diagnosticos CIES";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($documentos = DB::table('documentos')->delete()) {
            $sumDoc = 1;
        }else {
            $resultado = "Tabla Vacia: Documentos";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($exaginecologicos = DB::table('exaginecologicos')->delete()) {
            $sumEGi = 1;
        }else {
            $resultado = "Tabla Vacia: Exámenes Ginecológicos";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($examens = DB::table('examens')->delete()) {
            $sumExa = 1;
        }else {
            $resultado = "Tabla Vacia: Exámenes";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($insgenerals = DB::table('insgenerals')->delete()) {
            $sumIGe = 1;
        }else {
            $resultado = "Tabla Vacia: Inspecciones Generales";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($observacions = DB::table('observacions')->delete()) {
            $sumObs = 1;
        }else {
            $resultado = "Tabla Vacia: Observaciones";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($ordenexam = DB::table('ordenexam')->delete()) {
            $sumOrd = 1;
        }else {
            $resultado = "Tabla Vacia: Orden de Exámen";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($pacientes = DB::table('pacientes')->delete()) {
            $sumPac = 1;
        }else {
            $resultado = "Tabla Vacia: Paciente";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($tratamientos = DB::table('tratamientos')->delete()) {
            $sumTra = 1;
        }else {
            $resultado = "Tabla Vacia: Tratamiento";
            return response()->json(['resultado'=>$resultado]);
        }

        if ($triaje = DB::table('triaje')->delete()) {
            $sumTri = 1;
        }else {
            $resultado = "Tabla Vacia: Triaje";
            return response()->json(['resultado'=>$resultado]);
        }

        $resultado = "BD Limpiada Satisfactoriamente";
        return response()->json(['resultado'=>$resultado]);
        

    }
}
