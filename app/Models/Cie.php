<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cie extends Model
{
    // use HasFactory;
    protected $fillable = ['id','codigo','descripcion','tipocies_id'];

    public static function cieTci($id){
    	return Cie::where('tipocies_id', '=', $id) -> get();
    }

    public function scopeCie($query, $codigo)
    {
    	if (trim($codigo) != "") {
    		$query -> where(DB::raw("codigo"), "=" , "%$codigo%");
    	}
    }

    public function scopeBusqueda($query, $codigo){
        if (trim($codigo) != "") {
            $query->where('codigo', $codigo);
        }
    }
}
