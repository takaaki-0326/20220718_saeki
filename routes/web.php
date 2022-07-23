<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index'])
    ->name('todos.index');

Route::post('/todo/create', [TodoController::class, 'create'])
    ->name('todos.create');

// ここから教材
// Route::post('/todo/update', [TodoController::class, 'update']);
// ここまで教材


Route::post('/todo/update', [TodoController::class, 'update']);


Route::delete('/todo/delete', [TodoController::class, 'delete'])
    ->name('todos.delete');
