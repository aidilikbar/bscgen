<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $table = 'objective';

    protected $fillable = ['perspective_id', 'description'];

    public function perspective()
    {
        return $this->belongsTo(Perspective::class);
    }
}