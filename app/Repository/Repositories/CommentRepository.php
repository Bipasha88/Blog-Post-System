<?php

namespace App\Repository\Repositories;



use App\Models\Comment;
use App\Repository\Interfaces\ICommentRepository;
use App\Repository\Interfaces\ITagRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CommentRepository extends BaseRepository implements ICommentRepository {


    public function __construct(Comment $model){
        parent::__construct($model);

    }


}
