<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlergiaTriaje extends Model
{
    // use HasFactory;
    protected $table = 'alergia_triaje';
    protected $fillable = ['id', 'alergias_id', 'triaje_id'];

    
    public static function atrAle($id){
    	return AlergiaTriaje::where('alergias_id', '=', $id) -> get();
    }
    public static function atrTri($id){
    	return AlergiaTriaje::where('triaje_id', '=', $id) -> get();
    }
}
