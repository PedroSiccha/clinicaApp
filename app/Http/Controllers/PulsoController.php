<?php

namespace App\Http\Controllers;

use App\Models\Pulso;
use Illuminate\Http\Request;

class PulsoController extends Controller
{
    public function store(Request $request)
    {
        $pulso = new Pulso();
        $pulso->nominacion = $request->get('nombre');
        $pulso->save();
        return back();
    }
}
