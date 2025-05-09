<?php

use App\Http\Controllers\Admin\TodoController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});
Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/todos/trashed', [TodoController::class, 'trashed'])->name('todos.trashed');
    Route::post('/todos/{id}/restore', [TodoController::class, 'restore'])->name('todos.restore');
Route::post('/todos/{id}/restore', [TodoController::class, 'restore'])->name('todos.restore'); Route::resource('todos', TodoController::class);});







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
