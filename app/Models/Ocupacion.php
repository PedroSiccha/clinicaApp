<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    // use HasFactory;
    protected $fillable = ['id','nombre','pacientes_id'];

    public static function ocuPac($id){
    	return Ocupacion::where('pacientes_id', '=', $id) -> get();
    }
}
