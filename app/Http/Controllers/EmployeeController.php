<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('supervisor')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $supervisors = Employee::all();
        return view('employees.create', compact('supervisors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position_title' => 'required|string|max:255',
            'business_unit' => 'required|string|max:255',
            'supervisor_id' => 'nullable|exists:employees,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $supervisors = Employee::where('id', '!=', $employee->id)->get(); // avoid self-loop
        return view('employees.edit', compact('employee', 'supervisors'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position_title' => 'required|string|max:255',
            'business_unit' => 'required|string|max:255',
            'supervisor_id' => 'nullable|exists:employees,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
