<?php

use App\Http\Controllers\ObjetoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesoresController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource("profesores", "ProfesoresController");

Route::get('professors/{niu}', [ProfesoresController::class, 'profesor']);
Route::get('professors/carrecs/{niu}', [ProfesoresController::class, 'cargos']);
Route::get('professors/departaments/{niu}', [ProfesoresController::class, 'departamentos']);
Route::post('objectes/afegir/', [ObjetoController::class, 'addObjeto']);