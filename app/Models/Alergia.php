<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    // use HasFactory;
    protected $fillable = ['id','descripcion','histclinicas_id'];

    public static function aleHis($id){
    	return Alergia::where('histclinicas_id', '=', $id) -> get();
    }
}
