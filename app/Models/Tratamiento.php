<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    // use HasFactory;
    protected $fillable = ['id','descripcion','consultas_id'];

    public static function traCon($id){
    	return Tratamiento::where('consultas_id', '=', $id) -> get();
    }
}
