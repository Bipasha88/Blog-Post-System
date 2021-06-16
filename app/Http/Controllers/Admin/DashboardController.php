<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $model = resolve('App\ViewModels\AdminDashboardModel');
        $model->load();

        $posts = $model->getPost();

        $categories = $model->getCategory();

        $tags = $model->getTag();

        $pending = $model->getUser();

        return view('admin.dashboard.index',
            compact( 'posts','categories','tags','pending') );
    }







}
