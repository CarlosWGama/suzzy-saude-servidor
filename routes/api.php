<?php

use App\Http\Controllers\Api\ContatosController;
use App\Http\Controllers\Api\UsuariosController;
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
    }); 

    //CONTATOS
    Route::controller(ContatosController::class)->prefix('contatos')->group(function() {
        Route::post('/', 'cadastrar');
        Route::get('/', 'listar');
        Route::delete('/{id}', 'excluir');
    }); 
});