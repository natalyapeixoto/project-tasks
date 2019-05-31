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

Route::get('/', 'TarefaController@inicio')->middleware('auth');

Auth::routes();

Route::post('/nova-tarefa', 'TarefaController@novaTarefa')->middleware('auth');

Route::get('/concluir-tarefa/{id}', 'TarefaController@concluirTarefa')->middleware('auth');