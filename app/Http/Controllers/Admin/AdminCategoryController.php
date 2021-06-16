<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    function createCategory(){

        return view("admin.category.createcategory");
    }


    function createCategory_post(CategoryRequest $request){

        $name = $request->name;
        $status = $request->status;
        $user_id = Auth::id();

        $model = resolve('App\ViewModels\Category\Admin\CreateCategoryPostModel');
        $model->load($name,$status,$user_id);


        return redirect()->route('categorylist');
    }

    function editCategory(CategoryRequest $request){

        $model = resolve('App\ViewModels\Category\Admin\EditCategoryModel');

        $model->load($request->categories_id,$request->all());

        return redirect()->back();
    }

    public function delete(Request $request){

        $model = resolve('App\ViewModels\Category\Admin\DeleteCategoryModel');

        $model->load($request->categories_id);

        return redirect()->back();
    }

    public function categoryList(){

        $model = resolve('App\ViewModels\Category\Admin\CategoryListModel');

        $model->load();

        $categories =$model->getCategories();

        return view('admin.category.categoryList',compact('categories'));
    }
}
