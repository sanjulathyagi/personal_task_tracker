<?php

namespace App\Repositories;

interface GoalRepositoryInterface
{
    public function allWithTasks();
    public function create(array $data);
}
