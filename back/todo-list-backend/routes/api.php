<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']); // List all tasks
Route::post('/tasks/add', [TaskController::class, 'store']); // Create a new task
Route::get('/tasks/{id}', [TaskController::class, 'show']); // View a specific task
Route::put('/tasks/update/{id}', [TaskController::class, 'update']); // Update a specific task
Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy']); // Delete a specific task

