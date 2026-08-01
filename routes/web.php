<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\tarefaController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('home');

    Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
    Route::post('/tarefa', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::delete('/tarefa/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
    Route::get('/download-csv-tarefa', [TarefaController::class, 'download'])->name('tarefas.csv');

    Route::get('/usuario/{id}', [CadastroController::class, 'show'])->name('usuario.show');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/admin', 'App\Http\Controllers\adminController@index');
Route::get('/cadastrarAdmin', 'App\Http\Controllers\adminController@create');
Route::post('/cadastrarAdmin', 'App\Http\Controllers\adminController@store');

Route::get('/cadastrar', 'App\Http\Controllers\cadastroController@create');
Route::post('/cadastrar', 'App\Http\Controllers\cadastroController@store');

Route::get('/download-csv-usuario', 'App\Http\Controllers\adminController@download')->name('usuarios.csv');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');