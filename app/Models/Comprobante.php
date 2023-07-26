<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    // use HasFactory;
    protected $fillable = ['id','fecha','monto','numero','serie','tipopagos_id','citas_id','areas_id'];

    public static function comTip($id){
    	return Comprobante::where('tipopagos_id', '=', $id) -> get();
    }

    public static function comCit($id){
        return Comprobante::where('citas_id','=',$id) -> get();
    }

    public static function comAre($id){
        return Comprobante::where('areas_id','=',$id) -> get();
    }
}
