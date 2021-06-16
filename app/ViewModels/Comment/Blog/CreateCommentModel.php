<?php

namespace App\ViewModels\Comment\Blog;

use App\Services\Comment\ICommentService;

class CreateCommentModel{

    private $commentService;


    public function __construct(ICommentService $commentService){
        $this->commentService = $commentService;
    }


    public function load($data,$id){

        $this->commentService->createComment($data, $id);
    }
}
