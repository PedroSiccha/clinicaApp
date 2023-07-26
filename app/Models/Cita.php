<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    // use HasFactory;
    protected $fillable = ['id','fechaexp','fechaaten','histclinicas_id'];

    public static function citHis($id){
    	return Cita::where('histclinicas_id', '=', $id) -> get();
    }
}
