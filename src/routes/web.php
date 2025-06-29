<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;


Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::patch('/todos/update', [TodoController::class, 'update']);
Route::delete('/todos/delete', [TodoController::class, 'destroy']);

// Route::get('/', [TodoController::class, 'index'])->name('todo.index');
// Route::post('/todos', [TodoController::class, 'store'])->name('todo.store');



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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/layouts/app', function () {
//     return view('layouts.app');
// });

