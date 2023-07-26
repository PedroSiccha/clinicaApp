<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoCie extends Model
{
    // use HasFactory;
    protected $fillable = ['id','diagnosticos_id', 'cies_id', 'consultas_id'];

    public static function dciCie($id){
    	return DiagnosticoCie::where('diagnosticos_id', '=', $id) -> get();
    }
    public static function dciCon($id){
    	return DiagnosticoCie::where('consultas_id', '=', $id) -> get();
    }
}
