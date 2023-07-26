<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P extends Model
{
    // use HasFactory;
    protected $table = 'ps';
    protected $fillable = ['id','valora','valorb','valorc', 'valord'];
}
