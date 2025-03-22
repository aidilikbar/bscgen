<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = \App\Models\Employee::all();

        $nodes = [];

        foreach ($employees as $emp) {
            $nodes[] = [
                'id' => 'node-' . $emp->id,
                'text' => [
                    'name' => $emp->name,
                    'title' => $emp->position_title,
                ],
                'parent' => $emp->supervisor_id ? 'node-' . $emp->supervisor_id : null,
            ];
        }

        return view('dashboard', ['nodes' => $nodes]);
    }
}