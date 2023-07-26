<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    // use HasFactory;
    protected $fillable = ['id','nombre','ruta', 'exaginecologicos_id'];

    public static function docEgin($id){
    	return Documento::where('exaginecologicos_id', '=', $id) -> get();
    }
}
