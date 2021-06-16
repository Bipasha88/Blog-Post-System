<?php

namespace App\ViewModels\Category\Blog;


use App\Services\Category\ICategoryService;

class CategoryListModel{

    private $categoryService;
    private $categories;

    public function getCategories(){
        return $this->categories;
    }

    public function __construct(ICategoryService $categoryService){

        $this->categoryService= $categoryService;

    }

    public function load(){

        $this->categories = $this->categoryService->getAllActiveCategories();
    }

}
