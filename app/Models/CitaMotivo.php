<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaMotivo extends Model
{
    // use HasFactory;
    protected $table = 'cita_motivo';
    protected $fillable = ['id', 'citas_id', 'tipoexaminters_id'];

    public static function cmoCit($id){
    	return CitaMotivo::where('citas_id', '=', $id) -> get();
    }   
    public static function cmoTex($id){
    	return CitaMotivo::where('tipoexaminters_id', '=', $id) -> get();
    } 
}
