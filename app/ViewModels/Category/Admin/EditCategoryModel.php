<?php

namespace App\ViewModels\Category\Admin;


use App\Services\Category\ICategoryService;

class EditCategoryModel{

    private $categoryService;

    public function __construct(ICategoryService $categoryService){

        $this->categoryService= $categoryService;

    }

    public function load($id,$data){

        $this->categoryService->editCategory($id,$data);
    }

}
