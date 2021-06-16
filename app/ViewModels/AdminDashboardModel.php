<?php

namespace App\ViewModels;

use App\Services\Category\ICategoryService;
use App\Services\Post\IPostService;
use App\Services\Tag\ITagService;
use App\Services\User\IUserService;

class AdminDashboardModel{

    private $postService;
    private $tagService;
    private $categoryService;
    private $userService;
    private $post;
    private $tag;
    private $category;
    private $user;

    public function getPost(){
        return $this->post;
    }

    public function getTag(){
        return $this->tag;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getUser(){
        return $this->user;
    }

    public function __construct(IPostService $postService,
                                ITagService $tagService,
                                ICategoryService $categoryService,
                                IUserService $userService)
    {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }



    public function load(){
        $this->post = count($this->postService->getAllPostsWithoutPagination());
        $this->tag = count($this->tagService->getAllTags());
        $this->category = count($this->categoryService->getAllCategories());
        $this->user = count($this->userService->getPendingUser());
    }

}
