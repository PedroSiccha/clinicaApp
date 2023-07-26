<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaExamenginecologico extends Model
{
    // use HasFactory;
    protected $table = 'cita_exaginecologicos';
    protected $fillable = ['id', 'citas_id', 'exaginecologicos_id'];

    
    public static function cegCit($id){
    	return CitaExamenginecologico::where('citas_id', '=', $id) -> get();
    }
    public static function cegEgi($id){
    	return CitaExamenginecologico::where('exaginecologicos_id', '=', $id) -> get();
    }
}
