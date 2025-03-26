<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $positions = Position::with('supervisor')->get();

        $nodes = [];

        foreach ($positions as $position) {
            $nodes[] = [
                'id' => $position->id,
                'name' => $position->name,
                'business_unit' => $position->business_unit,
                'parent' => $position->supervisor_id,
            ];
        }

        return view('dashboard', compact('nodes'));
    }
}