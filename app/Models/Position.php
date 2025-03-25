<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'business_unit',
        'supervisor_id',
    ];

    public function supervisor()
    {
        return $this->belongsTo(Position::class, 'supervisor_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Position::class, 'supervisor_id');
    }
}
