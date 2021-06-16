<?php

namespace App\ViewModels\Tag\Admin;

use App\Services\Tag\ITagService;

class TagListModel{

    private $tagService;
    private $tags;

    public function getTags(){
        return $this->tags;
    }

    public function __construct(ITagService $tagService){

        $this->tagService = $tagService;

    }

    public function load(){

        $this->tags = $this->tagService->getAllTags();
    }

}
