<?php

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

Route::group(['middleware' => 'web'], function(){
    //Rota Login
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/info', [App\Http\Controllers\HomeController::class, 'info']);
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    Auth::routes();

    //Rotas
    Route::get('/home', [App\Http\Controllers\PainelController::class, 'index'])->name('painel');
    Route::get('/tempo-real', [App\Http\Controllers\TempoRealController::class, 'index'])->name('tempo-real');
    Route::get('/transacoes', [App\Http\Controllers\TransacoesController::class, 'index'])->name('transacoes');
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes');
    Route::get('/dados-bancarios', [App\Http\Controllers\DadosBancariosController::class, 'index'])->name('dados-bancarios');
    Route::get('/depositos', [App\Http\Controllers\DepositosController::class, 'index'])->name('depositos');
    Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios');
});

Route::get('/registrar', [App\Http\Controllers\UsuariosController::class, 'register'])->name('registrar');
