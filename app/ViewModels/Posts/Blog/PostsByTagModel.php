<?php

namespace App\ViewModels\Posts\Blog;

use App\Services\Category\ICategoryService;
use App\Services\Post\IPostService;
use App\Services\Tag\ITagService;

class PostsByTagModel{

    private $tagService;
    private $posts;

    public function getPosts(){
        return $this->posts;
    }

    public function __construct(ITagService $tagService){

        $this->tagService = $tagService;

    }

    public function load($id){

        $this->posts = $this->tagService->postsByTag($id);

    }

}
