<?php
namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IPostRepository extends IEloquentRepository {
    public function getPaginated(int $count = 2);

}
