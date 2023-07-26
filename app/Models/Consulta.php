<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    // use HasFactory;
    protected $fillable = ['id','fecha','hora','estado', 'citas_id', 'funcbiologicas_id', 'motivo', 'tiempo', 'exaginecologicos_id'];

    public static function conCit($id){
    	return Consulta::where('citas_id', '=', $id) -> get();
    }   
    public static function conFbi($id){
    	return Consulta::where('funcbiologicas_id', '=', $id) -> get();
    }
    public static function conEgi($id){
        return Consulta::where('exaginecologicos_id', '=', $id) -> get();
    }
}
