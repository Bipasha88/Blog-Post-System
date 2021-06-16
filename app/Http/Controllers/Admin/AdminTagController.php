<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{

    public function tagList(){

        $model = resolve('App\ViewModels\Tag\Admin\TagListModel');

        $model->load();

        $tags =$model->getTags();

        return view('admin.tag.tagList',compact('tags'));
    }

    public function delete(Request $request){

        $model = resolve('App\ViewModels\Tag\Admin\DeleteTagModel');

        $model->load($request->tags_id);

        return redirect()->back();
    }
}
