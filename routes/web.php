<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('login');
});

Route::get('login', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('login');
})->name('login');


Route::get('/register', function () {
    return view('register');
});

Route::get('/terminos-condiciones', function () {
    return view('terminos');
});

Route::post('register', [LoginController::class, 'register']);
Route::post('check', [LoginController::class, 'check']);

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('logout', [LoginController::class, 'logout']);


    Route::resource('categorias', CategoriaController::class);
    Route::resource('ciudades', CiudadController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('comentarios', ComentarioController::class);
});
