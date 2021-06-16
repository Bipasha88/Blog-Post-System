<?php

namespace App\ViewModels\Posts\Admin;

use App\Services\Post\IPostService;

class DeletePostModel{

    private $postService;



    public function __construct(IPostService $postService){

        $this->postService = $postService;

    }

    public function load($id){

         $this->postService->deleteById($id);

    }

}
