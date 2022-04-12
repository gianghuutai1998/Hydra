<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }
}