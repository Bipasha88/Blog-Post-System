<?php

namespace App\ViewModels\Category\Admin;


use App\Services\Category\ICategoryService;

class DeleteCategoryModel{

    private $categoryService;

    public function __construct(ICategoryService $categoryService){

        $this->categoryService= $categoryService;

    }

    public function load($id){

        $this->categoryService->deleteById($id);
    }

}
