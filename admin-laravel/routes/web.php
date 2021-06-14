<?php

use App\Http\Controllers\AulaController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
//
Route::middleware(['auth','XssSanitizer'])->group(function(){
    Route::get('aulas', [AulaController::class, 'index']);
    Route::get("aulas/nova", [AulaController::class, 'create']);
    Route::post("aulas", [AulaController::class, 'store']);
    Route::get('aulas/{id}/editar', [AulaController::class, 'edit']);
    Route::put('aulas/{id}', [AulaController::class, 'update']);
    Route::delete('aulas/{id}', [AulaController::class, 'destroy']);

    Route::get('cor',[CorController::class,'index']);
    Route::get('cor/nova',[CorController::class,'create']);
    Route::post('cor',[CorController::class,'store']);
    Route::get('cor/{id}/editar', [CorController::class, 'edit']);
    Route::put('cor/{id}', [CorController::class, 'update']);
    Route::delete('cor/{id}', [CorController::class, 'destroy']);

    Route::get('marca',[MarcaController::class,'index']);
    Route::get('marca/nova',[MarcaController::class,'create']);
    Route::post('marca',[MarcaController::class,'store']);
    Route::get('marca/{id}/editar', [MarcaController::class, 'edit']);
    Route::put('marca/{id}', [MarcaController::class, 'update']);
    Route::delete('marca/{id}', [MarcaController::class, 'destroy']);

    Route::get('veiculo',[VeiculoController::class,'index']);
    Route::get('veiculo/nova',[VeiculoController::class,'create']);
    Route::post('veiculo',[VeiculoController::class,'store']);
    Route::get('veiculo/{id}/editar', [VeiculoController::class, 'edit']);
    Route::put('veiculo/{id}', [VeiculoController::class, 'update']);
    Route::delete('veiculo/{id}', [VeiculoController::class, 'destroy']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
