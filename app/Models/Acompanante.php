<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    // use HasFactory;
    protected $table = 'acompañantes';
    protected $fillable = ['id','nombre', 'apellido', 'dni', 'telefono', 'correo', 'direccion', 'fecnac', 'edad', 'generos_id', 'parentezco'];

    public static function acoGen($id){
    	return Genero::where('generos_id', '=', $id) -> get();
    }
}
