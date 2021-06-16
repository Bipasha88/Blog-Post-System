<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('/admin')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')->middleware('auth');

    Route::get('/postlist', [AdminPostController::class, 'postList'])
        ->name('postlist')->middleware('auth');

    Route::get('/pendingcomments', [AdminCommentController::class, 'pendingComments'])
        ->name('pendingcomments')->middleware('auth');

    Route::put('/commentaccept', [AdminCommentController::class, 'accept'])
        ->name('comment-accept')->middleware('auth');

    Route::get('/commentdelete', [AdminCommentController::class, 'delete'])
        ->name('comment-delete')->middleware('auth');

    Route::get('/post/create', [AdminPostController::class, 'create'])
        ->name('create')->middleware('auth');

    Route::post('/post/create_post', [AdminPostController::class, 'create_post'])
        ->name('create_post')->middleware('auth');

    Route::get('post/{id}/edit', [AdminPostController::class, 'edit'])
        ->name('edit')->middleware('auth');

    Route::put('/edit_post/{id}', [AdminPostController::class, 'edit_post'])
        ->name('edit_post')->middleware('auth');
    Route::get('/post/delete', [AdminPostController::class, 'delete'])
        ->name('delete')->middleware('auth');


    Route::get('/createcategory', [AdminCategoryController::class, 'createCategory'])
        ->name('category')->middleware('auth');

    Route::post('/createcategory_post', [AdminCategoryController::class, 'createCategory_post'])
        ->name('category_post')->middleware('auth');

    Route::get('/categorylist', [AdminCategoryController::class, 'categoryList'])
        ->name('categorylist')->middleware('auth');

    Route::put('/editcategory', [AdminCategoryController::class, 'editCategory'])
        ->name('category-edit')->middleware('auth');

    Route::get('/category/delete', [AdminCategoryController::class, 'delete'])
        ->name('category-delete')->middleware('auth');

    Route::get('/taglist', [AdminTagController::class, 'tagList'])
        ->name('taglist')->middleware('auth');

    Route::get('/tag/delete', [AdminTagController::class, 'delete'])
        ->name('tag-delete')->middleware('auth');


});

Route::prefix('/user')->group(function() {
    Route::get('/userrequest', [UserController::class, 'userRequest'])
        ->name('user')->middleware('auth');

    Route::put('/accept', [UserController::class, 'accept'])
        ->name('accept')->middleware('auth');

    Route::put('/delete', [UserController::class, 'delete'])
        ->name('user-delete')->middleware('auth');
});

Route::prefix('/auth')->group(function() {
    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/registerpost', [AuthController::class, 'register_post'])
        ->name('registerpost');

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/loginpost', [AuthController::class, 'login_post'])
        ->name('loginpost');

    Route::get('/passwordrecover', [AuthController::class, 'password_recover'])
        ->name('passwordrecover');

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::prefix('/post')->group(function(){
    Route::get('/posts', [PostController::class, 'posts'])
    ->name('posts');

    Route::get('/{id}/postdetail', [PostController::class, 'postDetail'])
        ->name('single-post');

    Route::get('/{id}/postsbycategory', [PostController::class, 'postsByCategory'])
        ->name('categoryposts');

    Route::get('/{id}/postsbytag', [PostController::class, 'postsByTag'])
        ->name('tagposts');



    });


Route::prefix('/category')->group(function(){

    Route::get('/categorylist', [CategoryController::class, 'categoryList'])
        ->name('category-list')->middleware('auth');


});

Route::prefix('/tag')->group(function(){


    Route::get('/edittag', [TagController::class, 'editTag'])
        ->name('edit-tag')->middleware('auth');

});

Route::prefix('/comment')->group(function(){
    Route::post('/{id}/comment_post', [CommentController::class, 'comment_post'])
        ->name('comment-post');



});

