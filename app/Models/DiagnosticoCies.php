<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoCies extends Model
{
    // use HasFactory;
    protected $table = 'diagnostico_cies';
    protected $fillable = ['id', 'cies_id', 'consultas_id'];

    
    public static function dciCie($id){
    	return DiagnosticoCies::where('cies_id', '=', $id) -> get();
    }
    public static function dciCon($id){
    	return DiagnosticoCies::where('consultas_id', '=', $id) -> get();
    }
}
