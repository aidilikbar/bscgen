<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use App\Models\Perspective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{

    public function index()
    {
        $objectives = Objective::with('perspective')->get();
        return view('objectives.index', compact('objectives'));
    }

    public function create()
    {
        $perspectives = Perspective::all();
        return view('objectives.create', compact('perspectives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perspective_id' => 'required|exists:perspective,id',
            'description' => 'required|string',
        ]);

        Objective::create($request->only('perspective_id', 'description'));

        return redirect()->route('objectives.index')->with('success', 'Objective created successfully.');
    }

    public function show(Objective $objective)
    {
        return view('objectives.show', compact('objective'));
    }

    public function edit(Objective $objective)
    {
        $perspectives = Perspective::all();
        return view('objectives.edit', compact('objective', 'perspectives'));
    }

    public function update(Request $request, Objective $objective)
    {
        $request->validate([
            'perspective_id' => 'required|exists:perspective,id',
            'description' => 'required|string',
        ]);

        $objective->update($request->only('perspective_id', 'description'));

        return redirect()->route('objectives.index')->with('success', 'Objective updated successfully.');
    }

    public function destroy(Objective $objective)
    {
        $objective->delete();

        return redirect()->route('objectives.index')->with('success', 'Objective deleted successfully.');
    }
}
