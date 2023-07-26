<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    public function store(Request $request)
    {
        $talla = new Talla();
        $talla->nombre = $request->get('nombre');
        $talla->save();
        return back();
    }
}
