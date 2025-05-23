<?php

namespace App\Repositories;


interface TaskRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
