<?php

namespace App\Repositories\User;


interface UserRepositoryInterface
{
    public function getAllUsers();

    public function create($input);
}
