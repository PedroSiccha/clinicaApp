<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use Illuminate\Http\Request;

class PesoController extends Controller
{
    public function store(Request $request)
    {
        $peso = new Peso();
        $peso->nombre = $request->get('nombre');
        $peso->save();
        return back();
    }
}
