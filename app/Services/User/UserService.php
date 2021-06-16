<?php

namespace App\Services\User;



use App\Repository\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Model;

class UserService implements IUserService {

    private $userRepo;

    public function __construct(IUserRepository $userRepository){
        $this->userRepo = $userRepository;
    }

    public function getPendingUser(){

        return $this->userRepo->where('status','pending')->get();
    }

    public function findUser($id): Model
    {
        return $this->userRepo->find($id);
    }

    public function acceptUser($id){

        $user = $this->findUser($id);

        $user->status = 'active';

        $user->save();
    }

    public function deleteUser($id){
        $user = $this->findUser($id);

        $user->status = 'reject';

        $user->save();
    }
}
