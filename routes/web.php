<?php

use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\StudentController;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('siswa', StudentController::class)->names('student');
    Route::resource('ekskul', ExtracurricularController::class)->names('extracurricular');
});
