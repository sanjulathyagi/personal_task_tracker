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
    public function delete($id)
{
    $goal = Goal::findOrFail($id); 
    return $goal->delete();
}
 // Update an existing goal
    public function update($id, array $data)
    {
        $goal = $this->find($id);
        $goal->update($data);
        return $goal;
    }

}
