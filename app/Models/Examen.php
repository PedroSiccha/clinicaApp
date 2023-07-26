<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    // use HasFactory;
    protected $fillable = ['id','nombre','resultado','funcvitales_id','funcbiologicas_id','tipoexamenes_id','consultas_id'];

    public static function exaFvi($id){
    	return Examen::where('funcvitales_id', '=', $id) -> get();
    }

    public static function exaFbi($id){
        return Examen::where('funcbiologicas_id','=', $id) -> get();
    }

    public static function exaCon($id){
        return Examen::where('consultas_id', '=', $id) -> get();
    }

    public static function exaTex($id){
        return Examen::where('tipoexamenes_id', '=', $id) -> get();
    }
}
