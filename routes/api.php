<?php

use App\Http\Controllers\Api\ContatosController;
use App\Http\Controllers\Api\PedidosAjudaController;
use App\Http\Controllers\Api\UsuariosController;
use App\Http\Controllers\Api\QuestionarioDiarioController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
Route::controller(UsuariosController::class)->group(function() {
    //Autenticação
    Route::post('/login', 'logar');
    Route::post('/usuarios', 'cadastrar');
    Route::put('/senha', 'recuperarSenha');
   
});

//Necessário estar autenticado
Route::group(['middleware' => ['jwt']], function () {   
    
    //USUARIOS
    Route::controller(UsuariosController::class)->prefix('usuarios')->group(function() {
        Route::get('/', 'buscarDados');    
        Route::put('/', 'atualizarDados');
        Route::delete('/', 'excluir');
    }); 

    //CONTATOS
    Route::controller(ContatosController::class)->prefix('contatos')->group(function() {
        Route::post('/', 'cadastrar');
        Route::get('/', 'listar');
        Route::delete('/{id}', 'excluir');
    }); 

    //PEDIDO AJUDA
    Route::controller(PedidosAjudaController::class)->prefix('pedidos-ajudas')->group(function() {
        Route::post('/', 'cadastrar');
    }); 


    //QUESTIONARIOS DIARIOS
    Route::controller(QuestionarioDiarioController::class)->prefix('questionarios')->group(function() {
        Route::get('/', 'buscar');    
        Route::post('/', 'cadastrar');
        
    }); 
});