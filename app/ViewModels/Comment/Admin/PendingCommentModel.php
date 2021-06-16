<?php

namespace App\ViewModels\Comment\Admin;

use App\Services\Comment\ICommentService;

class PendingCommentModel{

    private $commentService;
    private $comment;

    public function getComment(){
        return $this->comment;
    }

    public function __construct(ICommentService $commentService){
        $this->commentService = $commentService;
    }


    public function load(){
        $this->comment = $this->commentService->getPendingComment();
    }
}
