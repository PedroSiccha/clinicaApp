<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprobanteController extends Controller
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
        $cita = DB::SELECT('SELECT c.id as idCitas, CONCAT(pe.nombres," ",pe.apellidos) as nombre, a.nombre as especialidad, c.fechaaten as fecAten, co.id as idComprobante, a.id as idArea 
                            FROM citas c
                            LEFT JOIN comprobantes co
                            ON co.citas_id = c.id
                            INNER JOIN pacientes p
                            ON c.pacientes_id = p.id
                            INNER JOIN areas a
                            ON c.areas_id = a.id 
                            INNER JOIN personas pe 
                            ON p.personas_id = pe.id
                            WHERE co.id IS NULL;');
        
        return view('/comprobante/create', compact('cita'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comprobante = new Comprobante();
        $comprobante->fecha = $request->get('fecha');
        $comprobante->monto = $request->get('monto');
        $comprobante->numero = $request->get('numero');
        $comprobante->serie = $request->get('serie');
        $comprobante->tipopagos_id = 1;
        $comprobante->citas_id = $request->get('citas_id');
        //$comprobante->areas_id = $request->get('areas_id');
        $comprobante->save();

        return redirect('/comprobante/create');
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
