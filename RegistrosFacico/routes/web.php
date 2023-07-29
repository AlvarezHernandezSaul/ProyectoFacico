<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CustomReportController;


// Ruta de inicio (redirige a la página de registro)
Route::get('/', function () {
    return redirect()->route('registro');
});

// Ruta para mostrar el formulario de registro
Route::get('/registro', [RegistroController::class, 'create'])->name('registro');

// Ruta para procesar los datos del formulario de registro (guardar en la base de datos)
Route::post('/registro', [RegistroController::class, 'store'])->name('guardar.datos');

// Ruta para acceder al formulario de registro desde otro lugar (si es necesario)
Route::get('/registro/registro', function () {
    return view('registro');
})->name('registroreg');

// Rutas de inicio de sesión y registro (se accede a través de botones en la vista)
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

// Ruta para la página de inicio después de iniciar sesión (requiere autenticación)
Route::get('/home', [RegistroController::class, 'index'])->middleware('auth')->name('home');

// Ruta para mostrar el formulario de registro (vista de registro)
Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

// Ruta para guardar los datos del formulario de registro
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Ruta para generar el reporte
Route::get('/generar-reporte', [CustomReportController::class, 'generate'])->name('report.generate');
