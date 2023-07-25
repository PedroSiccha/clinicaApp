<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompaniante extends Model
{
    // use HasFactory;
    protected $fillable = ['id','parentezco','personas_id'];

    public static function acoPer($id){
    	return Acompaniante::where('personas_id', '=', $id) -> get();
    }
}
