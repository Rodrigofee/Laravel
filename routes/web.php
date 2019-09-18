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
Route::get('/home', 'HomeController@index');
Route::post('/produtos/update', 'ProdutoController@update');
Route::get(
   '/produtos/altera/{id}', 
   'ProdutoController@altera'
    )
   ->where('id', '[0-9]+');
//Route::resource('auth', 'Auth\LoginController');
//Route::resource('password', 'Auth\ForgotPasswordController');
Route::resource('auth','Auth\AuthController');
Route::resource('password','Auth\PasswordController');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get(
   '/produtos/remove/{id}', 
   'ProdutoController@remove'
    )
   ->where('id', '[0-9]+');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos', ['uses' => 'ProdutoController@lista']);
//Listagem de produtos
//Cadastrando um produto
//Route::get('/produtos/adiciona', 'ProdutoController@adiciona');
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
