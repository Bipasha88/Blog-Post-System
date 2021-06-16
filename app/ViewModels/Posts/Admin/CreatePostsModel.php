<?php

namespace App\ViewModels\Posts\Admin;

use App\Services\Category\ICategoryService;
use App\Services\Post\IPostService;
use App\Services\Tag\ITagService;

class CreatePostsModel{

    private $categoryService;
    private $tagService;
    private $category;
    private $tag;


    public function getCategory(){
        return $this->category;
    }

    public function getTag(){
        return $this->tag;
    }


    public function __construct(ICategoryService $categoryService,
                                ITagService $tagService){

        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    public function load(){

        $this->category = $this->categoryService->getAllCategories();
        $this->tag = $this->tagService->getAllTags();
    }

}
