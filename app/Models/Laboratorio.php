<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    // use HasFactory;
    protected $table = 'laboratorios';
    protected $fillable = ['id', 'nombre', 'direccion', 'telefono', 'correo', 'ruc'];
}
