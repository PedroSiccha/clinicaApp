<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    // use HasFactory;
    protected $fillable = ['id','descripcion','consultas_id'];

    public static function diaCon($id){
    	return Diagnostico::where('consultas_id', '=', $id) -> get();
    }
}
