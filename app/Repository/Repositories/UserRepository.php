<?php

namespace App\Repository\Repositories;

use App\Models\User;
use App\Repository\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements IUserRepository {


    public function __construct(User $model){
        parent::__construct($model);

    }


}
