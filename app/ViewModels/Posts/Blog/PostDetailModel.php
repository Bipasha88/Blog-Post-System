<?php

namespace App\ViewModels\Posts\Blog;

use App\Services\Post\IPostService;

class PostDetailModel{

    private $postService;
    private $posts;
    private $comments;
    private $tags;

    public function getPost(){
        return $this->posts;
    }

    public function getComments(){
        return $this->comments;
    }

    public function getTags(){
        return $this->tags;
    }

    public function __construct(IPostService $postService){

        $this->postService = $postService;

    }

    public function load($id){

        $this->posts = $this->postService->getPostsById($id);
        $this->tags = $this->postService->postRelatedTags($id);
        $this->comments = $this->postService->postRelatedComments($id);

    }

}
