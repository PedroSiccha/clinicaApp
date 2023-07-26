<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentezco extends Model
{
    // use HasFactory;
    protected $table = 'parentezcos';
    protected $fillable = ['id', 'nombre', 'acompañantes_id', 'pacientes_id'];

    
    public static function parAco($id){
    	return Parentezco::where('acompañantes_id', '=', $id) -> get();
    }
    public static function parPac($id){
    	return Parentezco::where('pacientes_id', '=', $id) -> get();
    }
}
