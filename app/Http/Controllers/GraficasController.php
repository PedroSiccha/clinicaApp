<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficasController extends Controller
{
    public function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }

    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $citas = DB::SELECT('SELECT * FROM citas WHERE created_at Between "'.$fecha_inicial.'" And "'.$fecha_final.'"');
        $ct=count($citas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($citas as $citas){
        $diasel=intval(date("d",strtotime($citas->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function registros_mesTriaje($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $citas=DB::SELECT('SELECT * FROM triaje WHERE created_at Between "'.$fecha_inicial.'" And "'.$fecha_final.'"');
        $ct=count($citas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($citas as $citas){
        $diasel=intval(date("d",strtotime($citas->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function registros_mesConsulta($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $citas = DB::SELECT('SELECT * FROM consultas WHERE created_at Between "'.$fecha_inicial.'" And "'.$fecha_final.'"');
        $ct=count($citas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($citas as $citas){
            $diasel=intval(date("d",strtotime($citas->created_at) ) );
            $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function registros_gasto($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $citas = Cita::whereBetween('created_at', array($fecha_inicial,  $fecha_final))->get('motivo');
        $ct=sum($citas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($citas as $citas){
            $diasel=intval(date("d",strtotime($citas->created_at) ) );
            $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function total_publicaciones(){
        $citas=Cita::where('estado','ATENDIDO');
        $ctp=count($citas);

        $citas=Cita::all();
        $ct =count($citas);
        
        for($i=0;$i<=$ctp-1;$i++){
         $idTP = $tiposprestamos[$i]->id;
         $numerodeprestamo[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP = $prestamos[$i]->idtiposprestamos;
         $numerodeprestamo[$idTP]++;
        }

        $data=array("totaltipos"=>$ctp,"tipos"=>$tiposprestamos, "numerodeprestamo"=>$numerodeprestamo);
        return json_encode($data);
    }

    public function index()
    {
        $anio=date("Y");
        $mes=date("m");
        return view("listados.listado_graficas")
               ->with("anio",$anio)
               ->with("mes",$mes);
    }

    public function triaje()
    {
        $anio=date("Y");
        $mes=date("m");
        return view("listados.listado_graficas_triaje")
               ->with("anio",$anio)
               ->with("mes",$mes);
    }

    public function consulta()
    {
        $anio=date("Y");
        $mes=date("m");
        return view("listados.listado_graficas_consulta")
               ->with("anio",$anio)
               ->with("mes",$mes);
    }
}
