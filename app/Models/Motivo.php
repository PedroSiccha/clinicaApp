<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    // use HasFactory;
    protected $fillable = ['id','detalle','consultas_id'];

    public static function motCon($id){
    	return Motivo::where('consultas_id', '=', $id) -> get();
    }
}
