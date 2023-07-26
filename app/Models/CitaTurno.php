<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaTurno extends Model
{
    // use HasFactory;
    protected $fillable = ['id','turnos_id','citas_id'];

    public static function ciaTur($id){
    	return CitaTurno::where('turnos_id', '=', $id) -> get();
    }

    public static function ciaCit($id){
        return CitaTurno::where('citas_id','=',$id) -> get();
    }
}
