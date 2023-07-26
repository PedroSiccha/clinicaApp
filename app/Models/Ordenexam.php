<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenexam extends Model
{
    // use HasFactory;
    protected $table = 'ordenexam';
    protected $fillable = ['id','descripcion', 'fecha', 'consultas_id', 'estado'];

    public static function ordECon($id){
    	return Ordenexam::where('consultas_id', '=', $id) -> get();
    }
}
