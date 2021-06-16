<?php

namespace App\ViewModels\Posts\Admin;

use App\Services\Post\IPostService;

class EditPost_PostModel{

    private $postService;

    public function __construct(IPostService $postService){

        $this->postService = $postService;

    }

    public function load($id,$data,$user_id){

        $image = $this->postService->imageProcessing($data['img'],$data['title']);
        $post = $this->postService->editPost($id,$data,$user_id,$image);
        $this->postService->addCategoryToPost($data['category'],$post);
        $this->postService->addTagsToPost($data['tags'],$post);
    }

}
