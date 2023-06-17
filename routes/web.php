<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PedidosAjudaController;
use App\Http\Controllers\Admin\UsuariosController;

//============================ ADMIN ======================================//
Route::get('/', function() {
    return redirect('/login');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/logar', 'logar')->name('logar');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/recuperar-senha', 'recuperarSenha')->name('senha.recuperar');
    Route::post('/solicitar-nova-senha', 'solicitarNovaSenha')->name('senha.solicitar');
    Route::get('/nova-senha', 'novaSenha')->name('senha.nova');
    Route::post('/nova-senha', 'salvarNovaSenha')->name('senha.salvar');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::post('/tinymce/upload', [App\Http\Controllers\Admin\LoginController::class, 'upload'])->name('admin.tinymce.upload');

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // USUARIOS
    
    Route::controller(UsuariosController::class)->prefix('usuarios')->group(function() {
        Route::get('/', 'index')->name('admin.usuarios.listar');
        Route::get('/novo', 'novo')->name('admin.usuarios.novo');
        Route::post('/cadastrar', 'cadastrar')->name('admin.usuarios.cadastrar');
        Route::get('/edicao/{id}', 'edicao')->name('admin.usuarios.edicao');
        Route::post('/editar/{id}', 'editar')->name('admin.usuarios.editar');
        Route::get('/excluir/{id?}', 'excluir')->name('admin.usuarios.excluir');
        Route::get('/download/{id?}', 'download')->name('admin.usuarios.download');
    });

    Route::controller(PedidosAjudaController::class)->prefix('pedidos-ajuda')->group(function() {
        Route::get('/', 'listar')->name('admin.pedidos.listar');
        Route::get('/atendimento/{id}/{atendido}', 'atendimento')->name('admin.pedidos.atendimento');
        Route::get('/excluir/{id?}', 'excluir')->name('admin.pedidos.excluir');
    });
});