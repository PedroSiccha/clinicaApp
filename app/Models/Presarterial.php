<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presarterial extends Model
{
    // use HasFactory;
    protected $table = 'presarterials';
    protected $fillable = ['id', 'sistolica', 'diastolica'];
}
