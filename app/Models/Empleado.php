<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    // use HasFactory;
    protected $fillable = ['id','nombre','apellido','dni', 'telefono', 'direccion', 'generos_id', 'tipoempleados_id'];

    public static function empGen($id){
    	return Empleado::where('generos_id', '=', $id) -> get();
    }
    public static function empTem($id){
    	return Empleado::where('tipoempleados_id', '=', $id) -> get();
    }
}
