<?php

namespace App\ViewModels\Tag\Admin;

use App\Services\Tag\ITagService;

class DeleteTagModel{

    private $tagService;

    public function __construct(ITagService $tagService){

        $this->tagService = $tagService;

    }

    public function load($id){

         $this->tagService->deleteById($id);
    }

}
