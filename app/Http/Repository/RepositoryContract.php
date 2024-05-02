<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface RepositoryContract
{
    public function create(array $data);
    public function update(Model $model, array $data);
    public function delete(Model $model);
    public function find(int $id);
    public function all();
}
