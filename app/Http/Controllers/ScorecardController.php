<?php

namespace App\Http\Controllers;

use App\Models\Scorecard;
use App\Models\ScorecardDetail;
use App\Models\Employee;
use App\Models\Perspective;
use App\Models\Objective;
use App\Models\KPI;
use Illuminate\Http\Request;

class ScorecardController extends Controller
{
    public function index()
    {
        $scorecards = Scorecard::with('employee')->paginate(10);
        return view('scorecards.index', compact('scorecards'));
    }

    public function create()
    {
        $employees = Employee::all();
        $perspectives = Perspective::all();
        $objectives = Objective::all();
        $kpis = KPI::all();

        return view('scorecards.create', compact('employees', 'perspectives', 'objectives', 'kpis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'year' => 'required|integer',
            'details' => 'required|array'
        ]);

        $scorecard = Scorecard::create($request->only('employee_id', 'year'));

        foreach ($request->details as $detail) {
            $scorecard->details()->create($detail);
        }

        return redirect()->route('scorecards.index')->with('success', 'Scorecard created successfully.');
    }

    public function show(Scorecard $scorecard)
    {
        $scorecard->load(['employee', 'details.perspective', 'details.objective', 'details.kpi']);
        return view('scorecards.show', compact('scorecard'));
    }

    public function edit(Scorecard $scorecard)
    {
        $employees = Employee::all();
        $perspectives = Perspective::all();
        $objectives = Objective::all();
        $kpis = KPI::all();

        $scorecard->load('details');

        return view('scorecards.edit', compact('scorecard', 'employees', 'perspectives', 'objectives', 'kpis'));
    }

    public function update(Request $request, Scorecard $scorecard)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'year' => 'required|integer',
            'details' => 'required|array'
        ]);

        $scorecard->update($request->only('employee_id', 'year'));

        // Remove old details and add new ones
        $scorecard->details()->delete();

        foreach ($request->details as $detail) {
            $scorecard->details()->create($detail);
        }

        return redirect()->route('scorecards.index')->with('success', 'Scorecard updated successfully.');
    }

    public function destroy(Scorecard $scorecard)
    {
        $scorecard->delete();
        return redirect()->route('scorecards.index')->with('success', 'Scorecard deleted.');
    }
}
