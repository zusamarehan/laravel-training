<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// To show all Todos
Route::get('/todos', [\App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
// To show Todos Form
Route::get('/todo/form', [\App\Http\Controllers\TodoController::class, 'form'])->name('todo');
// To store new Todos
Route::post('/todos', [\App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
// To Mark as Post for Todos
Route::post('/todos/{id}/is-complete', [\App\Http\Controllers\TodoController::class, 'updateStatus'])->name('todos.update.is.complete');
// To Delte an Todos
Route::post('/todos/{id}/destroy', [\App\Http\Controllers\TodoController::class, 'destroy'])->name('todos.delete');
