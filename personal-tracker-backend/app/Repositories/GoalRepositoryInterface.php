<?php

namespace App\Repositories;

interface GoalRepositoryInterface
{
    public function allWithTasks();
    public function create(array $data);
    public function delete($id);
    public function update($id, array $data);
}
