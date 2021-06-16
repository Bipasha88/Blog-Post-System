<?php

namespace App\ViewModels\Category\Admin;


use App\Services\Category\ICategoryService;

class CreateCategoryPostModel{

    private $categoryService;

    public function __construct(ICategoryService $categoryService){

        $this->categoryService= $categoryService;

    }

    public function load($name,$status,$user_id){

        $this->categoryService->createCategory($name,$status,$user_id);
    }

}
