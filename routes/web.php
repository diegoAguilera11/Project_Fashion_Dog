
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstadoUsuario;
use App\Http\Controllers\EstilistaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UserController;
use App\Models\Solicitud;
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




Route::get('/NewPassword', [UserController::class, 'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password', [UserController::class, 'changePassword'])->name('changePassword');

Route::get('/', function () {
    return view('auth.login');
});
//METODOS QUE RETORNAR LAS VIEWS DE ESTILISTA
Route::get('/estilista', function () {
    return view('estilista.index');
});
Route::get('/estilista/create', function () {
    return view('estilista.create');
});


Route::get('/cliente/create', function () {
    return view('cliente.create');
});
Route::get('/cliente/edit', function () {
    return view('cliente.edit');
});
// Route::get('/cliente', function () {
//     return view('cliente.index');
// });
Route::get('/reset', function () {
    return view('passwords.reset');
});
Route::resource('user', 'App\Http\Controllers\UserController');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::resource('estilistas', 'App\Http\Controllers\EstilistaController');

Route::get('/administrador', [EstilistaController::class, "index"])->name("estilista");
Route::get('/administrador/create', [EstilistaController::class, "create"])->name("crear_estilista");
Route::post('/create', [EstilistaController::class, "store"])->name("crear_estilista_post");
Route::get('/administrador/edit/{id}', [EstilistaController::class, "edit"])->name("editar_estilista");
Route::post("/administrador/edit/{id}", [EstilistaController::class, "update"])->name("editar_estilista_post");
Route::get('/usuario', [EstadoUsuario::class, 'index'])->name('usuario');
Route::get('/usuario/{id}', [EstadoUsuario::class, 'updateStatus'])->name('cambiarEstado');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notFound',[UserController::class, 'index']);


Route::get('/cliente', [SolicitudController::class, 'index'])->name('solicitud');
Route::post('/cliente/edit', [SolicitudController::class, 'store'])->name('editar_solicitud_post');
Route::get('/cliente/create', [SolicitudController::class, 'create'])->name('crear_solicitud');
Route::post('/cliente/create', [SolicitudController::class, 'store'])->name('crear_solicitud_post');

Route::get('/cliente/{id}', [SolicitudController::class, 'cancelStatusSolicitud'])->name('anularSolicitud');

Route::get('/cliente-comentario/{id}', [SolicitudController::class, 'agregarComentario'])->name('agregar_comentario');

Route::get('/estilista-administrar-solicitudes',[SolicitudController::class,'indexEstilista'])->name('solicitudEstilista');

