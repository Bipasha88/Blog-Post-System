<?php

namespace App\Repository\Repositories;


use App\Models\Tag;
use App\Repository\Interfaces\ITagRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagRepository extends BaseRepository implements ITagRepository {


    public function __construct(Tag $model){
        parent::__construct($model);

    }


}
