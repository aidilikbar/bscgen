<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perspective extends Model
{
    protected $table = 'perspective'; // match your existing table
    protected $fillable = ['name'];
}
