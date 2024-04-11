<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('tasks', 'TaskController');
Route::get('/', [TaskController::class, 'index']);
Route::get('/create', [TaskController::class, 'create']);
Route::post('/store', [TaskController::class, 'store']);
Route::get('/{id}/edit', [TaskController::class, 'edit']);
Route::put('/update', [TaskController::class, 'update']);
// Route::delete('/delete/{id}', [TaskController::class, 'destroy']);
Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');

