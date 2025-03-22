<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\Perspective;
use Illuminate\Http\Request;

class KPIController extends Controller
{
    public function index()
    {
        $kpis = KPI::with('perspective')->get();
        return view('kpis.index', compact('kpis'));
    }

    public function create()
    {
        $perspectives = Perspective::all();
        return view('kpis.create', compact('perspectives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perspective_id' => 'required|exists:perspective,id',
            'description' => 'required|string',
        ]);

        KPI::create($request->only('perspective_id', 'description'));

        return redirect()->route('kpis.index')->with('success', 'KPI created successfully.');
    }

    public function show(KPI $kpi)
    {
        return view('kpis.show', compact('kpi'));
    }

    public function edit(KPI $kpi)
    {
        $perspectives = Perspective::all();
        return view('kpis.edit', compact('kpi', 'perspectives'));
    }

    public function update(Request $request, KPI $kpi)
    {
        $request->validate([
            'perspective_id' => 'required|exists:perspective,id',
            'description' => 'required|string',
        ]);

        $kpi->update($request->only('perspective_id', 'description'));

        return redirect()->route('kpis.index')->with('success', 'KPI updated successfully.');
    }

    public function destroy(KPI $kpi)
    {
        $kpi->delete();

        return redirect()->route('kpis.index')->with('success', 'KPI deleted successfully.');
    }
}
