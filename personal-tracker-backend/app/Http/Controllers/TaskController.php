<?php

namespace App\Http\Controllers;
use App\Repositories\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\Goal;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Store a new task for a specific goal
    public function store(Request $request, $goalId)
    {
        $goal = Goal::findOrFail($goalId);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        $task = $goal->tasks()->create($validated);

        return response()->json($task, 201);
    }

    // Retrieve all tasks for a specific goal
    public function index($goalId)
    {
        $goal = Goal::with('tasks')->findOrFail($goalId);

        return response()->json($goal->tasks);
    }

    public function update(Request $request, Task $task)
{
    $validated = $request->validate([
        'status' => 'required|boolean',
    ]);

    $task->status = $validated['status'];
    $task->save();

    return response()->json($task);
}

public function destroy(Task $task)
{
    $task->delete();
    return response()->json(['message' => 'Task deleted successfully.']);
}

}


