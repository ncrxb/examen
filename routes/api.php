<?php


use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CodigoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//MILDDLEWARE 
Route::middleware('auth:sanctum')->group(function(){
//Get obtener - Post Crear - Put Editar - Delete Eliminar 

Route::get('/alumnos', [AlumnoController::class, 'obtener']);
Route::post('/alumnos', [AlumnoController::class, 'crear']);
Route::put('/alumnos/{id}', [AlumnoController::class, 'actualizar']);
Route::delete('/alumnos/{id}', [AlumnoController::class, 'eliminar']);


//EXAMEN
Route::get('/estudiantes', [EstudianteController::class, 'obtener']);

//PRODUCTO
Route::get('/productos', [ProductoController::class, 'obtener']);
Route::post('/productos', [ProductoController::class, 'crear']);
Route::put('/productos/{id}', [ProductoController::class, 'actualizar']);
Route::delete('/productos/{id}', [ProductoController::class, 'eliminar']);


//USUARIOS
Route::get('/usuarios', [UsuarioController::class, 'obtener']);
Route::post('/usuarios', [UsuarioController::class, 'crear']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'actualizar']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'eliminar']);

});







//Login
Route::post('/login', [LoginController::class, 'login']);


//EXAMEN
Route::post('/codigo', [CodigoController::class, 'codigo']);

Route::put('/cambio', [CodigoController::class, 'cambio']);





