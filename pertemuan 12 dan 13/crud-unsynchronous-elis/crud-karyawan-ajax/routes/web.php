<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

// Arahkan halaman utama ke halaman karyawan
Route::get('/', function () {
    return redirect('/karyawan');
});

// Route CRUD untuk karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
