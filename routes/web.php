<?php

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'Main@index')->name('home');
Route::get('/tarefasInvisiveis', 'Main@tarefasInvisiveis')->name('tarefasInvisiveis');

Route::get('/new_task', 'Main@new_task')->name('new_task');
Route::get('/task_realizada/{id}', [Main::class, 'task_realizada'])->name('task_realizada');
Route::get('/nao_realizada/{id}', [Main::class, 'nao_realizada'])->name('nao_realizada');
Route::get('/editarTarefa/{id}', [Main::class, 'editarTarefa'])->name('editarTarefa');
Route::get('/esconderTarefa/{id}', [Main::class, 'esconderTarefa'])->name('esconderTarefa');
Route::get('/visualizarTarefa/{id}', [Main::class, 'visualizarTarefa'])->name('visualizarTarefa');

// #################################################################################################
Route::post('/new_task_submit', 'Main@new_task_submit')->name('new_task_submit');
Route::post('/edit_save_tarefa', 'Main@edit_save_tarefa')->name('edit_save_tarefa');
