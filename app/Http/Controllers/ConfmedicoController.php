<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfmedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alergia = DB::SELECT('SELECT id, nombre 
                                FROM alergias');

        $metodoanticonceptivo = DB::SELECT('SELECT id, nombre
                                             FROM manticonceptivos');

        $sed = DB::SELECT('SELECT id, nombre
                            FROM seds');

        $apetito = DB::SELECT('SELECT id, nombre
                                FROM apetitos');

        $deposicion = DB::SELECT('SELECT id, nombre
                                   FROM deposicions');

        $sueño = DB::SELECT('SELECT id, nombre
                                   FROM sueños');

        $orina = DB::SELECT('SELECT id, nombre
                                   FROM orinas');

        $presarterial = DB::SELECT('SELECT id, sistolica, diastolica
                                   FROM presarterials');

        $laboratorio = DB::SELECT('SELECT * FROM laboratorios');

        $medicamentos = DB::SELECT('SELECT * FROM medicamentos');

        $cie = DB::SELECT('SELECT c.id, c.codigo, c.descripcion, t.id, t.nombre AS tipo
                            FROM cies c, tipocies t
                            WHERE c.tipocies_id = t.id');

        $tipocie = DB::SELECT('SELECT * FROM tipocies');

        return view('configmedico.index', compact('tipocie' ,'cie','alergia','metodoanticonceptivo', 'sed', 'apetito', 'deposicion', 'sueño', 'orina', 'presarterial', 'laboratorio', 'medicamentos'));
    }

}
