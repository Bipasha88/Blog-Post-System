<?php

namespace App\ViewModels\User\Admin;


use App\Services\User\IUserService;

class UserRequestModel
{

    private $user;
    private $userService;

    public function getUser()
    {
        return $this->user;
    }

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;

    }

    public function load()
    {
        $this->user = $this->userService->getPendingUser();
    }
}
