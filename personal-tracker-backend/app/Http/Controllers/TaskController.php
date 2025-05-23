<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\Goal;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepo;

    // Constructor to inject repository
    public function __construct(TaskRepositoryInterface $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    //  Store a new task for a specific goal
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

    //  Retrieve all tasks for a specific goal
    public function index($goalId)
    {
        $goal = Goal::with('tasks')->findOrFail($goalId);
        return response()->json($goal->tasks);
    }

    // Update a task
   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'nullable|string|max:255',
        'status' => 'nullable|boolean',
    ]);

    $task = Task::find($id);
    if (!$task) {
        return response()->json(['error' => 'Task not found'], 404);
    }

    $task->update($validated);

    return response()->json($task);
}

    //  Delete a task
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully.']);
    }
}
