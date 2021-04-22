<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
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

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria_listagem');
Route::get('/categoria/novo', [CategoriaController::class, 'novo'])->name('categoria_novo');
Route::post('/categoria/salvar', [CategoriaController::class, 'salvar'])->name('categoria_salvar');
Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar'])->name('categoria_editar');
Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir'])->name('categoria_excluir');
