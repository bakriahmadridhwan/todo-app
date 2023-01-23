<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'index'])->name('index')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('main');
    Route::post('/todos', [TodoController::class, 'store'])->name('store');
    Route::put('{idTodos}/todos', [TodoController::class, 'update'])->name('update');
    Route::delete('{idTodos}/todos', [TodoController::class, 'destroy'])->name('destroy');

    Route::put('{idTodos}/check', [TodoController::class, 'check'])->name('check');
    Route::put('{idTodos}/restore', [TodoController::class, 'restore'])->name('restore');

    //Route search
    Route::get('/search', [TodoController::class, 'index'])->name('index');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
