<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecpersonale extends Model
{
    // use HasFactory;
    protected $fillable = ['id','fecultimregla','cangestaciones','papanicolao', 'ps_id', 'manticonceotivos_id'];

    public static function anpPs($id){
    	return Antecpersonale::where('ps_id', '=', $id) -> get();
    }
    public static function anpMan($id){
    	return Antecpersonale::where('manticonceotivos_id', '=', $id) -> get();
    }
}
