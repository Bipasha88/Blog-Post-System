<?php

namespace App\Services\Auth;

interface IAuthService{

    public function register($data);
    public function getUser($data);
}
