<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StatusController;

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

/**************************************************************************/



route::prefix('tarefa')->group(function(){
    route::post('/', [TarefaController::class, 'add']);
    route::get('/{dInicio}/{dFinal}', [TarefaController::class, 'list']);
    route::get('/{id}', [TarefaController::class, 'select']);
    route::put('/{id}', [TarefaController::class, 'update']);
    route::delete('/{id}', [TarefaController::class, 'delete']);
});

route::prefix('integrante')->group(function(){
    route::post('/', [IntegranteController::class, 'add']);
    route::get('/', [IntegranteController::class, 'list']);
    route::get('/{id}', [IntegranteController::class, 'select']);
    route::put('/{id}', [IntegranteController::class, 'update']);
    route::delete('/{id}', [IntegranteController::class, 'delete']);
});

route::prefix('data')->group(function(){
    route::post('/', [DataController::class, 'add']);
    route::get('/', [DataController::class, 'list']);
    route::get('/{id}', [DataController::class, 'select']);
    route::put('/{id}', [DataController::class, 'update']);
    route::delete('/{id}', [DataController::class, 'delete']);
});

route::prefix('status')->group(function(){
    route::post('/', [StatusController::class, 'add']);
    route::get('/', [StatusController::class, 'list']);
    route::get('/{id}', [StatusController::class, 'select']);
    route::put('/{id}', [StatusController::class, 'update']);
    route::delete('/{id}', [StatusController::class, 'delete']);
});

