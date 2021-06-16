<?php

namespace App\ViewModels\Posts\Admin;

use App\Services\Post\IPostService;

class PostListModel{

    private $postService;
    private $posts;

    public function getPosts(){
        return $this->posts;
    }

    public function __construct(IPostService $postService){

        $this->postService = $postService;

    }

    public function load(){

       $this->posts = $this->postService->getAllPosts();
    }

}
