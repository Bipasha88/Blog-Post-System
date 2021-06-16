<?php

namespace App\Policies;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function userRequest(User $user)
    {
        return $user->email === 'dolasaha88@gmail.com';
    }



}
