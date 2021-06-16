<?php

namespace App\ViewModels\User;


use App\Services\User\IUserService;

class AllUserModel{

    private $user;
    private $userService;

    public function getUser(){
        return $this->user;
    }

    public function __construct(IUserService $userService){
        $this->userService = $userService;

    }

    public function userRequest(){
        $this->user = $this->userService->getPendingUser();
    }

    public function findUser($id){
        $this->user = $this->userService->findUser($id);
    }
}
