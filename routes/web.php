<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

use App\Models\Todo;

Route::get('/', function () {
    $todos = Todo::all(); // fetch all todos from DB
    return view('welcome', compact('todos'));
});

Route::get('/', [TodoController::class, 'index']);
Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);