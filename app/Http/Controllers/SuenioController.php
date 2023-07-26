<?php

namespace App\Http\Controllers;

use App\Models\Suenio;
use Illuminate\Http\Request;

class SuenioController extends Controller
{
    public function store(Request $request)
    {
        $sueño = new Suenio();
        $sueño->nombre = $request->get('nombre');
        $sueño->save();
        return back();
    }
}
