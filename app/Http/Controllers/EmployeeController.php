<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['supervisor', 'position'])->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $supervisors = Employee::all();
        $positions = Position::all();
        return view('employees.create', compact('supervisors', 'positions'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'business_unit' => 'required|string|max:255',
            'supervisor_id' => 'nullable|exists:employees,id',
        ]);
    
        Employee::create($validated);
    
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load(['supervisor', 'position']);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $supervisors = Employee::where('id', '!=', $employee->id)->get();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'supervisors', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'business_unit' => 'required|string|max:255',
            'supervisor_id' => 'nullable|exists:employees,id',
        ]);
    
        $employee->update($validated);
    
        return redirect()
            ->route('employees.index', ['page' => $request->get('page', 1)])
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted.');
    }
}
