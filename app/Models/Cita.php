<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    // use HasFactory;
    protected $fillable = ['id','fecexp','fecaten','estado','motivo','tiempo','horaten', 'pacientes_id', 'comprobantes_id', 'acompañantes_id', 'users_id'];

    public static function citPac($id){
    	return Cita::where('pacientes_id', '=', $id) -> get();
    }
    public static function citCom($id){
    	return Cita::where('comprobantes_id', '=', $id) -> get();
    }
    public static function citAco($id){
    	return Cita::where('acompañantes_id', '=', $id) -> get();
    }
    public static function citUse($id){
    	return Cita::where('users_id', '=', $id) -> get();
    }
}
