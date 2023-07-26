<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triaje extends Model
{
    // use HasFactory;
    protected $table = 'triaje';
    protected $fillable = ['id', 'fecha', 'antecpersonals_id', 'citas_id', 'users_id', 'funcvitals_id'];

    
    public static function triApe($id){
    	return Triaje::where('antecpersonals_id', '=', $id) -> get();
    }
    public static function triFvi($id){
        return Triaje::where('funcvitals_id', '=', $id) -> get();
    }
    public static function triCit($id){
        return Triaje::where('citas_id', '=', $id) -> get();
    }
    public static function triUse($id){
        return Triaje::where('users_id', '=', $id) -> get();
    }
}
