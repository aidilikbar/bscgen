<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::with('supervisor')->paginate(10);
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        $supervisors = Position::all();
        return view('positions.create', compact('supervisors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'business_unit' => 'required|string',
            'supervisor_id' => 'nullable|exists:positions,id',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')->with('success', 'Position created successfully.');
    }

    public function show(Position $position)
    {
        $position->load('supervisor');
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        $supervisors = Position::where('id', '!=', $position->id)->get();
        return view('positions.edit', compact('position', 'supervisors'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string',
            'business_unit' => 'required|string',
            'supervisor_id' => 'nullable|exists:positions,id',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
