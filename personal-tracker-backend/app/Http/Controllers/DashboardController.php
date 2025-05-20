<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats()
    {
        $user = auth()->user();

        $totalGoals = Goal::where('user_id', $user->id)->count();
        $totalTasks = Task::whereHas('goal', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->count();
        $completedTasks = Task::whereHas('goal', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->where('status', true)->count();
        $incompleteTasks = Task::whereHas('goal', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->where('status', false)->count();

        return response()->json([
            'totalGoals' => $totalGoals,
            'totalTasks' => $totalTasks,
            'completedTasks' => $completedTasks,
            'incompleteTasks' => $incompleteTasks,
        ]);
    }
}
