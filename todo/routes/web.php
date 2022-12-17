<?php

use App\Http\Controllers\TodoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [TodoController::class, 'welcome']);
Route::post('/add', [TodoController::class, 'store']);
Route::get('/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/todo/edit/{id}', [TodoController::class, 'update'])->name('todo.update');
