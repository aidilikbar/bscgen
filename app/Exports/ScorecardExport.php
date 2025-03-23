<?php

namespace App\Exports;

use App\Models\Scorecard;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ScorecardExport implements FromView
{
    protected $scorecard;

    public function __construct(Scorecard $scorecard)
    {
        $this->scorecard = $scorecard->load(['employee', 'details.perspective', 'details.objective', 'details.kpi']);
    }

    public function view(): View
    {
        return view('scorecards.export-excel', [
            'scorecard' => $this->scorecard
        ]);
    }
}
