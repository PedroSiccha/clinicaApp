<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecpersonale extends Model
{
    // use HasFactory;
    protected $fillable = ['id','nombre','resultados','detalle','histclinicas_id'];

    public static function anpHist($id){
    	return Antecpersonale::where('histclinicas_id', '=', $id) -> get();
    }
}
