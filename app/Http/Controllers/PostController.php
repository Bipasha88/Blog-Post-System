<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function posts(){

        $model = resolve('App\ViewModels\Posts\Blog\PostListModel');

        $model->load();

        $posts =$model->getPosts();

        $categories = $model->getCategories();

        return view("post.posts", ['posts'=>$posts,'categories'=>$categories]);
    }


    function postDetail($id){

        $model = resolve('App\ViewModels\Posts\Blog\PostDetailModel');

        $model->load($id);

        $post = $model->getPost();

        $comments = $model->getComments();

        $tags = $model->getTags();


        return view("post.postDetail",['post' => $post,'comments' => $comments, 'tags'=>$tags]);
    }

    function postsByCategory($id){

        $model = resolve('App\ViewModels\Posts\Blog\PostsByCategoryModel');

        $model->load($id);

        $posts = $model->getPosts();

        return view("post.postsbycategory",compact('posts','id'));
    }

    function postsByTag($id){

        $model = resolve('App\ViewModels\Posts\Blog\PostsByTagModel');

        $model->load($id);

        $posts = $model->getPosts();

        return view("post.postsbytag",compact('posts','id'));
    }




}


