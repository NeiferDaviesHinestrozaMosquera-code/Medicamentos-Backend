<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicamentosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: prefix('v1/medicamentos') -> group(function(){
    Route::get('/',[MedicamentosController :: class , 'get']);
    Route::post('/',[MedicamentosController :: class , 'create']);
    Route::get('/{id}',[MedicamentosController :: class , 'getById']);
    Route::put('/{id}',[MedicamentosController :: class , 'update']);
    Route::delete('/{id',[MedicamentosController :: class , 'delete']);
});
