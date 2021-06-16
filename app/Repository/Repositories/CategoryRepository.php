<?php

namespace App\Repository\Repositories;

use App\Models\Category;
use App\Repository\Interfaces\ICategoryRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements ICategoryRepository {


    public function __construct(Category $model){
        parent::__construct($model);

    }



}
