<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcbiologica extends Model
{
    // use HasFactory;
    protected $table = 'funcbiologicas';
    protected $fillable = ['id', 'apetitos_id', 'deposicions_id', 'seds_id', 'sueños_id', 'orinas_id'];

    
    public static function fbiApe($id){
    	return Funcbiologica::where('apetitos_id', '=', $id) -> get();
    }
    public static function fbiDep($id){
    	return Funcbiologica::where('deposicions_id', '=', $id) -> get();
    }
    public static function fbiSed($id){
        return Funcbiologica::where('seds_id', '=', $id) -> get();
    }
    public static function fbiSue($id){
        return Funcbiologica::where('sueños_id', '=', $id) -> get();
    }
    public static function fbiOri($id){
        return Funcbiologica::where('orinas_id', '=', $id) -> get();
    }
}
