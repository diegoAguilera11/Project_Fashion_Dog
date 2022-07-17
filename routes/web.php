
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

// RUTAS ADMINISTRADOR
Route::middleware(['rutasAdministrador'])->group(function(){
    Route::get('/administrador', [EstilistaController::class, "index"])->name("estilista");
    Route::get('/administrador/create', [EstilistaController::class, "create"])->name("crear_estilista");
    Route::post('/administrador/create', [EstilistaController::class, "store"])->name("crear_estilista_post");
    Route::get('/administrador/edit/{id}', [EstilistaController::class, "edit"])->name("editar_estilista");
    Route::post("/administrador/edit/{id}", [EstilistaController::class, "update"])->name("editar_estilista_post");
    Route::get('/usuario', [EstadoUsuario::class, 'index'])->name('usuario');
    Route::get('/usuario/{id}', [EstadoUsuario::class, 'updateStatus'])->name('cambiarEstado');
    Route::get('/administrarSolicitud', [EstadoUsuario::class, 'create'])->name('administrar_Solicitudes');
//Route::get('/x/{id}', [SolicitudController::class, 'desplegarContenido'])->name('desplegar_Contenido');
});

// RUTAS ESTILISTA
Route::middleware(['rutasEstilista'])->group(function(){

    Route::get('/estilista-buscar', [SolicitudController::class, 'BuscarPorFecha'])->name('BuscarPorFecha');
    Route::get('/estilista', [SolicitudController::class, 'VerSolicitudes'])->name('VerSolicitudes');
    Route::get('/estilista/create/{id}',[SolicitudController::class, 'AceptarServicio'])->name('AceptarServicio');
    Route::get('/estilista-administrar-solicitudes',[SolicitudController::class,'indexEstilista'])->name('solicitudEstilista');
    Route::resource('estilistas', 'App\Http\Controllers\EstilistaController');
});


// RUTAS CLIENTE

Route::middleware(['rutasCliente'])->group(function(){

    Route::get('/cliente', [SolicitudController::class, 'index'])->name('solicitud');

    Route::get('/cliente/create', [SolicitudController::class, 'create'])->name('crear_solicitud');
    Route::post('/cliente/create', [SolicitudController::class, 'store'])->name('crear_solicitud_post');
    Route::get('/cliente-anular/{id}', [SolicitudController::class, 'cancelStatusSolicitud'])->name('anularSolicitud');
    Route::get('/cliente-comentario/{id}', [SolicitudController::class, 'agregarComentario'])->name('agregar_comentario');

});



Route::get('/NewPassword', [UserController::class, 'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password', [UserController::class, 'changePassword'])->name('changePassword');

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/reset', function () {
    return view('passwords.reset');
});
Route::resource('user', 'App\Http\Controllers\UserController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notFound',[UserController::class, 'index']);










Route::get('/estilista-buscar', [SolicitudController::class, 'BuscarPorFecha'])->name('BuscarPorFecha');
Route::get('/estilista', [SolicitudController::class, 'VerSolicitudes'])->name('VerSolicitudes');
Route::get('/estilista/create/{id}',[SolicitudController::class, 'AceptarServicio'])->name('AceptarServicio');

