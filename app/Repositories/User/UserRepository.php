<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUsers()
    {
        return $this->model::all();
    }

    public function create($input)
    {
        $input['password'] = bcrypt($input['password']);
        return $this->model::create($input);
    }
}
