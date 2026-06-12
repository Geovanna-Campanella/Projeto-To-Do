<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\tarefaController;
use App\Http\Controllers\adminController;

Route::get('/', function () {
    return view('Dashboard');
});

Route::get('/admin','App\Http\Controllers\adminController@index');

Route::get('/cadastrarAdmin','App\Http\Controllers\adminController@create');
Route::post('/cadastrarAdmin','App\Http\Controllers\adminController@store');

Route::get('/cadastrar','App\Http\Controllers\cadastroController@create');
Route::post('/cadastrar','App\Http\Controllers\cadastroController@store');

// Rotas da tarefa 
Route::get('/tarefa','App\Http\Controllers\tarefaController@create');
Route::post('/tarefa','App\Http\Controllers\tarefaController@store');

// Usuário 
Route::get('/usuario/{id}', [CadastroController::class, 'show']);

//Routes CSV
Route::get('/download-csv-tarefa','App\Http\Controllers\tarefaController@download')->name('download.csv');
Route::get('/download-csv-usuario','App\Http\Controllers\adminController@download')->name('download.csv');