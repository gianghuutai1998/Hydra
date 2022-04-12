<?php
namespace App\Modules\User\Controllers;

use App\Modules\AppController;
use App\Modules\User\Requests\CreateUserRequest;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends AppController
{
    private $_userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->_userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->_userRepository->getAllUsers();
        return $this->resData(200, __('messages.success'), $user);
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->_userRepository->create($request->all());
        return $this->resData(200, __('messages.success'), $user);
    }
}
