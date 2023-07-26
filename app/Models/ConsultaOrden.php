<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaOrden extends Model
{
    // use HasFactory;
    protected $table = 'consulta_orden';
    protected $fillable = ['id','detalle', 'consultas_id', 'ordenexam_id', 'examenexterno_id'];

    public static function corCon($id){
    	return ConsultaOrden::where('consultas_id', '=', $id) -> get();
    }
    public static function corOrd($id){
    	return ConsultaOrden::where('ordenexam_id', '=', $id) -> get();
    }
    public static function corEex($id){
    	return ConsultaOrden::where('examenexterno_id', '=', $id) -> get();
    }
}
