<?php

namespace App\Services\User;

interface IUserService{

    public function getPendingUser();
    public function findUser($id);
    public function acceptUser($id);
    public function deleteUser($id);
}
