<?php

namespace App\Repositories;

use App\Models\Goal;

class GoalRepository implements GoalRepositoryInterface
{
   public function allWithTasks()
{
    return Goal::with('tasks')->where('user_id', auth()->id())->get();
}

    public function create(array $data)
    {
        return Goal::create($data);
    }
}
