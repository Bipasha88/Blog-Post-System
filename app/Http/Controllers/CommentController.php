<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function comment_post(CommentRequest $request, $id){

        $data = $request->all();
        $model = resolve('App\ViewModels\Comment\Blog\CreateCommentModel');

        $model->load($data, $id);

        return redirect()->back();
    }






}
