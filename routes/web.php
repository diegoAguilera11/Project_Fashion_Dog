<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstilistaController;
use Illuminate\Database\Schema\Blueprint;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('mainScreen');
});
//METODOS QUE RETORNAR LAS VIEWS DE ESTILISTA
Route::get('/estilista', function () {
    return view('estilista.index');
});
Route::get('/estilista/create', function () {
    return view('estilista.create');
});
Route::get('/estilista/edit', function () {
    return view('estilista.edit');
});
//METODOS QUE RETORNAN LAS VIEWS DE CLIENTE
Route::get('/cliente/create', function () {
    return view('cliente.create');
});
Route::get('/cliente/edit', function () {
    return view('cliente.edit');
});
Route::get('/cliente', function () {
    return view('cliente.index');
});
//METODOS QUE RETORNAN LAS VIEWS DE ADMINISTRADOR
/* Route::get('/administrador/create', function () {
    return view('administrador.create');
});
Route::get('/administrador/edit', function () {
    return view('administrador.edit');
});
Route::get('/administrador', function () {
    return view('administrador.index');
});
 */
Route::resource('user', 'App\Http\Controllers\UserController');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::resource('estilistas', 'App\Http\Controllers\EstilistaController');

Route::get('/administrador', [EstilistaController::class,"index"])->name("estilista");
Route::get('/administrador/create', [EstilistaController::class,"create"])->name("crear_estilista");
Route::post('/create', [EstilistaController::class,"store"])->name("crear_estilista_post");
Route::get('/administrador/edit/{id}', [EstilistaController::class,"edit"])->name("editar_estilista");
Route::post("/administrador/edit/{id}",[EstilistaController::class,"update"])->name("editar_estilista_post");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
