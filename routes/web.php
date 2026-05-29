<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $total  = \App\Models\Task::count();
    $selesai = \App\Models\Task::where('status', 'Selesai')->count();
    $belum  = \App\Models\Task::where('status', 'Belum dikerjakan')->count();
    $sedang  = \App\Models\Task::where('status', 'Sedang dikerjakan')->count();
    return view('dashboard', compact('total', 'selesai', 'belum', 'sedang'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';