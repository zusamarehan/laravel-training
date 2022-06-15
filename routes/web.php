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

Route::get('/todo', function() {
   return view('index');
})->name('todo');

Route::post('/todo', function() {

    $data = request()->all();

    validator($data, [
       'task' => ['required'],
       'date' => ['required']
    ])->validate();

    \App\Models\Todo::insert([
       'task' => $data['task'],
       'date' => $data['date'],
       'is_completed' => 0
    ]);

    session()->flash('store', 'Stored Successfully');

    return view('index');

})->name('todo.store');
