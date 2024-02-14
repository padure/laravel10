<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    return view('index');
})->name('index');

//Mechanics
Route::get('/mechanics', [MechanicController::class, 'index'])->name('mechanics.index');
Route::get('/mechanics/create', [MechanicController::class, 'create'])->name('mechanics.create');
Route::post('/mechanics/create', [MechanicController::class, 'store'])->name('mechanics.store');
Route::get('/mechanics/{mechanic}/edit', [MechanicController::class, 'edit'])->name('mechanics.edit');
Route::put('/mechanics/{mechanic}/update', [MechanicController::class, 'update'])->name('mechanics.update');
Route::delete('/mechanics/{mechanic}', [MechanicController::class, 'destroy'])->name('mechanics.destroy');

//Cars
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

//Owner
Route::get('/owner', [OwnerController::class, 'index'])->name('owners.index');
