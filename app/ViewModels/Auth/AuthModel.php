<?php

namespace App\ViewModels\Auth;

use App\Services\Auth\IAuthService;

class AuthModel{

    private $authService;

    public function __construct(IAuthService $authService){

        $this->authService = $authService;
    }

    public function register($data){

        $data['password'] = bcrypt($data['password']);

        return $this->authService->register($data);
    }

    public function getUser($data){
        return $this->authService->getUser($data);
    }
}
