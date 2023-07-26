<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $datas = Rol::orderBy('id')->get();
        return view('rol.index', compact('datas'));
    }

    public function create()
    {
        return view('rol.create');
    }
}
