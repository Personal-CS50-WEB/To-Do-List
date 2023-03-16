<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
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
    return view('welcome');
});
Route::get('/', [TodoListController::class, 'index'])->name('index');
Route::post('/saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');
Route::post('/markAsComplete/{id}', [TodoListController::class, 'markItem'])->name('markAsComplete');
Route::post('/deleteItem/{id}', [TodoListController::class, 'deleteItem'])->name('deleteItem');
Route::get('/completed', [TodoListController::class, 'completed'])->name('completed');


