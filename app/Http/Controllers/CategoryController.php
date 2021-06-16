<?php

namespace App\Http\Controllers;



class CategoryController extends Controller
{
    //

    function categoryList(){

        $model = resolve('App\ViewModels\Category\Blog\CategoryListModel');

        $model->load();

        $categories =$model->getCategories();
        return view("category.categorylist", ['categories' => $categories]);
    }
}
