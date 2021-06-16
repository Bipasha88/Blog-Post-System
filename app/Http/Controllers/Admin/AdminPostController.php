<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    function create(){

        $model = resolve('App\ViewModels\Posts\Admin\CreatePostsModel');
        $model->load();

        $categories = $model->getCategory();
        $tags = $model->getTag();

        return view("admin.post.createpost", ['categories' => $categories ,'tags' => $tags]);
    }



    function create_post(PostRequest $request){

        $data = $request->all();
        $user_id = Auth::id();

        $model = resolve('App\ViewModels\Posts\Admin\CreatePosts_PostModel');
        $model->load($data, $user_id);

        return redirect()->route('postlist');
    }

    function edit($id){

        $model = resolve('App\ViewModels\Posts\Admin\EditPostModel');
        $model->load($id);

        $categories = $model->getCategory();

        $post = $model->getPost();

        $post_tags = $model->getPostTags();

        $tags = $model->getTag();

        return view("admin.post.editpost", ['categories' => $categories,
            'post' => $post,'tags'=>$tags,'post_tags'=>$post_tags]);
    }

    function edit_post(PostRequest $request, $id){

        $data = $request->all();

        $user_id = Auth::id();

        $model = resolve('App\ViewModels\Posts\Admin\EditPost_PostModel');
        $model->load($id,$data,$user_id);

        return redirect()->route('postlist');

    }

    public function postList(){

        $model = resolve('App\ViewModels\Posts\Admin\PostListModel');
        $model->load();

        $posts = $model->getPosts();

        return view('admin.post.postList',compact('posts'));
    }

    function delete(Request $request){

        $model = resolve('App\ViewModels\Posts\Admin\DeletePostModel');
        $model->load($request->posts_id);

        return redirect()->back();
    }
}
