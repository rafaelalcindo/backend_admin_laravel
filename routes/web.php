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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/primeirasNoticias', 'NoticiasController@index');

Route::get('/primeirasNoticiasSecound', 'NoticiasController@pegarPrimeirasNoticias');

Route::get('/noticiaindividual/{id}', 'NoticiasController@pegarNoticiaIndividual');

Route::get('/noticiageral', 'NoticiasController@pegarNoticiaGeral');
