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

// CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');

Route::post('/logarUsuario', 'Usuario@logarUsuario')->middleware('cors');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/primeirasNoticias', 'NoticiasController@index')->middleware('cors');

Route::get('/primeirasNoticiasSecound', 'NoticiasController@pegarPrimeirasNoticias')->middleware('cors');
Route::get('/noticiaindividual/{id}', 'NoticiasController@pegarNoticiaIndividual')->middleware('cors');
Route::get('/noticiageral', 'NoticiasController@pegarNoticiaGeral')->middleware('cors');

// =============================== Lista Orcamento ===========================

Route::post('/orcamento/inserirOrcamento', 'ListaOrcamentoController@InserirOrcamento')->middleware('cors');


// ========================== Usuários ======================================
//					Logar e Serviços com Usuário
//===========================================================================

//Route::post('/logarUsuario', 'Usuario@logarUsuario');

