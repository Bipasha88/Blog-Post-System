<?php

namespace App\ViewModels\Tag;

use App\Services\Tag\ITagService;

class AllTagModel{

    private $tagService;
    private $tag;

    public function getTag(){
        return $this->tag;
    }

    public function __construct(ITagService $tagService){

        $this->tagService = $tagService;
    }

    public function tagList(){
        $this->tag = $this->tagService->getAllTags();
    }

    public function findTag($id){
        $this->tag = $this->tagService->findTag($id);
    }
}
