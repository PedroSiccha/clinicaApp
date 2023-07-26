<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    // use HasFactory;
    protected $fillable = ['id','nombre','apellido','dni', 'telefono', 'direccion', 'lugarnac', 'lugarproc', 'correo', 'fecnac', 'edad', 'ocupacions_id', 'instruccions_id', 'estadocivils_id', 'generos_id'];

    public static function pacOcu($id){
    	return Paciente::where('ocupacions_id', '=', $id) -> get();
    }
    public static function pacIns($id){
    	return Paciente::where('instruccions_id', '=', $id) -> get();
    }
    public static function pacEci($id){
    	return Paciente::where('estadocivils_id', '=', $id) -> get();
    }
    public static function pacGen($id){
    	return Paciente::where('generos_id', '=', $id) -> get();
    }
}
