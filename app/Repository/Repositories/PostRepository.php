<?php

namespace App\Repository\Repositories;


use App\Models\Post;
use App\Repository\Interfaces\IPostRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository implements IPostRepository {


    public function __construct(Post $model){
        parent::__construct($model);

    }



}
