<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScorecardDetail extends Model
{
    protected $fillable = [
        'scorecard_id',
        'perspective_id',
        'objective_id',
        'kpi_id',
        'baseline',
        'target',
        'weight',
        'realization',
    ];

    public function scorecard()
    {
        return $this->belongsTo(Scorecard::class);
    }

    public function perspective()
    {
        return $this->belongsTo(Perspective::class);
    }

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function kpi()
    {
        return $this->belongsTo(KPI::class);
    }
}