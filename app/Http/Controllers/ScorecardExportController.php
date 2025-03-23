<?php

namespace App\Http\Controllers;

use App\Models\Scorecard;
use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Exports\ScorecardExport;

class ScorecardExportController extends Controller
{
    public function pdf(Scorecard $scorecard)
    {
        $scorecard->load(['employee', 'details.perspective', 'details.objective', 'details.kpi']);
        $pdf = PDF::loadView('scorecards.export-pdf', compact('scorecard'));
        return $pdf->download("scorecard-{$scorecard->employee->name}-{$scorecard->year}.pdf");
    }

    public function excel(Scorecard $scorecard)
    {
        return Excel::download(new ScorecardExport($scorecard), "scorecard-{$scorecard->employee->name}-{$scorecard->year}.xlsx");
    }
}