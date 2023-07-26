<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    // use HasFactory;
    protected $fillable = ['id','descripcion','proxcita','consultas_id'];

    public static function obsCon($id){
    	return Observacion::where('consultas_id', '=', $id) -> get();
    }
}
