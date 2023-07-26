<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoexamExterno extends Model
{
    // use HasFactory;
    protected $table = 'tipoexamexterno';
    protected $fillable = ['id','nombre', 'detalle'];
}
