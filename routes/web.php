<?php

use App\Http\Controllers\ClasesProgramadasController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRolUsuario;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'rol'.':admin'])->name('admin.dashboard');

Route::get('/instructor/dashboard', function () {
    return view('instructor.dashboard');
})->middleware(['auth', 'rol'.':instructor'])->name('instructor.dashboard');

Route::resource('/instructor/programadas', ClasesProgramadasController::class)
->only(['index','create','store'])
->middleware(['auth', 'rol'.':instructor']);
Route::delete('/instructor/programadas/{claseProgramada}', [ClasesProgramadasController::class, 'destroy'])->name('programadas.destroy');


Route::middleware(['auth', 'rol'.':miembro'])->group(function(){
    Route::get('/miembro/dashboard', function () {
        return view('miembro.dashboard');
    })->name('miembro.dashboard');
    
    Route::get('/miembro/reservas', [ReservaController::class,'create'])->name('reserva.create');
    Route::post('/miembro/reservas', [ReservaController::class,'store'])->name('reserva.store');
    Route::get('/miembro/reservas', [ReservaController::class,'index'])->name('reserva.index');
    Route::delete('/miembro/reservass', [ReservaController::class,'delete'])->name('reserva.destroy');

});