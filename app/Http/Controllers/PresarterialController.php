<?php

namespace App\Http\Controllers;

use App\Models\Presarterial;
use Illuminate\Http\Request;

class PresarterialController extends Controller
{
    public function store(Request $request)
    {
        $presarteria = new Presarterial();
        $presarteria->sistolica = $request->get('sistolica');
        $presarteria->diastolica = $request->get('diastolica');
        $presarteria->save();
        return back();
    }
}
