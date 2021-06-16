<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function pendingComments(){

        $model = resolve('App\ViewModels\Comment\Admin\PendingCommentModel');
        $model->load();

        $comments = $model->getComment();

        return view('admin.comment.pendingComments',compact('comments'));
    }

    public function accept(Request $request){

        $model = resolve('App\ViewModels\Comment\Admin\AcceptCommentModel');

        $model->load($request->comments_id);

        return redirect()->back();
    }

    public function delete(Request $request){

        $model = resolve('App\ViewModels\Comment\Admin\DeleteCommentModel');

        $model->load($request->comments_id);

        return redirect()->back();
    }
}
