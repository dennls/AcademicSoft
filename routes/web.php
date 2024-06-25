<?php

use App\Http\Controllers\AsignacionesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

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
    //return redirect('/login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    // cursos
    Route::get('/cursos', [CursoController::class, 'index']);
    Route::get('/cursos/registrar', [App\Http\Controllers\CursoController::class, 'create']);
    Route::post('/cursos/registrar', [App\Http\Controllers\CursoController::class, 'store']);
    Route::get('/cursos/actualizar/{id}', [App\Http\Controllers\CursoController::class, 'edit']);
    Route::put('/cursos/actualizar/{id}', [App\Http\Controllers\CursoController::class, 'update']);
    Route::get('/cursos/estado/{id}', [App\Http\Controllers\CursoController::class, 'estado']);

    //asignaciones
    Route::get('/asignaciones', [AsignacionesController::class, 'index']);
    Route::get('/asignaciones/registrar', [App\Http\Controllers\AsignacionesController::class, 'create']);
    Route::post('/asignaciones/registrar', [App\Http\Controllers\AsignacionesController::class, 'store']);
    Route::get('/asignaciones/actualizar/{id}', [App\Http\Controllers\AsignacionesController::class, 'edit']);
    Route::put('/asignaciones/actualizar/{id}', [App\Http\Controllers\AsignacionesController::class, 'update']);
    Route::get('/asignaciones/estado/{id}', [App\Http\Controllers\AsignacionesController::class, 'estado']);
