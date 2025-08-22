<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

// Página principal (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (solo usuarios autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil (usuarios autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', [TareaController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');


// Rutas de tareas (CRUD) -> solo usuarios logueados
Route::resource('tareas', TareaController::class)->middleware('auth');

require __DIR__.'/auth.php';
