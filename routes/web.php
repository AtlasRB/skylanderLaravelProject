<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollectableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/collectables', [CollectableController::class, 'index'])->name('collectables.index');
    Route::post('/collectables/{collectable}/toggle', [CollectableController::class, 'toggleCollectable'])->name('collectables.toggle');
});

require __DIR__.'/auth.php';
