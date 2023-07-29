<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CustomReportController;


Route::get('/', function () { return view('registro'); });

Route::get('/registro', [RegistroController::class, 'create'])->name('registro');

Route::post('/registro', [RegistroController::class, 'store'])->name('guardar.datos');

Route::get('/registro', function () { return view('registro'); })->name('registroreg');


Route::middleware(['auth'])->group(function () { Route::get('/home', function () { return view('admin.home'); }); });


Route::get('/register', [RegisterController::class, 'create'])
->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');


Route::post('/login', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');


Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');


// ---------
Route::get('/home',[RegistroController::class, 'index'])->name('registro');
// ---------

Route::get('/generar-reporte', [CustomReportController::class, 'generate'])->name('report.generate');
