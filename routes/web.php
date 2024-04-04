<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PermisoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hola',function(){
    return "Hola mundo";
});


Route::get('presentacion',[PresentacionController::class,'index'])->middleware('auth');

Route::get('presentacion', [PresentacionController::class, 'index'])->middleware('auth');
//oute::get('login', [FormController::class, 'index']);
//Route::post('login', [FormController::class, 'store'])->name('login.store');

Auth::routes();

//RUTAS PARA DIVISION

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/division', [DivisionController::class, 'index'])
    ->name('nueva.division')->middleware('auth');

Route::post('/division/guardar', [DivisionController::class, 'store'])
    ->name('division.guardar')->middleware('auth');

Route::get('/divisiones', [DivisionController::class, 'list'])
    ->name('divisiones.lista')->middleware('auth');

Route::delete('/division/delete/{id}', [DivisionController::class, 'delete'])
    ->name('division.borrar')->middleware('auth');


//RUTAS PARA PUESTO

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/puesto', [PuestoController::class, 'index'])
    ->name('nuevo.puesto')->middleware('auth');

Route::post('/puesto/guardar', [PuestoController::class, 'store'])
    ->name('puesto.guardar')->middleware('auth');

Route::get('/puestos', [PuestoController::class, 'list'])
    ->name('puestos.lista')->middleware('auth');

Route::delete('/puesto/delete/{id}', [PuestoController::class, 'delete'])
    ->name('puesto.borrar')->middleware('auth');

//RUTAS PARA PROFESOR

Route::get('/profesor', [ProfesorController::class, 'index'])
    ->name('nuevo.profesor')
    ->middleware('auth');

Route::post('/profesor/guardar', [ProfesorController::class, 'store'])
    ->name('profesor.guardar')
    ->middleware('auth');

Route::get('/profesores', [ProfesorController::class, 'list'])
    ->name('profesores.lista')
    ->middleware('auth');

Route::delete('/profesor/delete/{id}', [ProfesorController::class, 'delete'])
    ->name('profesor.borrar')
    ->middleware('auth');

//RUTA PARA ENTRAR A LOS LOGS
Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])
->middleware('auth', 'role:admin');

//aviso de privacidad

Route::get('/aviso_privacidad', [App\Http\Controllers\AvisoPrivacidadController::class, 'index'])->name('aviso_privacidad');


//RUTA PARA PERMISOS
Route::get('/permisos', [PermisoController::class, 'listl'])
->name('permisos.lista')
->middleware('auth', 'role:admin');

Route::get('/permiso', [PermisoController::class, 'indexl'])
    ->name('nuevo.permiso')
    ->middleware('auth', 'role:admin');

Route::post('/permiso/guardar', [PermisoController::class, 'storel'])
    ->name('permiso.guardar')
    ->middleware('auth', 'role:admin');

Route::get('/permiso/autorizar', [PermisoController::class, 'autorizar'])
    ->name('autorizar.permiso')
    ->middleware('auth', 'role:admin');

    Route::post('/permiso/autorizar', [PermisoController::class, 'autorizar'])
    ->name('autorizar.permiso')
    ->middleware('auth', 'role:admin');

Route::get('/permiso/rechazar', [PermisoController::class, 'rechazar'])
    ->name('rechazar.permiso')
    ->middleware('auth', 'role:admin');
    
Route::post('/permiso/rechazar', [PermisoController::class, 'rechazar'])
->name('rechazar.permiso')
->middleware('auth', 'role:admin');