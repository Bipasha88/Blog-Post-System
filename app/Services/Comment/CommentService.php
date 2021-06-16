<?php

namespace App\Services\Comment;

use App\Repository\Interfaces\ICommentRepository;
use Illuminate\Database\Eloquent\Model;

class CommentService implements ICommentService{

    private $commentRepo;

    public function __construct(ICommentRepository $commentRepository){

        $this->commentRepo = $commentRepository;
    }

    public function createComment($data, $id){

            $this->commentRepo->create([

                'name' => $data['name'],
                'email' => $data['email'],
                'body' => $data['body'],
                'post_id' => $id,
        ]);


    }

    public function findComment($id): Model
    {
        return $this->commentRepo->find($id);
    }

    public function getPendingComment(){

        return $this->commentRepo->where('status','pending')->get();
    }

    public function acceptComment($id){

        $comment = $this->findComment($id);

        $comment->status = 'active';

        $comment->save();
    }

    public function deleteComment($id){

        $this->commentRepo->deleteById($id);
    }
}
