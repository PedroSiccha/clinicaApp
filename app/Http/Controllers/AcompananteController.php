<?php

namespace App\Http\Controllers;

use App\Models\Acompanante;
use Illuminate\Http\Request;

class AcompananteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('Hola Store');
        $resultado = "" + $request->nombre + $request->apellido + $request->dni + $request->telefono + $request->correo + $request->direccion + $request->fechanacimiento + $request->genero;
       /* $fechaInicial = $request->fechanacimiento;
        $fechaActual = date('Y-m-d'); // la fecha del ordenador
        $diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
        $anio = floor($diff / (365*60*60*24));
        $edad = intval($anio*1);*/

        /*$acompanante = new Acompanante();
        $acompanante->nombre = $request->nombre;
        $acompanante->apellido = $request->apellido;
        $acompanante->dni = $request->dni;
        $acompanante->telefono = $request->telefono;
        $acompanante->correo = $request->correo;
        $acompanante->direccion = $request->direccion;
        $acompanante->fecnac = $request->fechanacimiento;
        $acompanante->edad = $edad;
        $acompanante->generos_id = $request->genero;
        
        if ($acompanante->save()) {
            $resultado = "Acompañante registrado";
        }else {
            $resultado = "Error en registro";
        }
        */        
    }

    public function guardar(Request $request)
    {
        //dd('Hola');

        $resultado = "";
        $fechaInicial = $request->fechanacimiento;
        $fechaActual = date('Y-m-d'); // la fecha del ordenador
        $diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
        $anio = floor($diff / (365*60*60*24));
        $edad = intval($anio*1);
        //$resultado = $edad;
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $dni = $request->dni;
        $telefono = $request->telefono;
        $correo = $request->correo; 
        $direccion = $request->direccion;
        $fechaNacimiento = $request->fechanacimiento;
        $generos = $request->genero;
        $parentezco = $request->parentezco;
        /*$resultado = "Nombre ".$nombre."\nApellido ".$apellido."\nDNI ".$dni."\nTelefono ".$telefono."\nCorreo ".$correo."\nDireccion ".$direccion."\nFecha de Naciemiento ".$fechaNacimiento."\nEdad ".$edad."\nGenero ".$generos."\nParentezco ".$parentezco;
        return response()->json(['resultado'=>$resultado]);*/
        
        $acompanante = new Acompanante();
        $acompanante->nombre = $nombre;
        $acompanante->apellido = $apellido;
        $acompanante->dni = $dni;
        $acompanante->telefono = $telefono;
        $acompanante->correo = $correo;
        $acompanante->direccion = $direccion;
        $acompanante->fecnac = $fechaNacimiento;
        $acompanante->edad = $edad;
        $acompanante->generos_id = $generos;
        $acompanante->parentezco = $parentezco;
        
        if($acompanante->save()){
            $resultado = "Acompañante registrado";
            $nom = $nombre." ".$apellido ;
            $tel = $telefono;
            $paren = $parentezco;
        }else {
            $resultado = "Acompañante no registrado";
        }
           
        
        //$resultado = "Nombres: ".$nombre."\nApellidos: ".$apellido."\nDNI: ".$dni."\nTelefono: ".$telefono."\nCorreo: ".$correo."\nDireccion: ".$direccion."\nFecha de Nacimiento: ".$fechaNacimiento."\nEdad: ".$edad."\nGenero: ".$generos;
        return response()->json(['resultado'=>$resultado, 'nom' => $nom, 'tel' => $tel, 'paren' => $paren]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
