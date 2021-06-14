<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'index'])->name('inicio');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria_listagem');
Route::get('/categoria/novo', [CategoriaController::class, 'novo'])->name('categoria_novo');
Route::post('/categoria/salvar', [CategoriaController::class, 'salvar'])->name('categoria_salvar');
Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar'])->name('categoria_editar');
Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir'])->name('categoria_excluir');


Route::get('/noticia', [NoticiaController::class, 'index'])->name('noticia_listagem');
Route::get('/noticia/novo', [NoticiaController::class, 'novo'])->name('noticia_novo');
Route::post('/noticia/salvar', [NoticiaController::class, 'salvar'])->name('noticia_salvar');
Route::get('/noticia/editar/{id}', [NoticiaController::class, 'editar'])->name('noticia_editar');
Route::get('/noticia/excluir/{id}', [NoticiaController::class, 'excluir'])->name('noticia_excluir');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/teste', function() {
  $caminho = storage_path();
  var_dump($caminho);
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'noticia'])->name('news_id');
Route::get('/news/categoria/{id}', [NewsController::class, 'categoria'])->name('news_categoria_id');

Route::get('/usuario', [UserController::class, 'index'])->name('usuario_listagem');
Route::get('/usuario/mail/{id}', [UserController::class, 'mail'])->name('usuario_mail');
Route::post('/usuario/sendmail', [UserController::class, 'sendmail'])->name('usuario_sendmail');
