<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insgeneral extends Model
{
    // use HasFactory;
    protected $fillable = ['id', 'cabeza', 'cuello', 'torax', 'mamas', 'pulmonesycardio', 'abdomen'];
}
