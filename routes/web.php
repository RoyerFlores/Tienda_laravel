<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Portal;
use App\Http\Controllers\Register;
use App\Http\Controllers\Sessions;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;

//ruta para el portal de la página
Route::get('/', [Portal::class, 'create'])->name('portal');

//ruta para el registro
Route::get('/register', [Register::class, 'create'])->name('register');

//ruta para enviar al controlador de crear usuario
Route::post('/register', [Register::class, 'store'])->name('register.store');

//ruta para el ingreso
Route::get('/login', [Sessions::class, 'create'])->name('login');

//ruta para enviar datos del login al controlador
Route::post('/login', [Sessions::class, 'store'])->name('login.store');

//ruta para cerrar sesión
Route::get('/logout', [Sessions::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    //ruta para el dashboard
    Route::get('/dashboard', [Dashboard::class, 'create'])->name('dashboard');

    //rutas para los crud de categoría, producto, ...
    Route::resource('/categorias', CategoriaController::class);
    Route::resource('/productos', ProductoController::class);
    Route::resource('/clientes', ClienteController::class);
    Route::resource('/ventas', VentaController::class);
});
