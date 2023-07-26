<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    // use HasFactory;
    protected $fillable = ['id','lugarnac','lugarproc','email','personas_id','estadocivils_id','instruccions_id'];

    public static function pacPer($id){
    	return Paciente::where('personas_id', '=', $id) -> get();
    }

    public static function pacEci($id){
        return Paciente::where('estadocivils_id', '=', $id) -> get();
    }

    public static function pacIns($id){
        return Paciente::where('instruccions_id', '=', $id) -> get();
    }
}
