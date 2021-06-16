<?php

namespace App\Services\Comment;



interface ICommentService{

    public function createComment($data, $id);
    public function findComment($id);
    public function getPendingComment();
    public function acceptComment($id);
    public function deleteComment($id);
}
