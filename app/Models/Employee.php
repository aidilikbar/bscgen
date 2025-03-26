<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Employee extends Model
{
    protected $fillable = [
        'name',
        'position_id',
        'business_unit',
        'supervisor_id',
    ];

    // Self-referencing relationship
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }

    // Position relation
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'supervisor_id');
    }
}
