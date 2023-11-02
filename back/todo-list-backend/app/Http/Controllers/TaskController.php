<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;

class TaskController extends Controller
{

   // use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $tasks = Task::all();
        return response()->json(['tasks' => $tasks], 200);
    }

    public function show($id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        return response()->json(['task' => $task], 200);
    }
    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'priority' => 'integer',
            'due_date' => 'date',
            'status' => 'string',
        ]);
    
        $task->update($data);
    
        return response()->json(['message' => 'Task updated successfully', 'task' => $task], 200);
    }

    
    public function destroy($id)
    {
    $task = Task::find($id);

    if (!$task) {
        return response()->json(['message' => 'Task not found'], 404);
    }

    $task->delete();

    return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'priority' => 'integer',
            'due_date' => 'date',
            'status' => 'string',
        ]);
    
        $task = Task::create($data);
    
        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }
    

}
