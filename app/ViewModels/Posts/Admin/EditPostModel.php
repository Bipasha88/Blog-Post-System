<?php

namespace App\ViewModels\Posts\Admin;

use App\Services\Category\ICategoryService;
use App\Services\Post\IPostService;
use App\Services\Tag\ITagService;

class EditPostModel{

    private $categoryService;
    private $tagService;
    private $postService;
    private $post;
    private $category;
    private $tag;
    private $post_tags;

    public function getPost(){
        return $this->post;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getTag(){
        return $this->tag;
    }

    public function getPostTags(){
        return $this->post_tags;
    }


    public function __construct(IPostService $postService,ICategoryService $categoryService,
                                ITagService $tagService){

        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    public function load($id){

        $this->post = $this->postService->getPostsById($id);
        $this->category = $this->categoryService->getAllCategories();
        $this->tag = $this->tagService->getAllTags();
        $this->post_tags = $this->postService->postRelatedTags($id);
    }

}
