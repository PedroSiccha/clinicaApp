<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsgeneralConsulta extends Model
{
    // use HasFactory;
    protected $table = 'insgeneral_consulta';
    protected $fillable = ['id', 'resultado', 'insgenerals_id', 'consultas_id'];

    
    public static function igcIge($id){
    	return InsgeneralConsulta::where('insgenerals_id', '=', $id) -> get();
    }
    public static function igcCon($id){
    	return InsgeneralConsulta::where('consultas_id', '=', $id) -> get();
    }
}
