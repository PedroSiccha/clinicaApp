<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histclinica extends Model
{
    // use HasFactory;
    protected $fillable = ['id','numero','fecha','pacientes_id','acompañantes_id'];

    public static function hisPac($id){
    	return Histclinica::where('pacientes_id', '=', $id) -> get();
    }

    public static function hisAco($id){
        return Histclinica::where('acompañantes_id', '=', $id) -> get();
    }
}
