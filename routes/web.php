<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;

Route::get('/', function () {
    return redirect('/kendaraan');
});

Route::resource('kendaraan', KendaraanController::class);
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');
Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
Route::put('/kendaraan/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');