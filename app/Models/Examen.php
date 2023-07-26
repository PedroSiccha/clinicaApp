<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    // use HasFactory;
    protected $table = 'examens';
    protected $fillable = ['id','nombre', 'estado', 'laboratorios_id', 'consulta_orden_id'];
}
