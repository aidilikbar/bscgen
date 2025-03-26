<?php

namespace App\Http\Controllers;

use App\Models\Perspective;
use Illuminate\Http\Request;

class PerspectiveController extends Controller
{
 
    public function index()
    {
        $perspectives = Perspective::paginate(10); // Add pagination
        return view('perspectives.index', compact('perspectives'));
    }

    public function create()
    {
        return view('perspectives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Perspective::create($request->only('name'));

        return redirect()->route('perspectives.index')->with('success', 'Perspective created successfully.');
    }

    public function show(Perspective $perspective)
    {
        return view('perspectives.show', compact('perspective'));
    }

    public function edit(Perspective $perspective)
    {
        return view('perspectives.edit', compact('perspective'));
    }

    public function update(Request $request, Perspective $perspective)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $perspective->update($request->only('name'));

        return redirect()
        ->route('perspectives.index', ['page' => $request->get('page', 1)])
        ->with('success', 'Perspective updated successfully.');
    }

    public function destroy(Perspective $perspective)
    {
        $perspective->delete();

        return redirect()->route('perspectives.index')->with('success', 'Perspective deleted successfully.');
    }
}
