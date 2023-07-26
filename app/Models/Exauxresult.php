<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exauxresult extends Model
{
    // use HasFactory;
    protected $table = 'exauxresult';
    protected $fillable = ['id', 'nombre', 'detalle', 'ruta', 'cita_motivo_id'];

    
    public static function exrCmo($id){
    	return Exauxresult::where('cita_motivo_id', '=', $id) -> get();
    }
}
