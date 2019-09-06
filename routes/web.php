<?php

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

//Listagem de produtos
Route::get('/produtos', ['uses' => 'ProdutoController@lista']);
//Cadastrando um produto
Route::get('/produtos/adiciona', 'ProdutoController@adiciona');
//Direcionando para a apagina de cadastro
Route::get('/produtos/novo', 'ProdutoController@novo');
//Visualizando produto
Route::get(
   '/produtos/mostra/{id}', 
   'ProdutoController@mostra'
    )
   ->where('id', '[0-9]+');


//Route::get('/produtos/mostra', 'ProdutoController@mostra');
//Route::get('/produtos/mostra/{id?}', 'ProdutoController@mostra');

