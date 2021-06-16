<?php

namespace App\ViewModels\User\Admin;


use App\Services\User\IUserService;

class DeleteUserModel
{

    private $userService;


    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;

    }

    public function load($id)
    {
        $this->userService->deleteUser($id);
    }
}
