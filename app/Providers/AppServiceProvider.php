<?php

namespace App\Providers;

use App\Services\Auth\AuthService;
use App\Services\Auth\IAuthService;
use App\Services\Category\CategoryService;
use App\Services\Category\ICategoryService;
use App\Services\Comment\CommentService;
use App\Services\Comment\ICommentService;
use App\Services\Post\IPostService;
use App\Services\Post\PostService;
use App\Services\Tag\ITagService;
use App\Services\Tag\TagService;
use App\Services\User\IUserService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(IPostService::class,PostService::class);
        $this->app->bind(ICategoryService::class,CategoryService::class);
        $this->app->bind(ITagService::class,TagService::class);
        $this->app->bind(IUserService::class,UserService::class);
        $this->app->bind(IAuthService::class,AuthService::class);
        $this->app->bind(ICommentService::class,CommentService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
