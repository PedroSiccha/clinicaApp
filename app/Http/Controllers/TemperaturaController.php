<?php

namespace App\Http\Controllers;

use App\Models\Temperatura;
use Illuminate\Http\Request;

class TemperaturaController extends Controller
{
    public function store(Request $request)
    {
        $temperatura = new Temperatura();
        $temperatura->nominacion = $request->get('nombre');
        $temperatura->save();
        return back();
    }
}
