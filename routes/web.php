<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarketController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return Auth::check() ? view('home') : view('login');
})->name('home');





Route::get('/login', function () {
    return Auth::check() ? redirect('/home') : view('login');
})->name('login');


Route::get('/register', function () {
    return view('register');
});

Route::get('/terminos-condiciones', function () {
    return view('terminos');

});



Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');




Route::post('register', [LoginController::class, 'register']);
Route::post('check', [LoginController::class, 'check']);

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('logout', [LoginController::class, 'logout']);

    Route::post('/comentarios/{comentario}/cambiar-estado', [ComentarioController::class, 'cambiarEstado']);
    Route::post('/productos/{producto}/cambiar-estado', [ProductoController::class, 'cambiarEstado']);
    Route::post('/usuarios/{usuario}/cambiar-estado', [UsuarioController::class, 'cambiarEstado']);
    Route::post('/categorias/{categoria}/cambiar-estado', [CategoriaController::class, 'cambiarEstado']);
    Route::post('/ciudades/{ciudad}/cambiar-estado', [CiudadController::class, 'cambiarEstado']);

    Route::resources([
        'categorias' => CategoriaController::class,
        'ciudades' => CiudadController::class,
        'usuarios' => UsuarioController::class,
        'productos' => ProductoController::class,
        'comentarios' => ComentarioController::class,
    ]);
});


//-------------Rutas market----------------

route::get('/market', [MarketController::class, 'index'])->name('market.index');

Route::get('/producto/info/{id}', [ProductoController::class, 'info'])->name('producto.info');

