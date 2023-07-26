<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecpatologico extends Model
{
    // use HasFactory;
    protected $fillable = ['id','detalle','histclinicas_id'];

    public static function antHist($id){
    	return Antecpatologico::where('histclinicas_id', '=', $id) -> get();
    }
}
