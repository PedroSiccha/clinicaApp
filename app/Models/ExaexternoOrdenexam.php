<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaexternoOrdenexam extends Model
{
    // use HasFactory;
    protected $table = 'exaexterno_ordenexam';
    protected $fillable = ['id','detalle', 'estado', 'ordenexam_id', 'examenexterno_id'];

    public static function eeoOex($id){
    	return ExaexternoOrdenexam::where('ordenexam_id', '=', $id) -> get();
    }
    public static function eeoEex($id){
    	return ExaexternoOrdenexam::where('examenexterno_id', '=', $id) -> get();
    }
}
