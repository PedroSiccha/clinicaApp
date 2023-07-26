<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecpatologico extends Model
{
    // use HasFactory;
    protected $table = 'antecpatologicos';
    protected $fillable = ['id', 'nombre', 'triaje_id'];

    
    public static function apaTri($id){
    	return Antecpatologico::where('triaje_id', '=', $id) -> get();
    }
}
