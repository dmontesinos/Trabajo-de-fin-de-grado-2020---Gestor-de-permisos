<?php

use App\Http\Controllers\ObjetoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\UserController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    // Enlaces seguros (Requieren autenticación)

    // Profesores
    Route::get('professors/{niu}', [ProfesoresController::class, 'profesor']); //Retorna el nombre de un profesor
    Route::get('professors/carrecs/{niu}', [ProfesoresController::class, 'cargos']); //Retorna cargos de un profesor
    Route::get('professors/departaments/{niu}', [ProfesoresController::class, 'departamentos']); //Retorna departamentos de un profesor
    Route::get('professors/assignatures/{niu}', [ProfesoresController::class, 'asignaturas']); //Retorna las asignaturas y grupo por curso académico de un profesor

    // Objetos
    Route::post('objectes/afegir/', [ObjetoController::class, 'addObjeto']); //Añade un objeto nuevo a la DB
    Route::get('objectes/cercar/id/{id}', [ObjetoController::class, 'searchObjetoID']); //Busca por ID de objeto
    Route::get('objectes/cercar/nom/{nom}', [ObjetoController::class, 'searchObjetoNombre']); //Busca por nombre de objeto
    Route::get('objectes/cercar/descripcio/{descripcio}', [ObjetoController::class, 'searchObjetoDesc']); //Busca objetos que coincidan con la búsqueda
    Route::delete('objectes/eliminar/{id}', [ObjetoController::class, 'eliminarObjeto']); //Elimina el objeto por ID
    Route::get('objectes/permisos/{id}', [ObjetoController::class, 'permisosObjeto']); //Muestra los permisos de un objeto
});

// Login
Route::post("login",[UserController::class,'login']);
