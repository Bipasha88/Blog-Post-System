<?php

namespace App\ViewModels\Posts\Blog;

use App\Services\Category\ICategoryService;
use App\Services\Post\IPostService;

class PostListModel{

    private $postService;
    private $categoryService;
    private $posts;
    private $categories;

    public function getPosts(){
        return $this->posts;
    }

    public function getCategories(){
        return $this->categories;
    }

    public function __construct(IPostService $postService,
                                ICategoryService $categoryService){

        $this->postService = $postService;
        $this->categoryService = $categoryService;

    }

    public function load(){

        $this->posts = $this->postService->getAllActivePosts();
        $this->categories = $this->categoryService->getAllActiveCategories();
    }

}
