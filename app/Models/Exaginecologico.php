<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exaginecologico extends Model
{
    // use HasFactory;
    protected $table = 'exaginecologicos';
    protected $fillable = ['id','geybus', 'cervix', 'ovarios', 'vagina', 'utero', 'findoseco'];
}
