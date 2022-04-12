<?php
namespace App\Modules\User\Controllers;

use App\Modules\AppController;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends AppController
{
    private $_userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->_userRepository = $userRepository;
    }

    public function index(){
        $user = $this->_userRepository->findById(1);
        return $this->resData(200, __('messages.success'), $user);
    }
}