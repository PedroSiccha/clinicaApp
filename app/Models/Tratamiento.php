<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    // use HasFactory;
    protected $fillable = ['id','indicacion', 'consultas_id', 'medicamentos_id', 'cantidad', 'dosis', 'via', 'frecuencia', 'duracion'];

    public static function traCon($id){
    	return Tratamiento::where('consultas_id', '=', $id) -> get();
    }
    public static function traMed($id){
    	return Tratamiento::where('medicamentos_id', '=', $id) -> get();
    }
}
