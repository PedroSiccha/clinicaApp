<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenExterno extends Model
{
    // use HasFactory;
    protected $table = 'examenexterno';
    protected $fillable = ['id','nombre', 'tipoexamexterno_id'];

    public static function eexTex($id){
    	return ExamenExterno::where('tipoexamexterno_id', '=', $id) -> get();
    }
}
