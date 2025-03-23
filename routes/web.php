<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerspectiveController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScorecardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return Redirect::route('dashboard');
    }

    return Redirect::route('login');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('perspectives', PerspectiveController::class);
    Route::resource('objectives', ObjectiveController::class);
    Route::resource('kpis', KPIController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('scorecards', ScorecardController::class);
});

require __DIR__.'/auth.php';
