<?php

namespace App\ViewModels\Posts\Admin;

use App\Services\Post\IPostService;

class CreatePosts_PostModel{

    private $postService;

    public function __construct(IPostService $postService){

        $this->postService = $postService;

    }

    public function load($data,$user_id){

        $image = $this->postService->imageProcessing($data['img'],$data['title']);
        $post = $this->postService->createPost($data,$user_id,$image);
        $this->postService->addCategoryToPost($data['category'],$post);
        $this->postService->addTagsToPost($data['tags'],$post);
    }

}
