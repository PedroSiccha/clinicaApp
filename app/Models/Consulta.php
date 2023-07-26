<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    // use HasFactory;
    protected $fillable = ['id','tiempo','fecha','hora','citas_id'];

    public static function conCit($id){
    	return Consulta::where('citas_id', '=', $id) -> get();
    }
}
