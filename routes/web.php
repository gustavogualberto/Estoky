<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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


Route::get('/', [ProdutoController::class, 'produtosHome'])->name('site.produtos');

Route::post('/salvar', [ProdutoController::class, 'salvar'])->name('salvar.produto');

Route::get('/estoque', [ProdutoController::class, 'estoque'])->name('site.estoque');

Route::get('/produto/{id}', [ProdutoController::class, 'visualizar'])->name('site.visualizar');

Route::get('/total/produtos/ativos', [ProdutoController::class, 'ativosList'])->name('site.ativos');

Route::get('/total/produtos/inativos', [ProdutoController::class, 'inativosList'])->name('site.inativos');

Route::get('/total/produtos/sem-estoque', [ProdutoController::class, 'semEstoque'])->name('site.sem-estoque');

Route::put('/editar/produto/{id}', [ProdutoController::class, 'update'])->name('site.update');

Route::put('/inativar/produto/{id}', [ProdutoController::class, 'inativar'])->name('site.inativar');

Route::post('/vender/produto/{id}', [ProdutoController::class, 'vender'])->name('site.vender');

Route::post('/cadastrar/cliente', [ProdutoController::class, 'cadastrarCliente'])->name('site.cliente');





