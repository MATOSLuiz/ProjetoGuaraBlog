<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostagemController;

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

Route::get('/postagens', [PostagemController::class, 'index'])->name('postagens.index');
Route::get('/postagens/nova', [PostagemController::class, 'create'])->name('postagens.create');
Route::get('/postagens/{id}', [PostagemController::class, 'show'])->name('postagens.show');
Route::get('/postagens/editar/{id}', [PostagemController::class, 'edit'])->name('postagens.edit');

Route::post('/postagens', [PostagemController::class, 'store'])->name('postagens.store');
Route::put('/postagens/{id}', [PostagemController::class, 'update'])->name('postagens.update');
