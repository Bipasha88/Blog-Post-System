<?php

namespace App\ViewModels\Posts\Blog;

use App\Services\Category\ICategoryService;
use App\Services\Post\IPostService;

class PostsByCategoryModel{

    private $categoryService;
    private $posts;

    public function getPosts(){
        return $this->posts;
    }

    public function __construct(ICategoryService $categoryService){

        $this->categoryService = $categoryService;

    }

    public function load($id){

        $this->posts = $this->categoryService->postsByCategory($id);

    }

}
