<?php

namespace App\ViewModels\Comment\Admin;

use App\Services\Comment\ICommentService;

class AcceptCommentModel{

    private $commentService;


    public function __construct(ICommentService $commentService){
        $this->commentService = $commentService;
    }


    public function load($id){
         $this->commentService->acceptComment($id);
    }
}
