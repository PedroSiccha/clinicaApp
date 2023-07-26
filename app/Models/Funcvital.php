<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcvital extends Model
{
    // use HasFactory;
    protected $table = 'funcvitals';
    protected $fillable = ['id', 'presarterials_id', 'pulso', 'temperatura', 'talla', 'peso'];

    
    public static function fviPre($id){
    	return Funcvital::where('presarterials_id', '=', $id) -> get();
    }
}
