<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    protected $table = 'kpi';

    protected $fillable = ['perspective_id', 'description'];

    public function perspective()
    {
        return $this->belongsTo(Perspective::class);
    }
}
