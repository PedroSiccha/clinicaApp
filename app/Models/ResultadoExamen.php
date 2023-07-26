<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoExamen extends Model
{
    // use HasFactory;
    protected $table = 'resultadoexamen';
    protected $fillable = ['id','nombre', 'estado', 'ruta', 'descripcion', 'laboratorios_id', 'ordenexam_id'];

    public static function rexLab($id){
    	return ResultadoExamen::where('laboratorios_id', '=', $id) -> get();
    }
    public static function rexOex($id){
    	return ResultadoExamen::where('ordenexam_id', '=', $id) -> get();
    }
}
