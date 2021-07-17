<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    SiteController
};
use App\Http\Controllers\Auth\{
    RegisteredUserController,
    AuthenticatedSessionController
};


Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/cadastrar', [SiteController::class, 'cadastroUsuario'])->name('site.usuarios.cadastro');
Route::post('/cadastrar', [RegisteredUserController::class, 'store'])->name('site.usuarios.store');

Route::get('/entrar', [SiteController::class, 'login'])->name('login');

Route::post('/entrar', [AuthenticatedSessionController::class, 'store'])->name('entrar');
    
?>