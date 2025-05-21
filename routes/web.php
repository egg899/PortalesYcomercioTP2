<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');
Route::get('/quienes-somos', [\App\Http\Controllers\AboutController::class, 'about'])
    ->name('about');
// Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
Route::get('/producto', [\App\Http\Controllers\ProductoController::class, 'index'])
    ->name('producto.index');

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])
    ->name('blogs.index');


// Ver un blog individual
Route::get('/blog/{id}', [\App\http\Controllers\BlogController::class, 'view'])
    ->name('blogs.view')
    ->whereNumber('id');


// Editar
Route::get('/blog/{id}/editar', [\App\http\Controllers\BlogController::class, 'edit'])
        ->name('blogs.edit')
        ->whereNumber('id');

// Actualizar
Route::put('/blog/{id}', [\App\http\Controllers\BlogController::class, 'update'])
        ->name('blogs.update')
        ->whereNumber('id');


//Eliminar
Route::delete('/blog/{id}', [\App\http\Controllers\BlogController::class, 'destroy'])
        ->name('blogs.destroy')
        ->whereNumber('id');


//Mostrar formulario para crear una entrada
Route::get('/blogs/crear',  [\App\http\Controllers\BlogController::class, 'create'])
    ->name('blogs.create');

//Guardar entrada en la base de datos
Route::post('/blogs', [\App\http\Controllers\BlogController::class, 'store'])
    ->name('blogs.store');


    // Mostrar formulario de login
Route::get('/iniciar-sesion', [\App\http\Controllers\AuthController::class, 'login'])->name('auth.login');

// Procesar login
Route::post('/iniciar-sesion', [\App\http\Controllers\AuthController::class, 'authenticate'])->name('auth.authenticate');

// Mostrar formulario de registro
Route::get('/registro', [\App\http\Controllers\AuthController::class, 'showRegister'])->name('auth.register');

// Procesar registro
Route::post('/registro', [\App\http\Controllers\AuthController::class, 'register'])->name('auth.register.submit');

// Cerrar sesión
Route::post('/cerrar-sesion', [\App\http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
