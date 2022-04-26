<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/estilista', function () {
    return view('estilista.index');
});

Route::get('/cliente', function () {
    return view('cliente.index');
});

Route::get('/administrador', function () {
    return view('administrador.index');
});

Route::resource('user', 'App\Http\Controllers\UserController');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::resource('estilistas','App\Http\Controllers\EstilistaController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
