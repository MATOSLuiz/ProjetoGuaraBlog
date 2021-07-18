<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostagemController,
    AdminController,
    ComentariosController
};
use App\Http\Controllers\Auth\{
    RegisteredUserController
};

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

Route::group(['prefix'=>'admin', 'middleware'=> 'auth'], function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::get('/postagens', [PostagemController::class, 'index'])->name('postagens.index');
    Route::get('/postagens/nova', [PostagemController::class, 'create'])->name('postagens.create');
    Route::get('/postagens/{id}', [PostagemController::class, 'show'])->name('postagens.show');
    Route::get('/postagens/editar/{id}', [PostagemController::class, 'edit'])->name('postagens.edit');

    Route::post('/postagens', [PostagemController::class, 'store'])->name('postagens.store');
    Route::put('/postagens/{id}', [PostagemController::class, 'update'])->name('postagens.update');
    Route::delete('/postagens/{id}', [PostagemController::class, 'destroy'])->name('postagens.destroy');
    
    // ROTA DE USUARIO
    Route::get('/perfil', [RegisteredUserController::class, 'edit'])->name('user.edit');
    // ROTAS PARA OS COMENTARIOS
    Route::post('/comentarios', [ComentariosController::class, 'store'])->name('comentarios.store');
    Route::delete('/comentarios/{id}', [ComentariosController::class, 'destroy'])->name('comentarios.destroy');
});
    

//require __DIR__.'/auth.php';
require __DIR__ . '/site.php';
