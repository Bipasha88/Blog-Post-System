<?php

namespace App\Services\Auth;

use App\Repository\Interfaces\IUserRepository;
use Exception;

class AuthService implements IAuthService {

    private $userRepo ;

    public function __construct(IUserRepository $userRepository){

        $this->userRepo = $userRepository;
    }

    public function register($data){

        $existingEmail = $this->userRepo
            ->where("email", $data['email'])
            ->first();

        if ($existingEmail != null )
            throw new Exception("This email is already used");
        else{
            $this->userRepo->create($data);
        }

    }

    public function getUser($data){

       return $this->userRepo->where('email',$data['email'])->first();
    }
}
